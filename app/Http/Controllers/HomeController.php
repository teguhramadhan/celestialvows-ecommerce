<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            // User login, bisa akses data
            $user = auth()->user();
            return view('home', compact('user'));
        }

        // Guest, tetap tampilkan view home tanpa data login
        return view('home');
    }
}
