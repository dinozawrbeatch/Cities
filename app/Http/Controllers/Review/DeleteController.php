<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Review;
use App\Models\User;

class DeleteController extends BaseController
{
    public function __invoke(Review $review)
    {
        $review->delete();
        return redirect()->route('user.reviews.index', auth()->user()->id);
    }
}
