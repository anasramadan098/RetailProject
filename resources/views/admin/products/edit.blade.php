@extends('admin.layout.layout')

@section('content')
    <h1 class="title">
        Edit Product
    </h1>
    <form action="{{route('products.update' , $product)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{$product->name}}" required>
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
        <div class="input">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="{{$product->price}}" required>
            <small class="text-danger">{{ $errors->first('price') }}</small>
        </div>
        <div class="input">
            <label for="description">Description:</label>
            <textarea id="description" name="description"> {{$product->description}} </textarea>
            <small class="text-danger">{{ $errors->first('description') }}</small>
        </div>
        <div class="input">
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" value="{{$product->stock}}"/>
            <small class="text-danger">{{ $errors->first('stock') }}</small>
        </div>
        <div class="input">
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" required>
                <option value="{{$product->category_id}}">{{App\Models\Category::find($product->category_id)->name}}</option>
                {{-- If The Category Is $product->category_id  Not Make It--}}
                @foreach($categories as $category)
                    @if($category->id != $product->category_id)
                        <option value="{{$category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
            <small class="text-danger">{{ $errors->first('category_id') }}</small>
        </div>
        {{-- SKU --}}
        <div class="input">
            <label for="sku">SKU:</label>
            <input type="text" id="sku" name="sku" value="{{$product->sku}}">
            <small class="text-danger">{{ $errors->first('sku') }}</small>
        </div>
        {{-- Discount --}}
        <div class="input">
            <label for="discount">Discount:</label>
            <input type="number" id="discount" name="discount" value="{{$product->discount}}" >
            <small class="text-danger">{{ $errors->first('discount') }}</small>
        </div>
        {{-- Ribbon --}}
        <div class="input">
            <label for="ribbon">Ribbon:</label>
            <input type="text" id="ribbon" name="ribbon" value="{{$product->ribbon}}" >
            <small class="text-danger">{{ $errors->first('ribbon') }}</small>
        </div>
        <div class="input">
            <label for="main_img">Main Image:</label>
            <input type="file" id="main_img" name="main_img" accept=".png">
            <small class="text-danger">{{ $errors->first('main_img') }}</small>
        </div>
        <div class="input">
            <label for="images">Images:</label>
            <input type="file" id="images" name="another_images[]" accept=".png" multiple>
            <small class="text-danger">{{ $errors->first('another_images') }}</small>
        </div>

        {{-- Options --}}
        @foreach (json_decode($product->options) as $index => $option)
            <div class="input">
                <label for="option_{{$index}}">Option {{ $index }}</label>
                <input type="text" id="option_{{$index}}" name="options[]" value="{{$option}}">
                <small class="text-danger">{{ $errors->first('options.'.$index) }}</small>
            </div>
        @endforeach




        <div class="btns options">
            <a style="cursor: pointer" class="btn shop addOption" title="Add Option">
                <span>
                    Add Option
                </span>
            </a>
    
            <button type="submit" title="Edit Product" class="btn">
                <span>
                    Edit Product
                </span>
            </button>
        </div>
        

    </form>

    <script>
        let index = 0;

        document.querySelector('.btn.shop.addOption').addEventListener('click' , () => {
            const optionDiv = document.createElement('div');
            optionDiv.className = 'input ';
            

            const label = document.createElement('label');
            label.textContent = 'Option';
            label.for = 'option' + index;

            const input = document.createElement('input');
            input.type = 'text';
            input.id = 'option' + index;
            input.name = 'options[]';

            const small = document.createElement('small');


            optionDiv.appendChild(label);
            optionDiv.appendChild(input);
            optionDiv.appendChild(small);

            document.querySelector('form').insertBefore(optionDiv , document.querySelector('form .btns.options'));
            index++;

        })
    </script>
    
@endsection