<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityReview extends Model
{
    use HasFactory;

    protected $table = 'city_reviews';
    protected $guarded = false;
}
