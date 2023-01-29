<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $products = Product::where('user_id', $user->id)->get();
        return view('products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.form', [
            'formAttributes' => [
                'url' => route('product.store'), 
                'method' => 'POST',
                'files' => true,
            ]    
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

        $image = rand(). '_' .$data['image']->getClientOriginalName();
        $data['image']->move(public_path('uploads/product/'),$image);
        $data['image'] = $image;
        $data['user_id'] = auth()->user()->id;

        Product::create($data);

        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.form', [
            'product' => $product,
            'formAttributes' => [
                'url' => route('product.update', $product->id), 
                'method' => 'PUT',
                'files' => true,
            ]    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();


        if(isset($data['image']) && file_exists(public_path('uploads/product/'. $product->image))) {
            unlink(public_path('uploads/product/'. $product->image));
            
            $image = rand(). '_' .$data['image']->getClientOriginalName();
            $data['image']->move(public_path('uploads/product/'),$image);
            $data['image'] = $image;
        }

        $data['user_id'] = auth()->user()->id;

        $product->update($data);

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(file_exists(public_path('uploads/product/'. $product->image))) {
            unlink(public_path('uploads/product/'. $product->image));
        }

        $product->delete();
        return redirect(route('product.index'));
    }
}
