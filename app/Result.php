<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['category_id', 'candidate_id', 'total_votes'];

    public function candidate(){
    	return $this->belongsTo('App\Candidate');
    }
}
