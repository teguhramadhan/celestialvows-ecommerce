<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
  public function index()
  {
    // uncomment ketika sudah ada product di db
    // $products = Product::latest()->take(9)->get();
    // return view('shop', compact('products'));

    return view('errors.under-construction');
  }
}
