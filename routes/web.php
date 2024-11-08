<?php

// Resources

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ordersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\subsriberUsers;
use App\Models\PasswordResetToken;


use App\Models\User;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['auth']], function () {
    // Dashboard
    Route::get('/log-in-admin', function () {
        return view('admin.login');
    });
    Route::post('/logInAdmin', [UserController::class, 'loginAdmin']);
    Route::get('/dashboard', function () {
        if (Auth::user()->role == 'admin') {
            return redirect('/admin/users');
        } else {
            return redirect('/log-in-admin');
        }
    });

    // Users
    Route::resource('/admin/users', UserController::class);
    
    // Subscribers
    Route::resource('/admin/subscribers', subsriberUsers::class)->name('index' , 'subcribers');

    // Orders 
    Route::resource('/admin/orders' , ordersController::class );

    // Categories
    
    Route::resource('/admin/categories', CategoriesController::class);

    // Products
    Route::resource('/admin/products', ProductsController::class);

    // Cart
    Route::post('/add-to-cart/{id}' , [ProductsController::class , 'addToCart']);
    Route::post('/remove-from-cart/{id}' , [ProductsController::class , 'removeFromCart']);
    Route::post('/update-cart' , [ProductsController::class , 'updateCart']);

    // Wishlist
    Route::post('/add-to-wishlist/{id}', [ProductsController::class, 'addToWishlists']);
    Route::post('/remove-from-wishlist/{id}', [ProductsController::class,'removeFromWishlists']);

    // Static Pages
    Route::get('/cart', function () {
        return view('cart' , [
            'products' => Product::all(),
            'categories' => Category::all()
        ]);
    });


    Route::get('/wishlist', function () {
        return view('wishlist' , [
            'products' => Product::all(),
            'categories' => Category::all()
        ]);
    });
    
    
    Route::get('/checkout', function () {
        if (count(json_decode(Auth::user()->cart)) > 0) {   
            return view('checkout' , [
                'products' => Product::all(),
                'categories' => Category::all()
            ]);
        } else {
            return redirect()->back()->with('msg' , 'Cart Is Empty !');
        }
    });


    // Checkout
    Route::post('/checkout-visa' , function () {
        // Process Payment Code
        
        // Return Success Page
        return redirect()->back()->with('msg' , 'Payment Successful');
    });
});

Route::post('/storeSubscriber' , [subsriberUsers::class , 'store']);


Route::get('/', function () {
    return view('welcome' , [
        'products' => Product::all(),
        'categories' => Category::all()
    ]);
})->name('login');




Route::get('/sign-up' , function () {
    return view('registration');
})->name('sign-up');

Route::get('/lost-password' , function () {
    return view('lost-password');
});

Route::get('/reset-password-{token}' , [UserController::class , 'resetPasswordForm'])->name('reset-password');

Route::get('/tokens' , function () {
    return PasswordResetToken::all();
});

Route::post("/signUp" , [UserController::class , 'store']);
Route::post('/log-in' , [UserController::class , 'login'] );
Route::get('/logOut' , function () {
    Auth::logout();
    return redirect('/');
});

Route::post('/reset-password' , [UserController::class , 'resetPassword']);

Route::post('/reset-password-in-real' , [UserController::class , 'resetPasswordSubmit']);