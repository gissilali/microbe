<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Student;
use App\Category;
use App\Candidate;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class CandidateController extends Controller
{
    public function showRegistrationForm(){
    	return view('candidate-registration')->with('categories', Category::all());
    }

    public function registerCandidate($category_id){
    	$candidate = Candidate::where('registration_number', Auth::user()->registration_number)->get();
    	if(count($candidate)>0){
    		Session::flash('candidate_exists', 'You already exists in candidates list');
    		return back();
    	} else{
    		$candidate_id = Candidate::create([
    			'name' => Auth::user()->name,
    			'category_id' => $category_id,
    			'registration_number' => Auth::user()->registration_number,
    			])->id;
            $result = new ResultController();
            $result->create($category_id, $candidate_id);
    		Session::flash('candidate_created', 'You are in the nomination list');
    		return redirect('/home');
    	}
    }

    public function getCandidates(){
        $category = new Category();
        return response($category->with('candidates')->get(),200);
    }
}
