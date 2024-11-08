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
                            <span>$ <span class="total_price_response">0</span> </span>
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

        {{-- Start Checkout --}}
            <section class="checkout-section">
                <h1>CHECKOUT</h1>
                <p>Please Fill This Form First</p>
                <div class="checkout-div">
                    <form action="{{route('orders.store')}}" method="POST">
                        <div class="form">
                            @csrf
                            <h2>Billing details</h2>
                            <div class="input half">
                                <label for="name">Name <span class="star">*</span></label>
                                <input type="text" id="name" name="name" required>
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                            <div class="input half">
                                <label for="email">Email <span class="star">*</span></label>
                                <input type="email" id="email" name="email" required>
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>
                            <div class="input">
                                <label for="phone">Phone <span class="star">*</span></label>
                                <input type="text" id="phone" name="phone" required>
                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                            </div>
                            <div class="input">
                                <label for="address">Address <span class="star">*</span></label>
                                <textarea id="address" name="address" required></textarea>
                                <small class="text-danger">{{ $errors->first('address') }}</small>
                            </div>
                            <div class="input">
                                <label for="city">City <span class="star">*</span></label>
                                <input type="text" id="city" name="city" required>
                                <small class="text-danger">{{ $errors->first('city') }}</small>
                            </div>
                            <div class="input">
                                <label for="state">State <span class="star">*</span></label>
                                <input type="text" id="state" name="state" required>
                                <small class="text-danger">{{ $errors->first('state') }}</small>
                            </div>
                            <div class="input">
                                <label for="zip">Zip Code <span class="star">*</span></label>
                                <input type="text" id="zip" name="zip" required>
                                <small class="text-danger">{{ $errors->first('zip') }}</small>
                            </div>
                            <div class="input">
                                <label for="payment-method">Payment Method <span class="star">*</span></label>
                                <select id="payment-method" name="payment_method" required>
                                    <option value="">Select Payment Method</option>
                                    <option value="cod">Cash On Delivery</option>
                                    <option value="paypal">PayPal</option>
                                    <option value="cc">Credit Card</option>
                                </select>
                                <small class="text-danger">{{ $errors->first('payment_method') }}</small>
                            </div>
                            <div class="input credit-card">
                                <div class="input-group">
                                    <label for="card-number">Card Number <span class="star">*</span></label>
                                    <input type="text" id="card-number" maxlength="22" name="card_number" required oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\d{4})/g, '$1  ').trim()">

                                    <small class="text-danger">{{ $errors->first('card_number') }}</small>
                                </div>
                                <div class="input-group">
                                    
                                    <label for="card-name">Card Holder Name <span class="star">*</span></label>
                                    
                                    <input type="text" id="card-name" name="card_name" required>
                                    
                                    <small class="text-danger">{{ $errors->first('card_name') }}</small>
                                </div>
                                <div class="input-group">
                                    <div class="half">
                                        <label for="card-expiry">Start Date <span class="star">*</span></label>
                                    
                                        <input type="text" id="card-start" name="card_start_date" maxlength="2" required>
                                        <small class="text-danger">{{ $errors->first('card_start_date') }}</small>
                                    </div>
                                    <div class="half">
                                        <label for="card-expiry">End Date <span class="star">*</span></label>
                                    
                                        <input type="text" id="card-end" name="card_end_date" maxlength="2" required>
                                        <small class="text-danger">{{ $errors->first('card_end_date') }}</small>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label for="csv">CSV <span class="star">*</span></label>
                                    <input type="text" id="card-cvv" name="card_cvv" maxlength="3" required>
                                    <small class="text-danger">{{ $errors->first('card_cvv') }}</small>
                                </div>

                            </div>


                            <?php 
                                $products_id = array();
                                $total_price = 0;
                                foreach (json_decode(Auth::user()->cart) as $product) {
                                    $products_id[] = ['id' => $product->id , 'qty' => $product->qty];
                                    
                                    $total_price += $product->price * $product->qty;
                                }
                            
                            ?>
                            <input type="hidden" name="products_id" value="{{json_encode($products_id)}}">
                            <input type="hidden" name="total_price" value="{{$total_price}}">
                            <h2>Additional information</h2>
                            <div class="input">
                                <label for="notes">Order notes (optional)</label>
                                <textarea name="notes" id="notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                            <div class="input">
                                <p>Have A Coupon?</p>
                                <label for="coupon">Coupon</label>
                                <input type="text" id="coupon" name="coupon">
                                <small class="text-danger">{{ $errors->first('coupon') }}</small>
                            </div>
                        </div>

                        <div class="cart-total">
                            <h3>Your order</h3>
                            <p class="head">
                                Product <span>Subtotal</span>
                            </p>
                            <?php 
                                $result = 0;
                            ?>
                            @foreach (json_decode(Auth::user()->cart) as $product) 
                                <p class="product">
                                    {{$product->name}} x {{$product->qty}}	<span>{{$product->price}}$</span>
                                </p>
                                <?php 
                                    $result += $product->price;
                                ?>
                            @endforeach

                            <p class="total">
                                Total <span>{{$result}}$</span>
                            </p>
                            <p>
                                Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.
                            </p>
                            <button href="/checkout" class="btn">
                                <span>Place Order</span>
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        {{-- End Checkout --}}






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


        // Show The Checkout Div
        document.querySelector('#payment-method').addEventListener('input' , (e) => {
            if (e.target.value == 'cc') {
                document.querySelector('.credit-card').style.display = 'block';
            } else {
                document.querySelector('.credit-card').style.display = 'none';
            }
            
        })
    </script>
    <script src="js/main.js"></script>
    </body>

</html>