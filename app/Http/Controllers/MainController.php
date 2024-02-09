<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('layouts.index');
    }

    public function show()
    {
        return view('layouts.cart');
    }
}
