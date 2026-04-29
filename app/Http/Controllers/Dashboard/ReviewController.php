<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('dashboard.reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('dashboard.reviews.create');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews');
    }
}
