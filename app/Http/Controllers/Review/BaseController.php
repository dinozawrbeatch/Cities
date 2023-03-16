<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Service\ReviewServices;

class BaseController extends Controller
{
    public $service;

    public function __construct(ReviewServices $service)
    {
        $this->service = $service;
    }
}
