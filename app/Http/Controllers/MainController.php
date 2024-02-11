<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;
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
        $data = [];
        $userCart = Cart::where(['user_id' => Auth::id()])
            ->with('products:id')
            ->get();
        if ($userCart->isNotEmpty()) {
            $quantityById = $userCart->first()
                ?->products
                ?->map(function ($item) use ($userCart) {
                    $pivotRow = $userCart->first()->products()->where('product_id', $item?->id)->first()->pivot;
                    return [$item?->id => $pivotRow->quantity];
                })->mapWithKeys(function ($item) {
                    return $item;
                })->toArray();
            $products = Product::dateDescendingByIds(array_keys($quantityById));
            $totalFull = $products->map(function ($item) use ($quantityById) {
                return $item->price * $quantityById[$item->id];
            })->sum();
            $data = [
                'products' => $products,
                'quantity' => $quantityById,
                'totalFull' => $totalFull
            ];
            if (Auth::user()->bonuses) {
                $discount = ceil(($totalFull - Auth::user()->bonuses) / $totalFull * 100);
                $discountedPrice = $totalFull - Auth::user()->bonuses;
            }
            $data = array_merge(
                [
                    'discount' => $discount,
                    'discountedPrice' => $discountedPrice
                ],
                $data
            );
        }
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
