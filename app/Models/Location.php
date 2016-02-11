<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\LocationCategory;

class Location extends Model
{
    public $guarded = [];

    public function rules()

    {
    	return [

    		'user_id' => 'required',
    		'location_category_id'=> 'required',
    		'longitude' => 'required|max:255',
    		'latitude' => 'required|max:255',
    		'title' => 'required|max:255',
		];
    }

    public function messages()

    {
    	return [
    		'user_id.required' => 'The user field is required',
    	];
    }

    public function user()

    {
    	return $this->belongsTo(User::class , 'user_id');
    }

    public function locationCategory()

    {
    	return $this->belongsTo(User::LocationCategory , 'location_category_id');
    }
}
