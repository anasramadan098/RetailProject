@extends('admin.layout.layout')

@section('content')
    <h1 class="title">
        All Categories
        <button class="btn shop addBtn" title="Add New Category"> 
            <span>
                Add New Category
            </span>
        </button>
    </h1>
    <div class="row">
        <div class="col-md-12">
            <table id="ordersTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td class="category_name">{{$category->name}}</td>
                            {{-- <td>{{ App/Model/Product::find($order->product_id)->name }}</td> --}}
                            <td class="actions">
                                <a href="?editId={{$category->id}}" title="Edit" class="btn editBtn">
                                    <span>
                                        Edit
                                    </span>
                                </a>
                                <form action="{{ route('categories.destroy', $category->id)}}"  method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                     class="btn btn-danger" title="Delete">
                                        <span>
                                            Delete
                                        </span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    {{-- Add Form --}}
    <form action=" {{ route('categories.store') }} " style="display: none" class="categoryForm add" method="POST">
        @csrf
        <h2>Add New Category</h2>
        <div class="input">
            <input type="text" placeholder="Write Categoty Name" name="name">
        </div>
        <button class="btn shop" title="Add Category">
            <span>
                Add Category
            </span>
        </button>
    </form>



    @if (request()->has('editId'))
        {{-- Edit Form --}}
        <form action="{{route('categories.update' , request('editId'))}}" class="categoryForm edit" method="POST">
            @csrf
            @method('PUT')
            <h2>Edit Category</h2>
            <div class="input">
                <input type="text" value="{{App\Models\Category::find(request('editId'))->name}}" placeholder="Write New Categoty Name" name="name">
            </div>
            <button class="btn shop" title="Edit Category">
                <span>
                    Edit Category
                </span>
            </button>
        </form>
    @endif

    <script src="{{asset('js/admin.js')}}"></script>


@endsection