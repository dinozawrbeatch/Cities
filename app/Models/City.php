<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $guarded = false;

    public function reviews()
    {
        return $this->hasMany(Review::class,'city_id', 'id');
    }
}
