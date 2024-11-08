@extends('admin.layout.layout')

@section('content')
    <h1 class="title">
        All Products
        <a href="{{route('products.create')}}" class="btn shop addBtn" title="Add New Product"> 
            <span>
                Add New Product
            </span>
        </a>
    </h1>
    <div class="row">
        <div class="col-md-12">
            <table id="productsTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{$product->stock}}</td>
                            {{-- <td>{{ App/Model/Product::find($product->product_id)->name }}</td> --}}
                            <td class="actions">
                                <a href="{{ route('products.edit', $product->id)}}" title="Edit" class="btn btn-warning">
                                    <span>
                                        Edit
                                    </span>
                                </a>
                                <form action="{{ route('products.destroy', $product->id)}}"  method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                     class="btn btn-danger" title="Delete">
                                        <span>
                                            Delete
                                        </span>
                                    </button>
                                </form>
                                <a href="{{ route("products.show" , $product->id) }}" title="Show" class="btn">
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