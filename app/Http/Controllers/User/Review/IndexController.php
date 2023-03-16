<?php

namespace App\Http\Controllers\User\Review;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Review;
use App\Models\User;


class IndexController extends Controller
{
    public function __invoke(User $user, City $city)
    {
        $cities = City::all();
        $reviews = Review::where('user_id', $user->id)->get();
        return view('users.reviews.index', compact('reviews', 'cities'));
    }
}
