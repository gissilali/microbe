<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['name', 'category_id', 'approved', 'registration_number'];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function votes(){
    	return $this->hasMany('App\Vote');
    }

    public function result(){
    	return $this->hasOne('App\Result');
    }
}
