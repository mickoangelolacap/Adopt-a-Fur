<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /*
	One to Many (Inverse)
	Multiple Order belongs to one User
    */

    public function user(){
        return $this->belongsTo('App\User');
    }

    // multiple orders belongs to one status
    public function status(){
        return $this->belongsTo('App\Status');
    }

    /*
		Order to Product -< Many to Many
		Multiple orders belongs to many products
    */
    public function pets(){
        return $this->belongsToMany('App\Pet')->withTimestamps();
    }
}
