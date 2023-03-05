<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreRequest;
use App\Models\Review;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
    }
}
