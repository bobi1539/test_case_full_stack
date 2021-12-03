<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'title' => 'Home',
            'active' => 'home',
            'products' => Product::with('category')->paginate(8)
        ]);
    }
}
