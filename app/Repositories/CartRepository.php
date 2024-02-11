<?php

namespace App\Repositories;

use App\Models\Cart;

Class CartRepository
{
    public static function addProduct(int $productId, int $userId): void
    {
        $cart = Cart::firstOrCreate(['user_id' => $userId]);
        if ($cart->products->contains($productId)) {
            $pivotRow = $cart->products()->where('product_id', $productId)->first()->pivot;
            $quantity = $pivotRow->quantity + 1;
            $pivotRow->update(['quantity' => $quantity]);
        } else {
            $cart->products()->attach($productId, ['quantity' => 1]);
        }
    }

    public static function delProduct(int $productId, int $userId): void
    {
        $cart = Cart::where(['user_id' => $userId])->get();
        if ($cart->first()->products->contains($productId)) {
            $pivotRow = $cart->first()->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->quantity > 0) {
                $quantity = $pivotRow->quantity - 1;
                if ($quantity) {
                    $pivotRow->update(['quantity' => $quantity]);
                } else {
                    $cart->first()->products()->detach($productId);
                }
            }
        }
    }
}
