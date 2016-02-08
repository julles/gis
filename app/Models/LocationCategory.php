<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
class LocationCategory extends Model
{
    public $guarded = [];

    public function rules($id = "")

    {
    	return [
    		'location_category' => 'required|max:225',
    		'colour' => 'max:7',
    	];
    }

    public function locations()

    {
    	return $this->hasMany(Location::class);
    }
}
