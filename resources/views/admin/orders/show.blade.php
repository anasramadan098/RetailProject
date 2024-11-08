@extends('admin.layout.layout')

@section('content')
<style>
    .products_order {
        padding: 10px;
        border: 1px solid #ddd;
        margin: 10px;
    }
</style>
    <h1>Order All Detials</h1>
    <div class="detials">
        <div class="detail">
            <h2>Order ID: <span>#{{ $order->id }}</span></h3>
            <p>Customer Name: <span>{{ $order->name }}</span></p>
            <p>Order Date: <span>{{ $order->created_at }}</span></p>
            <p>Total Price: <span>{{ $order->total_price }}</span></p>
        </div>
        <div class="detail">
            <h3>Products</h3>
            <div class="products_order">
                @foreach(json_decode($order->products_id) as $product_cart)
                <p>Product ID: <span>{{ $product_cart->id }}</span></p>
                <?php 
                    $product = \App\Models\Product::find($product_cart->id);
                ?>
                <p>Product Name: <span>{{ $product->name }}</span></p>
                <p>Product Price: <span>{{ $product->price }}</span></p>
                <p>Product Quantity: <span>{{ $product_cart->qty }}</span></p>
                @endforeach
            </div>
            <p>Notes: <span>{{ $order->notes }}</span></p>
        </div>
        <div class="detail">
            <h3>Address: {{ $order->address }}</h3>
            <p>Payment Method: <span>{{ $order->payment_method }}</span></p>
            <p>Order Status: <span>{{ $order->order_status }}</span></p>
            <p>Payment Status: <span>{{ $order->payment_status }}</span></p>
        </div>
        <div class="detail">
            <h3>Review: <span>{{ $order->review }}</span></h3>
            <p>Coupon: <span>{{ $order->coupon }}</span></p>
        </div>
        <a href="{{route('orders.index')}}" class="btn" title="All Orders">
            <span>
                All Orders
            </span>
        </a>
    </div>

@endsection