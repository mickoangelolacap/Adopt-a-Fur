<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
	use SoftDeletes;
	
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function orders(){
        return $this->belongsToMany('App\Order')->withTimestamps();
    }
}
