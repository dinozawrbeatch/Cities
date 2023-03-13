<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $cityIds = $data['city_ids'];
        unset($data['city_ids']);
        if (isset($data['image'])) {
            $data['image'] = Storage::put('/images', $data['image']);
        }

        foreach ($cityIds as $cityId){
            $data['city_id'] = $cityId;
            Review::firstOrCreate($data);
        }
        return redirect()->route('city.index');
    }
}
