<?php

namespace App\Http\Controllers\Vote;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vote;
use App\Result;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Auth;

class VoteContoller extends Controller
{
    public function index(){
    	return view('voting-panel');
    }

    public function getCandidates(){
    	return response($category->with('candidate'),200);
    }

    public function registerVote(Request $request){
    	if($this->isValid($request)){
    		Vote::create([
    				'category_id' => $request['category_id'],
    				'candidate_id' => $request['candidate_id'],
    				'student_id' => Auth::user()->id
    			]);
            if (count(Result::where('candidate_id', $request['candidate_id'])->first()) > 0) {
                $result = new ResultController();
                $result->updateResult($request['candidate_id']);
            } else{
                $result = new ResultController();
                $result->create($request['category_id'], $request['candidate_id']);
            }
    		return response(['message' => 'vote cast successfully', 'voted' => 'true'], 200);
    	}else{
    		return response(['message' => 'already voted you lying bitch', 'voted' => 'false'], 422);
    	}                                                                                                                                                           
    }

    public function isValid(Request $request) {
    	if(Vote::where('category_id',$request['category_id'])->where('student_id', Auth::user()->id)->first()){
    		return false;
    	}else{
    		return true;
    	}
    }

    public function confirmVote(Request $request) {
        if ($this->isValid($request)) {
            return "true";
        }else{
            return "false";
        }
    }

    public function getVotesWithCategories(){
        return response(Vote::where('student_id', Auth::user()->id)->with('category')->get());
    }

}