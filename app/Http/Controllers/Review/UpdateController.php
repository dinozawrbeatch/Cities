<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Review;

class UpdateController extends Controller
{
    public function __invoke(Review $review)
    {
        return view('reviews.show', compact('review'));
    }
}
