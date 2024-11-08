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
                                    <span class="quantity">{{$item['qty']}}</span> x <span class="price">{{number_format($item['price'] ,2, '.', '')}}$</span>
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
                <div class="options-container">

                </div>
                <form action="" class="addToCart" method="POST">
                    @csrf
                    <input type="hidden" class="product_id" name="product_id">
                    <input type="hidden" name="option" class="optionInput">
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
    <!-- Start Welcome -->
    <section class="welcome">
        <div class="swiper welcomeSwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="{{asset('imgs/slide-1.jpg')}}" />
                <div class="text">
                    <h4>
                        Workwear exclusive supplier
                    </h4>
                    <h1>
                        workwear for <br>         
                        professions
                    </h1>
                    <div class="btns">
                        <a href="#" class="btn">
                            <span>Shop Mens</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <a href="#" class="btn shop">
                            <span>Shop Womans</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
              </div>
              <div class="swiper-slide">
                <img src="{{asset('imgs/slide-2.jpg')}}" />
                <div class="text">
                    <h4>
                        Workwear exclusive supplier
                    </h4>
                    <h1>
                        workwear for <br>         
                        professions
                    </h1>
                    <div class="btns">
                        <a href="#" class="btn">
                            <span>Shop Mens</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <a href="#" class="btn shop">
                            <span>Shop Womans</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
              </div>
              <div class="swiper-slide">
                <img src="{{asset('imgs/slide-3.jpg')}}" />
                <div class="text">
                    <h4>
                        Workwear exclusive supplier
                    </h4>
                    <h1>
                        workwear for <br>         
                        professions
                    </h1>
                    <div class="btns">
                        <a href="#" class="btn">
                            <span>Shop Mens</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <a href="#" class="btn shop">
                            <span>Shop Womans</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
              </div>
            </div>
            <div class="swiper-paginations"></div>
          </div>
    </section>
    <!-- End Welcome-->

    <!-- Start Discover -->
    <section class="discover">
        <h2>
            discover most popular categories
        </h2>
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="card">
                        <h4>
                            <a href="/">
                                men’s workwear
                            </a>
                        </h4>
                        <img src="https://demo2.wpopal.com/axetor/wp-content/uploads/2024/02/h2_cat1.png" alt="">
            
                        <a href="/shop"  title="Check It Now" class="arrowBtn">
                            <span>
                                CHECK IT NOW
                            </span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <h4>
                            <a href="/">
                                men’s workwear
                            </a>
                        </h4>
                        <img src="https://demo2.wpopal.com/axetor/wp-content/uploads/2024/02/h2_cat1.png" alt="">
            
                        <a href="/shop"  title="Check It Now" class="arrowBtn">
                            <span>
                                CHECK IT NOW
                            </span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <h4>
                            <a href="/">
                                men’s workwear
                            </a>
                        </h4>
                        <img src="https://demo2.wpopal.com/axetor/wp-content/uploads/2024/02/h2_cat1.png" alt="">
            
                        <a href="/shop"  title="Check It Now" class="arrowBtn">
                            <span>
                                CHECK IT NOW
                            </span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <h4>
                            <a href="/">
                                men’s workwear
                            </a>
                        </h4>
                        <img src="https://demo2.wpopal.com/axetor/wp-content/uploads/2024/02/h2_cat1.png" alt="">
            
                        <a href="/shop"  title="Check It Now" class="arrowBtn">
                            <span>
                                CHECK IT NOW
                            </span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <h4>
                            <a href="/">
                                men’s workwear
                            </a>
                        </h4>
                        <img src="https://demo2.wpopal.com/axetor/wp-content/uploads/2024/02/h2_cat1.png" alt="">
            
                        <a href="/shop"  title="Check It Now" class="arrowBtn">
                            <span>
                                CHECK IT NOW
                            </span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- End Discover -->
    <!-- Start Benifits -->
    <section class="benifits">
        <div class="benifit">
            <i class="fa-solid fa-truck-fast"></i>
            <div class="text">
                <h3>
                    Worldwide Shipping
                </h3>
                <p>
                    Enjoy free delivery on every order.
                </p>
            </div>
        </div>
        <div class="benifit">
            <i class="fa-solid fa-money-bill-transfer"></i>
            <div class="text">
                <h3>
                    Money-Back Guarantee
                </h3>
                <p>
                    30-day money back guarantee.
                </p>
            </div>
        </div>
        <div class="benifit">
            <i class="fa-solid fa-money-check"></i>
            <div class="text">
                <h3>
                    Secure Payments
                </h3>
                <p>
                    Secure checkout verified
                </p>
            </div>
        </div>
        <div class="benifit">
            <i class="fa-solid fa-headphones"></i>
            <div class="text">
                <h3>
                    Online Customer Service
                </h3>
                <p>
                    Call our expert <a href="tel:(084) 123 - 456 88" style="color: var(--main-color);" >(084) 123 - 456 88</a>
                </p>
            </div>
        </div>
    </section>
    <!-- End Benifits -->
    <!-- Start Shop Section -->
    <section class="shop">
        <div class="img">
            <h2>
                hoodies & sweats
            </h2>
            <p>
                Maximum durability, utility and comfort.
            </p>
            <a href="#" title="DISCOVER NOW" class="btn shop">
                <span>
                    DISCOVER NOW
                </span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
        <div class="products">
            <div class="product">
                
                <div class="ribbon save">
                    save 79%
                </div>

                <img src="imgs/product_1.jpg" class="main-img" alt="product">

                <div class="imgs-container">
                    <img src="imgs/product_1.jpg" alt="product">
                    <img src="imgs/product_1.jpg" alt="product">
                    <img src="imgs/product_1.jpg" alt="product">
                    <img src="imgs/product_1.jpg" alt="product">
                </div>

                <div class="actions">
                    <a  title="Add to Whislist">
                        <i class="fa-solid fa-heart whislist"></i>
                    </a>
                    <a  title="Quick View" class="expandIcon">
                        <i class="fa-solid fa-expand"></i>
                    </a>
                </div>

                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <p class="count">
                        (5)
                    </p>
                </div>

                <h4 class="name">
                    <a href="#">
                        Hi-Vis Premium Shell Jacket
                    </a>
                </h4>

                <div class="end">
                    <div class="prices">
                        <p class="discount">
                            186.92$
                        </p>
                        <p class="original">
                            <del>
                                901.52$
                            </del>
                        </p>
                    </div>
                    <a href="#" class="btn add-to-cart">
                        <!-- Icon -->
                        <i class="fa-solid fa-shopping-cart"></i>
                    </a>
                </div>

            </div>
            <div class="product">
                
                <div class="ribbon new">
                    New
                </div>

                <img src="imgs/product_1.jpg" class="main-img" alt="product">

                <div class="imgs-container">
                    <img src="imgs/product_1.jpg" alt="product">
                    <img src="imgs/product_1.jpg" alt="product">
                    <img src="imgs/product_1.jpg" alt="product">
                    <img src="imgs/product_1.jpg" alt="product">
                </div>

                <div class="actions">
                    <a  title="Add to Whislist">
                        <i class="fa-solid fa-heart whislist"></i>
                    </a>
                    <a  title="Quick View" class="expandIcon">
                        <i class="fa-solid fa-expand"></i>
                    </a>
                </div>

                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <p class="count">
                        (5)
                    </p>
                </div>

                <h4 class="name">
                    <a href="#">
                        Hi-Vis Premium Shell Jacket
                    </a>
                </h4>

                <div class="end">
                    <div class="prices">
                        <p class="discount">
                            186.92$
                        </p>
                        <p class="original">
                            <del>
                                901.52$
                            </del>
                        </p>
                    </div>
                    <a href="#" class="btn add-to-cart">
                        <!-- Icon -->
                        <i class="fa-solid fa-shopping-cart"></i>
                    </a>
                </div>

            </div>

        </div>
    </section>
    <!-- End Shop Section -->
    <!-- Start Discount Section -->
    <section class="discount design bottom">
        <p class="vertical">
            Get amazing deals
        </p>
        <div class="text">
                <h2>
                    up to
                    <br>
                    <p class="discount">
                        70% off
                    </p>
                </h2>   
                <p>
                    Full workwear range in stock.
                </p> 
                <div class="btns">
                    <a href="#" class="btn shop" >
                        <span>
                            Shop Mens
                        </span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="#" class="btn shop" >
                        <span>
                            Shop Womans
                        </span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
        </div>
    </section>
    <!-- End Discount Section -->
    <!-- Start Featured  -->
    <section class="featured design bottom">
        <div class="head">
            <h2>
                featured products
            </h2>
            <ul class="tags">            
                <!-- Swiper -->
                <div class="swiper tagsSwipper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <li class="active">All</li>
                        </div>
                        @foreach ($categories as  $category) 
                            <div class="swiper-slide">
                                    <li>{{$category->name}}</li>
                            </div>
                        @endforeach
                    </div>
                </div>    
            </ul>
        </div>
        <div class="body">
            <div class="products">
                @foreach ($products as $index => $product)
                    <div class="product" data-tag="{{App\Models\Category::find($product->category_id)->name}}">

                        {{-- @if ($product->ribbon) --}}
                            @if ($index % 2 === 0)
                                <div class="ribbon new">
                            @else
                                <div class="ribbon">
                            @endif
                                    {{$product->ribbon}}
                            </div>
                        {{-- @endif --}}

                        <img src="{{asset($product->main_image)}}" class="main-img" alt="product">
                        <div class="imgs-container">
                            <img src="{{asset($product->main_image)}}" class="main-img" alt="product">
                            @foreach (json_decode($product->another_images) as $img)
                                <img src="{{asset($img)}}" alt="product">
                            @endforeach
                        </div>
                        <div class="options-container">
                            <div class="optionsExpanded" style="display: none">
                                {{$product->options}}
                            </div>
                            @if ($product->options)
                                @foreach (json_decode($product->options) as $index => $option)
                                    <div 
                                        @if ($index === 0) 
                                            class="option active"
                                        @else 
                                            class="option"
                                        @endif 
                                    >

                                        {{$option}}
                                        

                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <p style="display: none" class="sku">{{$product->sku}}</p>
                        <p style="display: none" class="desc">{{$product->description}}</p>
                        <p style="display: none" class="stock">{{$product->stock}}</p>
                        <p style="display: none" class="id">{{$product->id}}</p>
                        <div class="actions">
                            <a  title="Add to Whislist">
                                <form action="/add-to-wishlist/{{$product->id}}" method="POST" class="wishListForm">
                                    @csrf
                                    <input type="hidden" name="product_id" class="product_id" value="{{$product->id}}">
                                    <button>
                                        {{-- Add Active Class If The Product In Wishlist --}}
                                        <?php $isLoved = false  ?>
                                        @auth
                                        <?php 
                                            foreach (json_decode(Auth::user()->wishlists) as $wishlistItem) {
                                                if ($wishlistItem->id == $product->id) {
                                                    $isLoved = true;
                                                }
                                            }
                                        ?>
                                        @endauth
                                        @if($isLoved)
                                            <i class="fa-solid fa-heart whislist active"></i> 
                                         @else  
                                            <i class="fa-solid fa-heart whislist"></i>
                                        @endif
                                    </button>
                                </form>
                            </a>
                            <a  title="Quick View" class="expandIcon">
                                <i class="fa-solid fa-expand"></i>
                            </a>
                        </div>

                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <p class="count">
                                (5)
                            </p>
                        </div>

                        <h4 class="name">
                            <a href="#">
                                {{$product->name}}
                            </a>
                        </h4>
        
                        <div class="end">
                            <div class="prices">
                                @if ($product->discount > 0)
                                    <p class="discount">
                                        {{-- Have Two Zero After Point Only ! --}}
                                        {{
                                            number_format($product->final_price, 2, '.', '')
                                        }}
                                       
                                    </p>
                                    <p class="original">
                                        <del>
                                        {{-- Have Two Zero After Point Only ! --}}
                                        {{
                                            number_format($product->price ,2, '.', '')
                                        }}$
                                        </del>
                                    </p>
                                @else
                                    <p>
                                        {{-- Have Two Zero After Point Only ! --}}
                                        {{
                                            number_format($product->final_price  ,2, '.', '')
                                        }}$
                                    </p>
                                @endif
                            </div>
                            <form action="/add-to-cart/{{$product->id}}" class="addToCart" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" class="product_id" value="{{$product->id}}">
                                @if (count(json_decode($product->options)) > 0)
                                    <input type="hidden" name="optionInput" class="optionInput" value="{{json_decode($product->options)[0]}}">
                                @endif
                                
                                <button class="btn">
                                    <i class="fa-solid fa-shopping-cart"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Featured  -->
    <!-- Start Testimonials -->
    <section class="testimonials design top">
        <div class="bg">

        </div>
        <div class="content">
            <p>
                <span>
                    “Excellent workwear, great
                </span>
                <span>
                    selection, good brands and
                </span>
                <span>
                    great customer service and
                </span>
                <span>
                    quick delivery.”
                </span>
            </p>
            <h4 class="author-name">
                Authoer Name
            </h4>
            <span class="date">
                28 Jun, 2023
            </span>

            <i class="fa-solid fa-quote-right comma"></i>
        </div>
    </section>
    <!-- End Testimonials -->

    <!-- Start Banner -->
    <section class="banner">
        <ul class="banner end">
            <li>
                <i class="fa-solid fa-star"></i>
            </li>
            <li>
                Sign Up Today
            </li>
            <li>
                 <i class="fa-solid fa-star"></i>
            </li>
            <li>
                Sign Up Today
                
            </li>
            <li>
                <i class="fa-solid fa-star"></i>
           </li>
            <li>
                Sign Up Today
            </li>
            <li>
                <i class="fa-solid fa-star"></i>
           </li>
        </ul>
    </section>
    <!-- End Banner -->

    <!-- Start Subcsribe -->
    <section class="subscribe">
        <h2>
            Subscribe to our mailing list
        </h2>
        <p>
            You work hard, so we made this easy. Sign up for special perks starting now with a 10% Off Coupon!
        </p>
        <form action="/storeSubscriber" method="POST">
            @csrf
            <div class="input">    
                <i class="fa-solid fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Enter Your email address">
                <button type="submit" class="btn">
                    <span>
                        Sign Up
                    </span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
            
        </form>
    </section>
    <!-- End   Subcsribe -->

    {{-- Start Parteners --}}
    <section class="parteners">
        <h2>
            Parteners
        </h2>
            <!-- Swiper -->
            <div class="swiper parnterSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="imgs/logos/bechtel_logo.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/الشركة السعودية للكهرباء.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/المرور.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/جامعة الملك سعود.png" alt="">
                    </div>
                    
                    <div class="swiper-slide">
                        <img src="imgs/logos/سليمان الحبيب.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/شركة أزميل.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/شركة البواني.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/شركة الحربي.jpeg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/شركة الخريف.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/شركة الفهد.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/شركة المباني.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/شركة سالكو.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/شركة سالكو.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/شركة سالكو.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/شركة سبك.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/شركة سوماك.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/شركة سوماك.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/شركة شبه الجزيرة.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/شركة نسما وشركاهم.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/شركة-المجال-العربي-للتشغيل-والصيانة.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/مجموعة بن لادن.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/مجموعة وادي مرامر.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/مدن.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/مستشفى الحمادي.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/مطار الملك خالد.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/موفنبيك.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/وزارة التعليم.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="imgs/logos/وزارة الصحة_page-0001.jpg" alt="">
                    </div>
                </div>
            </div>
    </section>
    
    {{-- End  Parteners --}}
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
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: true,
            },
            speed: 1000,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                // when window width is <= 900px
                900: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
        });


        var parnterSwiper = new Swiper(".parnterSwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: true,
            },
            speed: 1000,
        });
        
        var welcomeSwiper = new Swiper(".welcomeSwiper" , {
            spaceBetween: 30,
            effect: "fade",
            loop : true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: true,
            },
            pagination: {
                el: ".swiper-paginations",
                clickable: true,
            },
        })


        var tagsSwipper = new Swiper(".tagsSwipper" , {
            slidesPerView: 4,
            spaceBetween: 30,
            loop : true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        })

        @if ($errors->any())
            @foreach ($errors->all() as $index => $error)
                // Create Alert
                let alert_{{$index}} = document.createElement('div');
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
        @endif

        @if (session('msg'))

            let alert_msg = document.createElement('div');
                alert_msg.className = 'alert';
                alert_msg.textContent = "{{session('msg')}}";
                // Append
                document.querySelector('.alerts').appendChild(alert_msg);
                setTimeout(() => {
                    alert_msg.classList.add('hide');
                    setTimeout(() => {
                        alert_msg.remove();
                    }, 2000);
                }, 3000);
        
        @endif
    </script>
    <script src="js/main.js"></script>


    {{-- AJAX --}}
    <script>

        @auth 
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

                                const optionSpan = document.createElement('span');
                                optionSpan.textContent = `  (${item.option})`;

                                h4.appendChild(a);
                                h4.appendChild(optionSpan);
                                details.appendChild(h4);
                                const p = document.createElement('p');


                                const spanQuantity = document.createElement('span');
                                spanQuantity.className = 'quantity';
                                spanQuantity.textContent = item.qty;



                                const spanPrice = document.createElement('span');
                                
                                spanPrice.className = 'price';
                                // Make Two Zero After Point Only !

                                spanPrice.textContent = parseFloat(item.price).toFixed(2);
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

                            createAlert('Item added to cart successfully!');

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


            // Wishlist
            document.querySelectorAll('form.wishListForm').forEach( form => {
                form.addEventListener('submit' , (event) => {
                    event.preventDefault(); // Prevent default form submission

                    // Get form data
                    const formData = new FormData(form);

                    // AJAX request
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', `/add-to-wishlist/${form.querySelector('.product_id').value}`, true); // Replace with your actual route
                    xhr.onload = function() {
                        if (this.status >= 200 && this.status < 300) {
                            const response = JSON.parse(this.responseText);
                            // Create Alert Message
                            const response_msg = document.createElement('div');
                            response_msg.className = 'alert';
                            console.log(response);
                            
                            if (response.alert) {
                                response_msg.textContent = 'Item Removed From wishlist successfully!';
                            } else {
                                response_msg.textContent = 'Item added to wishlist successfully!';
                            }
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
        @endauth


    </script>


</body>
</html>