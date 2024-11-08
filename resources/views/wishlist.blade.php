<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/main.css">
        <!-- Swiper -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>
            Retail Store
        </title>
    </head>

    <body>
        <!-- Scroll To Top -->
        <div class="scrollUp">
            <i class="fas fa-arrow-up"></i>
        </div>
        <!-- End Scroll To Top -->
        <!-- Cart -->
        <div class="cart">
            <div class="shoppingCart">
                <div class="head">
                    <h3>
                        shopping cart
                    </h3>
                    <div class="close">
                        <p>Close</p>
                        <div class="x">
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <!-- <p class="none">
                        No products in the cart.
                    </p> -->
                    <div class="items">
                        @auth
                            @foreach (json_decode(Auth::user()->cart , 1) as $item)

                            <div class="item">
                                <div class="image">
                                    <img src="{{asset($item['image'])}}" alt="">
                                </div>
                                <div class="details">
                                    <h4>
                                        <a href="/cart">
                                            {{ $item['name'] }}
                                        </a>
                                    </h4>
                                    <p>
                                        <span class="quantity">{{$item['qty']}}</span> x <span class="price">{{$item['price']}}$</span>
                                    </p>
                                </div>
                                <form action="/remove-from-cart/{{$item['id']}}" method="POST">
                                    @csrf
                                    <button type="submit">
                                        <i class="fas fa-times delete"></i>
                                    </button>
                                </form>
                            </div>


                            @endforeach
                        @endauth
                    </div>
                    <div class="calculate">
                
                        <div class="subtotal">
                            <p>Subtotal:</p>
                            <span>$<span class="total_price_response">582.31</span></span>
                        </div>
                        <div class="btns">
                            <a href="/cart" class="btn">
                                <span>
                                    View Cart
                                </span>
                            </a>
                            <a href="/checkout" class="btn black">
                                <span>
                                    Checkout
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="expanded">
                <!-- CloseIcon -->
                <i class="fas fa-times close"></i>

                <!-- Cart Items -->
                <div class="img">
                    <img src="imgs/product_1.jpg" alt="">
                </div>
                <div class="info">
                    <h3>
                        Craftsman pirate trousers
                    </h3>
                    <div class="rate">
                        <div class="stars">
                            <i class="fas "></i>
                            <i class="fas "></i>
                            <i class="fas "></i>
                            <i class="fas "></i>
                            <i class="fas "></i>
                        </div>
                        <a href="#">
                            (<span>5</span> reviews)
                        </a>                
                    </div>
                    <span class="price">
                        69.60$
                    </span>
                    <p class="desc">
                        Voluptatem sed quibusdam unde fugiat animi totam quidem. Eveniet reiciendis nihil est aut. Rem sit neque doloremque tempore saepe corporis. Est neque eos itaque doloribus.
                    </p>
                    <span class="stock">
                        13 in stock
                    </span>
                    <form action="/add-to-cart/" class="addToCart" method="POST">
                        @csrf
                        <button class="btn">
                            <span>
                                Add To Cart
                            </span>
                        </button>
                    </form>
                    <p class="sku">
                        SKU: <span>12345</span>
                    </p>
                </div>
            </div>
        </div>
        <!-- End Cart -->

        <!-- Start Header -->
        <header>
            <!-- Start Banner -->
            <ul class="banner">
                
                <li>
                    Buy Now, Pay Later
                    
                </li>
                <li>
                    · 
                    
                </li>
                <li>
                    10% off your first online order
                    
                </li>
                <li>
                    · 
                </li>
                <li>
                    Free shipping + returns
                </li>
            </ul>
            <!-- End Banner -->
            <div class="headerContent">
                <ul class="links">
                    <li>
                        <a href="#">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Shop
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Blogs
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Pages
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Contact
                        </a>
                    </li>
                </ul>
                <img src="imgs/logo.svg" alt="Logo" class="logo">
                <ul class="icons">
                    <!-- <li>
                        <a href="#search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                    </li> -->
                    <li class="langs">
                        ENG 
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="langOptions">
                            <li>
                                <a href="#">
                                    <img src="imgs/eng.png" alt="">
                                    English
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="imgs/ar.png" alt="">
                                    Arabic
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="user">
                        <i class="fa-solid fa-user"></i>
                        <ul class="user-menu">
                            @if (Auth::check())
                                <div class="title">
                                    <h4 class="AuthUserName">Hello {{Auth::user()->full_name}} </h4>
                                    <a href="/logOut" class="btn">
                                        <span>
                                            Log Out
                                        </span>
                                    </a>
                                </div>
                            @else 
                                <form action="/log-in" method="POST">
                                    @csrf
                                    <div class="title">
                                        <h4>
                                            Sign in
                                        </h4>
                                        <a href="{{route('sign-up')}}">Create an Account</a>
                                    </div>
                                    <div class="input">
                                        <label for="email"> Email <span class="star">*</span></label>
                                        <input type="text" name="email" id="email" placeholder="Email" required>
                                    </div>
                                    <div class="input">
                                        <label for="pass">Password <span class="star">*</span></label>
                                        <input type="password" name="password" id="pass" placeholder="Password" required>
                                    </div>
                                    <button class="btn">
                                        <span>
                                            Log in
                                        </span>
                                    </button>
                                    <a href="/lost-password" class="lost-password">
                                        Lost your password?
                                    </a>
                                </form>
                            @endif
                        </ul>
                    </li>
                    <li>
                        <a href="/wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#cart" class="cartIcon">
                            <i class="fa-solid fa-shopping-cart"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </header>
        <!-- End Header -->

        {{-- Start Cart --}}
        <section class="cart-section">
            <h1>WISHLIST</h1>
            @if (count(json_decode(Auth::user()->wishlists)) == 0)

                <div class="empty">
                    {{-- Cart Icon --}}
                    <i class="fa-solid fa-heart"></i>
                    <p>Your Wishlist is currently empty.</p>
                    <a href="/" class="btn">
                        <span>
                            Retrun To Shop
                        </span>
                    </a>
                </div>

            @else
            <div class="cart-div">
                <div class="cart-products">
                        <table>
                            <tr>
                                <th>Remove</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                                @foreach (json_decode(Auth::user()->wishlists) as $product)
                                    <tr>
                                            <td>
                                                <form action="/remove-from-wishlist/{{$product->id}}" method="POST">
                                                    @csrf
                                                    <button class="remove">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <img src="{{asset($product->image)}}" alt="">
                                            </td>
                                            <td>
                                                {{$product->name}}
                                            </td>
                                            <td>
                                                <span class="price">{{$product->price}}</span>
                                            </td>
                                            <td class="actionTd">
                                                <form action="" class="addToCart" method="POST">
                                                    @csrf
                                                     <input type="hidden" class="product_id" value="{{$product->id}}">
                                                     <button class="btn">
                                                        <span>
                                                            Add To Cart
                                                        </span>
                                                     </button>
                                                </form>
                                            </td>
                                    </tr>
                                @endforeach
                        </table>
                </div>
                {{-- <div class="cart-total">
                    <h2>Cart totals </h2>

                    @foreach (json_decode(Auth::user()->cart) as $product)
                        <p class="sub-total">
                            Subtotal <span>{{$product->price}}$</span>
                        </p>

                    @endforeach
                    <p class="total">
                        Total <span>{{$result}}$</span>
                    </p>
                    <a href="/checkout" class="btn">
                        <span>Proceed to checkout</span>
                    </a>
                </div> --}}
            </div>
            @endif
        </section>
    {{-- End Cart --}}




    <script>
                // Add To Cart
                document.querySelectorAll('form.addToCart').forEach( form => {
            form.addEventListener('submit' , (event) => {
                event.preventDefault(); // Prevent default form submission

                // Get form data
                const formData = new FormData(form);

                // AJAX request
                const xhr = new XMLHttpRequest();
                xhr.open('POST', `/add-to-cart/${form.querySelector('.product_id').value}`, true); // Replace with your actual route
                xhr.onload = function() {
                    if (this.status >= 200 && this.status < 300) {
                        // Handle successful response
                        let response = JSON.parse(this.responseText);

                        if (document.querySelectorAll('.cart .items .item')) {
                            // Remove previous items
                            document.querySelectorAll('.cart .items .item').forEach(item => item.remove());
                        }

                        // Create Cart Product With JS DOM Not InnerHTML !
                        response.cart.forEach(item => {
                            const cartItem = document.createElement('div');
                            cartItem.className = 'item';

                            const image = document.createElement('div');
                            image.className = 'image';
                            const img = document.createElement('img');
                            img.src = item.image;
                            image.appendChild(img);
                            cartItem.appendChild(image);

                            const details = document.createElement('div');
                            details.className = 'details';
                            const h4 = document.createElement('h4');
                            const a = document.createElement('a');
                            a.href = '/cart';
                            a.textContent = item.name;
                            h4.appendChild(a);
                            details.appendChild(h4);
                            const p = document.createElement('p');
                            const spanQuantity = document.createElement('span');
                            spanQuantity.className = 'quantity';
                            spanQuantity.textContent = item.qty;
                            const spanPrice = document.createElement('span');
                            spanPrice
                            spanPrice.className = 'price';
                            spanPrice.textContent = item.price;
                            p.appendChild(spanQuantity);
                            p.appendChild(document.createTextNode(' x '));
                            p.appendChild(spanPrice);
                            details.appendChild(p);
                            cartItem.appendChild(details);
                            const form = document.createElement('form');
                            form.action = '/remove-from-cart/' + item.id;
                            form.method = 'POST';
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = '_token';
                            input.value = '{{ csrf_token() }}';
                            form.appendChild(input);
                            const button = document.createElement('button');
                            button.type ='submit';
                            const i = document.createElement('i');
                            i.className = 'fas fa-times delete';
                            button.appendChild(i);
                            form.appendChild(button);
                            cartItem.appendChild(form);
                            document.querySelector('.cart .body .items').appendChild(cartItem);


                            
                        })
                        // Update Total Price
                        total_price_response = 0;
                        updatePrice();

                        // Create Alert Message
                        const response_msg = document.createElement('div');
                        response_msg.className = 'alert';
                        response_msg.textContent = 'Item added to cart successfully!';
                        // Append
                        document.querySelector('.alerts').appendChild(response_msg);
                        setTimeout(() => {
                            response_msg.classList.add('hide');
                            setTimeout(() => {
                                response_msg.remove();
                            }, 2000);
                        }, 3000);

                    } else if (this.status == 500) {
                        location.reload()
                    } else {
                        // Handle error
                        console.error('Error:', this.status, this.statusText);
                    }
                };
                xhr.onerror = function() {
                    console.error('Request failed');
                };
                xhr.send(formData);
            } )
        })
    </script>


        <!-- Start Footer -->
    <footer>
        <div class="cols">
            <div class="col">
                <button>
                    <!-- Phone -->
                     <i class="fa-solid fa-phone"></i>
                    <span>
                        <a href="tel:(084)123-45688">
                            customer service: (084) 123 - 456 88
                        </a>
                    </span>
                </button>
                <button>
                    <!-- Email -->
                     <i class="fa-solid fa-envelope"></i>
                    <span>
                        <a href="mailto:support@example.com">support@example.com</a>
                    </span>
                </button>
                <div class="connect">
                    <p>
                        connect with us
                    </p>
                    <div class="socials">
                        <a href="#">
                            <i class="fab fa-facebook" style="--s-c : #1877f2"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter" style="--s-c : #1da1f2"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram" style="--s-c : #c32aa3"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-pinterest" style="--s-c : #bd081c"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <h3 class="title">
                    quick links
                </h3>
                <ul class="links">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Account</a>
                    </li>
                    <li>
                        <a href="#">Wishlist</a>
                    </li>
                    <li>
                        <a href="#">Cart</a>
                    </li>
                </ul>
            </div>
            <div class="col">
                <h3 class="title">
                    location
                </h3>
                <ul class="links">
                    <li>
                        <a href="mailto:ontact@example.com">
                            contact@example.com
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            2972 Westheimer Rd. Santa Ana, Illinois 85486
                        </a>
                    </li>
                </ul>


            </div>
        </div>
        <div class="line">
            <img src="imgs/logo.svg" onclick="location.href = '/' " alt="logo">
        </div>
        <div class="copy">
            <p class="copyright">
                Copyright © 2024 <a href="#">Axetor</a>. All rights reserved
            </p>
            <img src="https://demo2.wpopal.com/axetor/wp-content/uploads/2024/01/payment.jpg" alt="payment">
        </div>
    </footer>
    <!-- End Footer -->
    
    <div class="alerts">

    </div>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
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
    <script src="js/main.js"></script>
    </body>

</html>