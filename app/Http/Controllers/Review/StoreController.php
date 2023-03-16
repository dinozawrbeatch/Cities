<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreRequest;
use App\Models\City;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $cities = City::all();

        if(isset($data['city_ids'])){
            $cityIds = $data['city_ids'];
            unset($data['city_ids']);
            foreach ($cityIds as $cityId) {
                $data['city_id'] = $cityId;
                Review::firstOrCreate($data);
            }
        }

        if (isset($data['image'])) {
            $data['image'] = Storage::put('/images', $data['image']);
        }

        $data['city_id'] = 1;
        if (isset($cityIds)) {
            $review = Review::firstOrCreate($data);
            $review->cities()->attach($cityIds);
        } else {
            foreach ($cities as $city) {
                Review::firstOrCreate($data);
                $data['city_id']++;
            }
        }
        return redirect()->route('city.index');
    }
}
