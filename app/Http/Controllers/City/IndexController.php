<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Models\City;

class IndexController extends Controller
{
    public function __invoke()
    {
        $cities = City::all();
        $pageCities = City::orderBy('name')->paginate(50);
        return view('cities.index', compact('cities', 'pageCities'));
    }
}
