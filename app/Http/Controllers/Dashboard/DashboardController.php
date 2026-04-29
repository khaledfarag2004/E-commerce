<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $total_users = User::all()->count();
        $total_products = Product::all()->count();
        $products = Product::latest()->take(5)->get();
        $total_offers = Offer::all()->count();
        return view('dashboard.index', compact('total_users', 'total_products', 'products', 'total_offers'));
    }

    public function login()
    {
        return view('dashboard.auth.login.index');
    }

    public function dologin()
    {
        $data = request()->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ]);
        if (!auth()->attempt($data)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        return redirect()->route('dashboard');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
}

