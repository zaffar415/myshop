<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('home', [
            'products' => $products,
        ]);
    }

    public function shop(Request $request)
    {        
        $products = Product::with('user');
        $user = auth()->user();
        if($user) {
            $products->whereHas('user', function($q) use ($user) {
                return $q->where('city', $user->city)->where('state', $user->state);
            });
        }    

        if(isset($request->search) && $request->search) {
            $products->where('name', 'LIKE', "%$request->search%");
        }
        
        $products = $products->get();

        return view('shop', [
            'products' => $products,
        ]);
    }
}
