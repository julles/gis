<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    public $guarded = [];

    public function users()

    {
    	return $this->belongsTo(User::class);
    }
}
