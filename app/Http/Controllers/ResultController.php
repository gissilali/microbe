<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;

class ResultController extends Controller
{
	public function create($category_id, $candidate_id){
		Result::create([
				'category_id' => $category_id,
				'candidate_id' => $candidate_id,
				'total_votes' => 0
			]);
	}

    public function updateResult($candidate_id){
    	$candidate_result = Result::where('candidate_id',$candidate_id)->first();
    	$candidate_result->total_votes += 1;
    	$candidate_result->update();
    }

    public function getView(){
    	return view('results');
    }

    public function getResults(Request $request){
    	return Result::where('category_id',$request['category_id'])->orderBy('total_votes', 'desc')->with('candidate')->get();
    }
}
