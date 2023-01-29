<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $orders = Order::with(['user', 'product'])->whereHas('product', function($q) use ($user) {
            $q->where('user_id', $user->id);
        })->get();
        return view('orders.index', [
            'orders' => $orders,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $product_id)
    {
        $user = auth()->user();
        $product = Product::findOrFail($product_id);
        $my_products = Product::where('user_id', $user->id)->get();

        return view('checkout', [
            'product' => $product,
            'my_products' => $my_products,
            'user' => $user
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user = auth()->user();        
        User::find($user->id)->update($data);
        $data['address'] = $data['address'] . ' '. $data['city'] . ' '. $data['state'] . ' ' . $data['pincode'];
        $data['user_id'] = $user->id;
        $data['status'] = 'Pending';
        $order = Order::create($data);

        return redirect(route('order.show', $order->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);        
        return view('orders.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        // return view('orders.form', [
        //     'order' => $order,        
        //     'user' => $order->user,
        //     'product' => $order->product,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {        
        $order->update([
            'status' => $request->status,
        ]);

        return redirect(route('order.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
