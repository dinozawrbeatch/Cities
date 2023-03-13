<?php

namespace App\Http\Controllers\City\Review\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke($userName)
    {
        $user = User::where('fio', $userName)->first();
        return view('cities.reviews.users.show', compact('user'));
    }
}
