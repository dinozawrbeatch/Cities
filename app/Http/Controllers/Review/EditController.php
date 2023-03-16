<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Review;

class EditController extends BaseController
{
    public function __invoke(Review $review)
    {
        $cities = City::all();
        return view('reviews.edit', compact('review', 'cities'));
    }
}
