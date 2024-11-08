<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        if (Auth::user()->role == 'admin') {
            return view('admin.products.index', compact('products'));
        } else {
            return redirect('/log-in-admin');
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Send Categories
        $categories = Category::all();
        if (Auth::user()->role == 'admin') {
            return view('admin.products.create', compact('categories'));
        } else {
            return redirect('/log-in-admin');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Save Product
        $product = new Product($request->all());
        $product->final_price = $request->price;
        $product->save();


        $main_path = "products/product number $product->id/";

        // Save Main image In Specif Product Folder
        $main_img = $request->file('main_img');
        $full_name = 'main_img.' . $main_img->getClientOriginalExtension();
        $imagePath = $main_path . $full_name;
        $main_img->move(public_path($main_path), $full_name);
        $product->main_image = $imagePath;

        // Save Images In Specif Product Folder
        $imgs = $request->file('another_images');
        $another_images = json_decode($product->another_images);

        if ($another_images) {
            foreach ($imgs as $index => $img) {
                $img_name = "$index.". $img->getClientOriginalExtension();
                $imagePath = $main_path . $img_name;
                $img->move(public_path($main_path), $img_name);
                $another_images[] = $imagePath;
            }
            $product->another_images = json_encode($another_images); 
        }
        if ($product->discount) {
            $product->discount = $request->discount;
            $product->final_price = $product->price - ($product->price * $product->discount / 100);
        }
        if ($product->ribbon) {
            $product->ribbon = $request->ribbon;
        }
        // Save Options 
        if ($request->has('options')) {
            $final_options = array_filter($request->options , function ($option) {  return $option !== null && $option !== false; } );
            $product->options = json_encode($final_options);
        }
        $product->save();

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Show
        $product = Product::find($id);
        if (Auth::user()->role == 'admin') {
            return view('admin.products.show', compact('product'));
        } else {
            return redirect('/log-in-admin');
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Edit
        $product = Product::find($id);
        if (Auth::user()->role == 'admin') {
            return view('admin.products.edit', [
                'product' => $product,
                'categories' => Category::all()
            ]);
        } else {
            return redirect('/log-in-admin');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Update Product
        $product = Product::find($id);
        $product->update($request->all());
        // Edit Main Image If Send
        $main_img = $request->file('main_img');
        if ($main_img) {
            $main_path = "products/product number $product->id/";
            $main_img_name = 'main_img.'. $main_img->getClientOriginalExtension();
            $imagePath = $main_path. $main_img_name;
            $main_img->move(public_path($main_path), $main_img_name);
            $product->main_image = $imagePath;
        }
        $product->save();

        // Save New Images If Send
        $imgs = $request->file('another_images');
        $another_images = json_decode($product->another_images);
        if ($imgs) {
            // Delete Old Images
            $old_images = json_decode($product->another_images);
            foreach ($old_images as $old_image) {
                if (file_exists(public_path($old_image))) {
                    unlink(public_path($old_image));
                }
            }

            // Set New Images
            foreach ($imgs as $index => $img) {
                $img_name = "$index.". $img->getClientOriginalExtension();
                $imagePath = "products/product number $product->id/$img_name";
                $img->move(public_path("products/product number $product->id/"), $img_name);
                $another_images[] = $imagePath;
            }
            $product->another_images = json_encode($another_images);
        }


        // Discount
        if ($request->discount) {
            $product->discount = $request->discount;
            $product->final_price = $product->price - ($product->price * $product->discount / 100);
        }

        // Save Options 
        $final_options = array_filter($request->options , function ($option) {  return $option !== null && $option !== false; } );
        $product->options = json_encode($final_options);
        $product->save();


        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete Product
        Product::destroy($id);
        // Delete Product Images
        // Check If The folder Exists
        if (file_exists(public_path("products/product number $id/"))) {
            // Delete All Images
            $images = glob(public_path("products/product number $id/*"));
            foreach ($images as $image) {
                if (is_file($image)) {
                    unlink($image);
                }
            }
        }
        // Delete Product Folder If Empty
        if (count(glob(public_path("products/product number $id/*"))) == 0) {
            rmdir(public_path("products/product number $id/"));
        }

        return redirect()->route('products.index');
    }


    // Add To Cart
    public function addToCart($id) {
        // AJAX Respone
        $response = new \stdClass();

        

        $product = Product::find($id);
        $user = User::find(Auth::user()->id);

        $cart = json_decode($user->cart , 1);
        // Check If Product Already In Cart 
        if (count($cart) == 0) {
            // Change Price If Had Discount
            if ($product->discount > 0) {
                $price = $product->price - ($product->price * $product->discount / 100);
            } else {
                $price = $product->price;
            }
            $cart[] = [
                    'id' => $id,
                    'name' => $product->name,
                    'qty' => 1,
                    'price' => $product->final_price,
                    'image' => $product->main_image,
                    'option' => request()->optionInput,
            ];
            $response->cart = $cart;
            $response->status = true;
            $user->cart = json_encode($cart);
            $user->save();
            return $response;

        } else {
            // Change Price If Had Discount
            if ($product->discount > 0) {
                $price = $product->price - ($product->price * $product->discount / 100);
            } else {
                $price = $product->price;
            }
            // Increase Qty
            foreach ($cart as $key => $cart_product) {
                if ($cart_product['id'] == $id) { 
                    $cart_product['qty'] += $product->stock;
                    $cart_product['price'] = $price;
                } else {
                    $cart[] = [
                        'id' => $id,
                        'name' => $product->name,
                        'qty' => 1,
                        'price' => $product->final_price,
                        'image' => $product->main_image,
                        'option' => request()->optionInput,
                    ];
                }
            }
            $response->cart = $cart;
            $response->status = true;
            $user->cart = json_encode($cart);
            $user->save();
            return $response;
        }


    }

    // Remove From Cart
    public function removeFromCart($id) {

        

        $user = User::find(Auth::user()->id);
        $cart = json_decode($user->cart, 1);

        //   Filter The Data Witout The Specif Product
        $cart = array_filter($cart, function($value, $key) use ($id) {
            return $value['id'] != $id;
        }, ARRAY_FILTER_USE_BOTH);

        $user->cart = json_encode($cart);
        $user->save();
        return redirect()->back()->with('msg' , 'Removed Succfully');

    }
    
    // Update Cart
    public function updateCart(Request $request) {
        // AJAX Respone


        $user = User::find(Auth::user()->id);
        $cart = json_decode($user->cart, 1);
        if (json_decode($request->updates) != null) {
            foreach (json_decode($request->updates) as $id => $qty) {
                foreach ($cart as $key => $cart_product) {
                    if ($cart_product['id'] == $id) {
                        $cart[$key]['qty'] = $qty;
                    }
                }
            } 
        }

        $user->cart = json_encode($cart);
        $user->save();

        return redirect()->back()->with('msg' , 'Updated Succfully');
    }

    // Add To Whislist
    public function addToWishlists($id) {
        // AJAX Respone
        $response = new \stdClass();
        
        $product = Product::find($id);
        $user = User::find(Auth::user()->id);
        // $user->wishlists = json_encode([]);
        // $user->save();
        // return $user;
        
        $wishlists = json_decode($user->wishlists , 1);
        // Check If Product Already In wishlists
        if (count($wishlists) == 0) {
            $wishlists[] = [
                    'id' => $id,
                    'name' => $product->name,
                    'image' => $product->main_image,
                    'price' => $product->price,
            ];

            $user->wishlists = json_encode($wishlists);
            $user->save();

            $response->wishlists = $wishlists;
            $response->status = true;

            return $response;
        } else {
            // Increase Qty
            foreach ($wishlists as $key => $wishlists_product) {
                if ($wishlists_product['id'] == $id) { 
                    $this->removeFromWishlists($id , false);
                    $response->wishlists = false;
                    $response->alert = true;
                    $response->status = true;
                    return $response;
                }
            }
            $wishlists[] = [
                    'id' => $id,
                    'name' => $product->name,
                    'image' => $product->main_image,
                    'price' => $product->price,
            ];
            $response->wishlists = $wishlists;
            $response->status = true;
            $user->wishlists = json_encode($wishlists);
            $user->save();

            $response->wishlists = $wishlists;
            $response->status = true;

            return $response;
        }
    }

    // Remove From Whislist
    public function removeFromWishlists($id,$wantReturn = true) {
        $user = User::find(Auth::user()->id);
        $wishlists = json_decode($user->wishlists, 1);
        //   Filter The Data Witout The Specif Product
        $wishlists = array_filter($wishlists, function($value) use ($id) {
            return $value['id'] != $id;
        });
        $user->wishlists = json_encode($wishlists);
        $user->save();
        if ($wantReturn) {
            return redirect()->back()->with('msg' , 'Updated Succfully');
        }
    }

}
