<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::user()->role == 'admin') {
            $users = User::all();
            return view('admin.users.users', compact('users'));
        } else {
            return redirect('/log-in-admin');
        }
       

    }

    public function loginAdmin(Request $request) {
        $email = $request->email;
        $password = $request->password;

        if ($email == env('adminEmail') && $password == env('adminPassword') )  {
            $user = User::find(Auth::user()->id);
            $user->role = 'admin';
            $user->save();
            return redirect('/admin/users');
        } else {
            return redirect()->back()->withErrors( 'Invalid Email or Password');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role == 'admin') {
            return view('users.create');
        } else {
            return redirect('/log-in-admin');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Validate Input
        $request->validate([
            'full_name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users,email'],
            'password' => ['required','string','min:8'],
            'confirmPassword' => ['required','string','same:password'],
            ]);


        // Hash Password
        $request->merge(['password' => password_hash($request->password, PASSWORD_DEFAULT)]);
        $user = new User();
        // Create New
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        // Log This User
        Auth::login($user);
        // Redirect To Homepage
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        if (Auth::user()->role == 'admin') {
            $user = User::find($id);
            return view('users.show', compact('user'));
        } else {
            return redirect('/log-in-admin');
        }
        


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->role == 'admin') {
            $user = User::find($id);
            return view('admin.users.edit', compact('user'));
        } else {
            return redirect('/log-in-admin');
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate Input
        $request->validate([
            'full_name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users,email,'.$id],
            'password' => ['nullable','string','min:8'],
            'confirmPassword' => ['required','string','same:password'],
        ]);
        // Hash Password if provided
        if($request->password){
            $request->merge(['password' => password_hash($request->password, PASSWORD_DEFAULT)]);
        }
        // Update In DB
        User::find($id)->update($request->all());
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete from DB
        User::destroy($id);
        return redirect()->route('users.index');
    }

    // Log In
    public function login(Request $request) {
        // Validate Input
        $request->validate([
            'email' => ['required','string','email','max:255'],
            'password' => ['required','string','min:8'],
        ]);
        // Attempt to Authenticate
        if (Auth::attempt(['email' => $request->email,'password' => $request->password])) {
            return redirect('/');
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    // User Reset Password
    public function resetPassword(Request $request) {
        // Validate Input
        $request->validate([
            'email' => ['required','string','email','max:255'],
        ]);
        // Find User by Email        
        $user = User::where('email', $request->email)->first();
        if (PasswordResetToken::where('email', $request->email)->first()) {
            return redirect('/')->withErrors('This Email Has Already a token. Check The Mail');
        }
        if($user){
            // Generate Reset Token
            $token = bin2hex(random_bytes(10));
            // Save Token to DB
            PasswordResetToken::createResetToken($request->email);
            // Send Email with Reset Link
            Mail::to($user->email)->send(new ResetPasswordMail($token));
            // Return Success Message
            return back()->with('successMessage', 'Password Reset Link Sent');
            
        } else{
            // Return Error Message
            return back()->with('errorMessage', 'User Not Found');
        }
    }
    
    // Reset Password Form
    public function resetPasswordForm($token) {
        // Find Token in DB
        $resetToken = PasswordResetToken::where('token', $token)->first();
        if($resetToken){
            // if ($resetToken->isExpired()) {
            //     return redirect('/lost-password')->with('errorMessage', 'Token Expired');
            // }
            // Return Reset Password Form
            return view('reset-password', compact('token'));
        } else{
            // Return Error Message
            return redirect()->route('login')->with('errorMessage', 'Invalid or Expired Token');
        }
    }
    
    // Reset Passwor
    public function resetPasswordSubmit(Request $request, ) {
        $token = $request->userToken;  // Get Token from URL
        // Validate Input
        $request->validate([
            'password' => ['required','string','min:8'],
            'confirmPassword' => ['required','string','same:password'],
        ]);
        // Find Token in DB
        $resetToken = PasswordResetToken::where('token', $token)->first();
        if($resetToken){
            // Update User Password
            User::where('email', $resetToken->email)->update(['password' => password_hash($request->password, PASSWORD_DEFAULT)]);
            // Delete Token
            $resetToken->delete();
            // Return Success Message
            return redirect('/')->withErrors('Password Reset Successful');
        } else{
            // Return Error Message
            return redirect()->back()->with('errorMessage', 'Invalid or Expired Token');
        }
    }
}
