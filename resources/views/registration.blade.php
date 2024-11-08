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
    <form action="/signUp" method="POST">
        @csrf
        <a href="/">
            <img src="{{asset("imgs/logo.svg")}}" alt="Logo">
        </a>
        <h2>Create a New Account</h2>
        <div>
            <label for="full_name">Name:</label>
            <input type="text" id="full_name" name="full_name" placeholder="Name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
        </div>
        <div>
            <input type="submit" value="Create Account">
        </div>
        <p>Already have an account? <a href="/" class="link">Login</a></p>
        <p class="error-message" style="color: red;">{{ $errors->first() }}</p>
        <p class="success-message" style="color: green;">{{ session('successMessage') }}</p>
        <p class="error-message" style="color: red;">{{ session('errorMessage') }}</p>
    </form>
</body>
</html>