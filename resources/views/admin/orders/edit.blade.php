@extends('admin.layout.layout')

@section('content')
    <h2>Edit Order</h2>
    <form action="{{  route(  "orders.update" , ["order" => $order->id]  )}}" method="POST">
        @method('PUT')
        @csrf
        <div class="input">
            <label for="customer_name">Customer Name:</label>
            <input type="text" id="customer_name" name="customer_name" value="{{ $order->customer_name }}">
            <small class="text-danger">{{ $errors->first('customer_name') }}</small>
        </div>
        {{-- <div class="input">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="{{ $order->qdy }}">
            <small class="text-danger">{{ $errors->first('quantity') }}</small>
        </div> --}}
        <div class="input">
            <label for="payment_status">Payment Status:</label>
            <select name="payment_status" id="payment_status">
                <option value="{{$order->payment_status}}" selected>{{$order->payment_status}}</option>
                <option value="Paid" >Paid</option>
                <option value="Unpaid" >Unpaid</option>
                <option value="Failed" >Failed</option>
                <option value="Refunded" >Refunded</option>
                <option value="Voided" >Voided</option>
            </select>
            <small class="text-danger">{{ $errors->first('payment_status') }}</small>
        </div>
        <div class="input">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{$order->address}}">
            <small class="text-danger">{{ $errors->first('address') }}</small>
        </div>
        <div class="input">        
            <label for="order_status">Order Status:</label>
            <select name="order_status" id="order_status">
                <option value="{{$order->order_status}}" selected>{{$order->order_status}}</option>
                <option value="Pending" >Pending</option>
                <option value="Shipped" >Shipped</option>
                <option value="Delivered" >Delivered</option>
                <option value="Cancelled" >Cancelled</option>
                <option value="Returned" >Returned</option>
                <option value="Refunded" >Refunded</option>
                <option value="Failed" >Failed</option>
            </select>
            <small class="text-danger">{{ $errors->first('order_status') }}</small>
        </div>
        <button class="btn" title="Update order">
            <span>
                Update order
            </span>
        </button>
    </form>

@endsection