<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #eee;
            form {
                background-color: #fff;
                padding:20px 30px ;
                border-radius: 5px;
                border: 1px solid #ddd;
                display : flex;
                flex-direction: column;
                gap: 15px;
                min-width:300px;
                input {
                    padding:14px;
                    border-radius: 6px;
                    border:1px dashed #f333;
                    outline: #f333;
                }
                button {
                    font-size: 14px;
                    &:hover {
                        background-color: #f333;
                        color: #fff;
                    }
                }
            }
            p.error {
                color: red;
                font-size: 12px;
                margin-top: 5px;
            }
        }
    </style>
    <title>Admin Log In</title>
</head>
<body>
    <form action="/logInAdmin" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button class="btn" title="Log In">
            <span>
                Log In
            </span>
        </button>
        <p class="error">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <span>{{ $error }}</span>
                @endforeach
            @endif
        </p>
    </form>    
</body>
</html>