<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
  public function index()
  {
        $products = Product::latest()->paginate(12); // atau ->get() kalau nggak mau paginate
        return view('components.customer.shop.index', compact('products'));
  }
}
