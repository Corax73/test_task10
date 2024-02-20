<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\User;

class CartRepository
{
    /**
     * Finds or creates a new cart entity and creates or updates a record in the summary model.
     * @param int $productId
     * @param int $userId
     * @return void
     */
    public static function addProduct(int $productId, int $userId): void
    {
        $cart = Cart::firstOrCreate(['user_id' => $userId]);
        $listProducts = CartProduct::where(['cart_id' => $cart->id, 'product_id' => $productId])->first();
        if ($listProducts) {
            $listProducts->quantity += 1;
            $listProducts->save();
        } else {
            $listProducts = CartProduct::create(
                [
                    'cart_id' => $cart->id,
                    'product_id' => $productId,
                    'quantity' => 1
                ]
            );
        }
    }

    /**
     * Decreases or deletes an entry in an summary model.
     * @param int $productId
     * @param int $userId
     * @return void
     */
    public static function delProduct(int $productId, int $userId): void
    {
        $cart = Cart::where(['user_id' => $userId])->first();
        $listProducts = CartProduct::where(['cart_id' => $cart->id, 'product_id' => $productId])->first();
        if ($listProducts) {
            if ($listProducts->quantity > 0) {
                $listProducts->quantity -= 1;
                if ($listProducts->quantity) {
                    $listProducts->save();
                } else {
                    $listProducts->delete();
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
        $userCart = Cart::where(['user_id' => $userId])->first();
        if ($userCart) {
            $quantityById = $userCart->products->map(function ($item) {
                return [$item?->product_id => $item?->quantity];
            })->mapWithKeys(function ($item) {
                return $item;
            })->toArray();
            $products = Product::dateDescendingByIds(array_keys($quantityById));
            $totalPriceByDiscountProducts = 0;
            $totalPriceWithoutDiscountProducts = 0;
            $prices = $products->map(function ($item) use ($quantityById) {
                if ($item->bonus_program) {
                    $resp = ['priceByDiscountProducts' => $item->price * $quantityById[$item->id]];
                } else {
                    $resp = ['priceWithoutDiscountProducts' => $item->price * $quantityById[$item->id]];
                }
                return $resp;
            });
            $totalPriceByDiscountProducts = $prices->sum('priceByDiscountProducts');
            $totalPriceWithoutDiscountProducts = $prices->sum('priceWithoutDiscountProducts');
            $data = [
                'products' => $products,
                'quantity' => $quantityById,
                'totalFull' => $totalPriceByDiscountProducts + $totalPriceWithoutDiscountProducts
            ];
            $user = User::findOrfail($userId);
            if ($user->bonuses && $totalPriceByDiscountProducts) {
                if ($totalPriceByDiscountProducts - $user->bonuses > 0) {
                    $discountOnSomeProducts = ceil(($totalPriceByDiscountProducts - ($totalPriceByDiscountProducts - $user->bonuses)) / $totalPriceByDiscountProducts * 100);
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
