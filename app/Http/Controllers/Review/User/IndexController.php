<?php

namespace App\Http\Controllers\Review\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(User $user)
    {
        $reviews = Review::where('user_id', $user->id)->get();
        return view('cities.reviews.users.index', compact('reviews', 'user'));
    }
}
