<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
}
