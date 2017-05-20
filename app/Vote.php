<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
	protected $fillable = ['category_id', 'student_id', 'candidate_id'];

	public function category(){
		return $this->belongsTo('App\Category');
	}

}
