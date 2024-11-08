<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ordersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();

        if (Auth::user()->role == 'admin') {
            return view('admin.orders.index', compact('orders'));
        } else {
            return redirect('/log-in-admin');
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Edit On Specif Things
        // $request->merge(['order_status' => 'pending']);

        // Save Order
        $order = new Order($request->all());
        $order->save();

        // Empty The Cart
        $user = User::find(Auth::user()->id);
        $user->cart = json_encode([]);
        $user->save();

        return redirect('/')->with('msg' , 'Ordered Succfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        if (Auth::user()->role == 'admin') {
            return view('admin.orders.show', compact('order'));
        } else {
            return redirect('/log-in-admin');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::find($id);
        if (Auth::user()->role == 'admin') {
            return view('admin.orders.edit', compact('order'));
        } else {
            return redirect('/log-in-admin');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Update Order
        $order = Order::find($id);
        $order->quantity = $request->quantity;
        $order->payment_method = $request->payment_method;
        $order->address = $request->address;
        $order->order_status = $request->order_status;
        $order->save();
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete Order
        Order::destroy($id);
        return redirect()->route('orders.index');


    }
}
