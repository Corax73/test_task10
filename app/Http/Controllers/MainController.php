<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::dateDescending();
        return view('layouts.index', ['products' => $products]);
    }

    public function show()
    {
        return view('layouts.cart');
    }

    public function addProduct(int $id)
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        if ($cart->products->contains($id)) {
            $pivotRow = $cart->products()->where('product_id', $id)->first()->pivot;
            $quantity = $pivotRow->quantity + 1;
            $pivotRow->update(['quantity' => $quantity]);
        } else {
            $cart->products()->attach($id, ['quantity' => 1]);
        }
        return  $this->index();
    }
}
