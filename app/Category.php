<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name'];

	public function candidates(){
		return $this->hasMany('App\Candidate');
	}

	public function votes(){
		return $this->hasMany('App\Vote');
	}
}
