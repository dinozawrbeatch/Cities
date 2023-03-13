<?php

namespace App\Http\Controllers\City\Review;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(City $city)
    {
        $cities = $city->reviews()->paginate(10);
        $reviews = Review::where('city_id', $city->id)->get();
        return view('cities.reviews.index', compact('cities', 'city', 'reviews'));
    }
}
