<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\UpdateRequest;
use App\Models\City;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Review $review)
    {
        $cities = City::all();
        $pageCities = City::orderBy('name')->paginate(50);

        $data = $request->validated();
        $this->service->update($data, $review);

        if (isset($data['city_ids'])) {
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

        return view('cities.index', compact('review', 'cities', 'pageCities'));
    }
}
