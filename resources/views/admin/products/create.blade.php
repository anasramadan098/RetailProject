@extends('admin.layout.layout')

@section('content')
    <h1 class="title">
        Add Product
    </h1>
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
        <div class="input">
            <label for="price">Price:</label>
            <input type="number" id="price" placeholder="Write In Dollar !" name="price" required>
            <small class="text-danger">{{ $errors->first('price') }}</small>
        </div>
        <div class="input">
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
            <small class="text-danger">{{ $errors->first('description') }}</small>
        </div>
        <div class="input">
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" required/>
            <small class="text-danger">{{ $errors->first('stock') }}</small>
        </div>
        <div class="input">
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{$category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <small class="text-danger">{{ $errors->first('category_id') }}</small>
        </div>
        {{-- SKU --}}
        <div class="input">
            <label for="sku">SKU:</label>
            <input type="text" id="sku" name="sku">
            <small class="text-danger">{{ $errors->first('sku') }}</small>
        </div>
        {{-- Discount --}}
        <div class="input">
            <label for="discount">Discount:</label>
            <input type="number" id="discount" placeholder="Write In Percentage !" name="discount">
            <small class="text-danger">{{ $errors->first('discount') }}</small>
        </div>
        {{-- Ribbon --}}
        <div class="input">
            <label for="ribbon">Ribbon:</label>
            <input type="text" id="ribbon" name="ribbon">
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
        <div class="input">
            <label for="options">Options:</label>
            <input type="text" id="options" name="options[]">
            <small class="text-danger">{{ $errors->first('options') }}</small>
        </div>




        <div class="btns options">
            <a style="cursor: pointer" class="btn shop addOption" title="Add Option">
                <span>
                    Add Option
                </span>
            </a>
    
            <button type="submit" title="Add Product" class="btn">
                <span>
                    Add Product
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