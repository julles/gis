<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\LocationCategory;

class Location extends Model
{
    public $guarded = [];

    public function user()

    {
    	return $this->belongsTo(User::class , 'user_id');
    }

    public function locationCategory()

    {
    	return $this->belongsTo(User::LocationCategory , 'location_category_id');
    }
}
