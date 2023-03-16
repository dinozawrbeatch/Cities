<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stevebauman\Location\Facades\Location;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $cities = City::all();
        $ip = $request->ip();
        $location = Location::get($ip);
        if(Session::has('city')){
            return redirect()->route('city.reviews.index', Session::get('city'));
        }
        return view('welcome', compact('cities', 'location'));
    }
}
