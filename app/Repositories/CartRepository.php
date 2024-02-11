<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;

class CartRepository
{
    /**
     * Finds or creates a new cart entity and creates or updates a record in the pivot table.
     * @param int $productId
     * @param int $userId
     * @return void
     */
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

    /**
     * Reduces the quantity or deletes an entry in a pivot table.
     * @param int $productId
     * @param int $userId
     * @return void
     */
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

    /**
     * Finds the user’s cart, his bonuses and calculates discounts based on the availability of discounted items.
     * @param int $userId
     * @return array
     */
    public static function discountCalculation(int $userId): array
    {
        $data = [];
        $userCart = Cart::where(['user_id' => $userId])
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
            $totalPriceByDiscountProducts = $products->map(function ($item) use ($quantityById) {
                if ($item->bonus_program) {
                    return $item->price * $quantityById[$item->id];
                }
            })->sum();
            $totalPriceWithoutDiscountProducts = $products->map(function ($item) use ($quantityById) {
                if (!$item->bonus_program) {
                    return $item->price * $quantityById[$item->id];
                }
            })->sum();
            $data = [
                'products' => $products,
                'quantity' => $quantityById,
                'totalFull' => $totalPriceByDiscountProducts + $totalPriceWithoutDiscountProducts
            ];
            $user = User::findOrfail($userId);
            if ($user->bonuses && $totalPriceByDiscountProducts) {
                if ($totalPriceByDiscountProducts - $user->bonuses > 0) {
                    $discountOnSomeProducts = ceil(($totalPriceByDiscountProducts - $user->bonuses) / $totalPriceByDiscountProducts * 100);
                    $discountedPrice = $totalPriceByDiscountProducts + $totalPriceWithoutDiscountProducts - $user->bonuses;
                    $totalDiscount = ceil(
                        ($totalPriceByDiscountProducts + $totalPriceWithoutDiscountProducts - $discountedPrice)
                            /
                            ($totalPriceByDiscountProducts + $totalPriceWithoutDiscountProducts)
                            * 100
                    );
                } else {
                    $discountOnSomeProducts = 100;
                    $discountedPrice = $totalPriceWithoutDiscountProducts - $totalPriceByDiscountProducts;
                    $totalDiscount = ceil(
                        ($totalPriceByDiscountProducts + $totalPriceWithoutDiscountProducts - $discountedPrice)
                            /
                            ($totalPriceByDiscountProducts + $totalPriceWithoutDiscountProducts)
                            * 100
                    );
                }
            }
            if (isset($discountOnSomeProducts)) {
                $data = array_merge(
                    [
                        'totalDiscount' => $totalDiscount,
                        'discountOnSomeProducts' => $discountOnSomeProducts,
                        'discountedPrice' => $discountedPrice
                    ],
                    $data
                );
            }
        }
        return $data;
    }
}
