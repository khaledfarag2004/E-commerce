<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $products = auth()->user()->products;
        return view('site.profile.index', compact('user', 'products'));
    }

}
