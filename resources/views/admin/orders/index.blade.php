@extends('admin.layout.layout')

@section('content')
    <h1 class="title">
        All Orders
    </h1>
    <div class="row">
        <div class="col-md-12">
            <table id="ordersTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Reciver Name</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{$order->order_status}}</td>
                            {{-- <td>{{ App/Model/Product::find($order->product_id)->name }}</td> --}}
                            <td class="actions">
                                <a href="{{ route('orders.edit', $order->id)}}" title="Edit" class="btn btn-warning">
                                    <span>
                                        Edit
                                    </span>
                                </a>
                                <form action="{{ route('orders.destroy', $order->id)}}"  method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                     class="btn btn-danger" title="Delete">
                                        <span>
                                            Delete
                                        </span>
                                    </button>
                                </form>
                                <a href="{{ route("orders.show" , $order->id) }}" title="Show" class="btn">
                                    <span>Show</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection