<?php

namespace App\Service;

use App\Models\Review;
use Illuminate\Support\Facades\DB;

class ReviewServices
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['city_ids'])) {
                $cityIds = $data['city_ids'];
                unset($data['city_ids']);
            }
            $review = Review::firstOrCreate($data);
            if (isset($cityIds)) {
                $review->cities()->attach($cityIds);
            }
            DB::commit();
        } catch (\Exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $review)
    {
        DB::beginTransaction();
        try {
            if (isset($data['city_ids'])) {
                $cityIds = $data['city_ids'];
                unset($data['city_ids']);
            }
            $review->update($data);
            if (isset($cityIds)) {
                $review->cities()->sync($cityIds);
            } else {
                $review->cities()->detach();
            }
            DB::commit();
        } catch (\Exception) {
            DB::rollBack();
            abort(500);
        }
        return $review;
    }
}
