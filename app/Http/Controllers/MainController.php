<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Repositories\CartRepository;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::dateDescending();
        $data = ['products' => $products];
        $userCart = Cart::where(['user_id' => Auth::id()])
            ->with('products:id')
            ->get();
        if ($userCart->isNotEmpty()) {
            $data['addedProducts'] = $userCart->first()
                ?->products
                ?->map(function ($item) use ($userCart) {
                    $pivotRow = $userCart->first()->products()->where('product_id', $item?->id)->first()->pivot;
                    return [$item?->id => $pivotRow->quantity];
                })->mapWithKeys(function ($item) {
                    return $item;
                })->toArray();
        }
        return view('layouts.index', $data);
    }

    public function show()
    {
        $data = CartRepository::discountCalculation(Auth::id());
        return view('layouts.cart', $data);
    }

    public function addProduct(int $id)
    {
        CartRepository::addProduct($id, Auth::id());
        return $this->index();
    }

    public function delProduct(int $id)
    {
        CartRepository::delProduct($id, Auth::id());
        return $this->index();
    }
}
