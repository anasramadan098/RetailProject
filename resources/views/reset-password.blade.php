<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Account</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
</head>
<body>
    <form action="/reset-password-in-real" method="POST">
        @csrf
        <a href="/">
            <img src="{{asset("imgs/logo.svg")}}" alt="Logo">
        </a>
        <h2>Write The New Password</h2>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirm">password Confirm:</label>
            <input type="password" id="password_confirm" name="confirmPassword" required>
        </div>
        <div>
            <input type="hidden" name="userToken" value="{{$token}}">
        </div>
        <div>
            <input type="submit" value="Change Passwords">
        </div>
        <p>Already have an account? <a href="/" class="link">Login</a></p>
        <p>Want To Create an account? <a href="{{route('sign-up')}}" class="link">Sign Up</a></p>
        <p class="error-message" style="color: red;">{{ $errors->first() }}</p>
        <p class="success-message" style="color: green;">{{ session('successMessage') }}</p>
        <p class="error-message" style="color: red;">{{ session('errorMessage') }}</p>
    </form>
</body>
</html>