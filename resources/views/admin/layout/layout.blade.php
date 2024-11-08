<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <title>Admin Page</title>
</head>
<body>
    <div class="holder">
        <nav>
            {{-- <div class="img">
                <img src="{{asset('imgs/logo.svg')}}" alt="">
            </div> --}}
            <ul>
                <li>
                    <a href="{{route('users.index')}}">Users</a>
                </li>
                    <a href="{{route('subcribers')}}">Subiscriber Users</a>
                </li>
                <li>
                    <a href="{{route('orders.index')}}">Orders</a>
                </li> 
                <li>
                    <a href="{{route('categories.index')}}">Categories</a>
                </li>
                <li>
                    <a href="{{route('products.index')}}">Products</a>
                </li>
            </ul>
        </nav>
        <div class="content">
            @yield('content')
        </div>
    </div>

    <div class="alerts">

    </div>
    <script>
                @if ($errors->any())
            @foreach ($errors->all() as $index => $error)
                // Create Alert
                const alert_{{$index}} = document.createElement('div');
                alert_{{$index}}.className = 'alert';
                alert_{{$index}}.textContent = "{{$error}}";
                // Append
                document.querySelector('.alerts').appendChild(alert_{{$index}});
                setTimeout(() => {
                    alert_{{$index}}.classList.add('hide');
                    setTimeout(() => {
                        alert_{{$index}}.remove();
                    }, 2000);
                }, 3000);
            @endforeach
            document.querySelector('header a.btn:last-child').click();
        @endif
    </script>


    

</body>
</html>