<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Show</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>

    <div class="productShow">
        <div class="flex">
            <div class="text">
                <h1 class="title">{{$product->name}}</h1>
                <h2>Selected Category : <span>{{App\Models\Category::find($product->category_id)->name}}</span></h2>
                <p>
                    Price : <span class="price">{{$product->price}}</span>
                </p>
                <p>
                    Description : <span>{{$product->description}}</span>
                </p>
                    
                <p>
                    SKU : <span>{{$product->sku}}</span>
                </p>
                <p>
                    Quantity : <span>{{$product->stock}}</span>
                </p>
                <p>
                    Discount : <span>{{$product->discount}}%</span>
                </p>
                <p>
                    Ribbon : <span>{{$product->ribbon}}</span>
                </p>
                <h3>Options</h3>

                @if($product->options)
                    @foreach (json_decode($product->options) as $option)
                        <p>
                            <span>{{$option}},</span>
                        </p>
                    @endforeach
                @endif
                
                <a href="{{route('products.index')}}" class="btn" title="Back">
                    <span>Back</span>
                </a>
            </div>
            <div class="img">
                <img src="{{asset($product->main_image)}}"  class="product-img"
                title="{{$product->name}}"  alt="{{$product->name}}">
            </div>
        </div>

        <div class="imgs">
            @foreach(json_decode($product->another_images) as $image)
                <img src="{{asset($image)}}" alt="{{$product->name}}" title="{{$product->name}}">
            @endforeach
        </div>
    </div>
</body>
</html>