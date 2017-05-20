@extends('layouts.app')
@section('content')
	<div class="container">
	    <div class="row">
	        <div class="col-md-4 col-md-offset-4">
	        	@if (Session::has('candidate_exists'))
	        		<div class="alert alert-warning">
	        			{{ Session::get('candidate_exists') }} <i class="fa fa-meh-o"></i>
	        		</div>
	        	@endif
	            <h4>Categories</h4>
	            <div class="list-group">
	            	@foreach ($categories as $category)
	            	<div class="list-group-item">
	            		<a href="{{ url('register-candidate/'.$category->id) }}" class="list-group-item-text">{{ $category->name }}</a>
	            	</div>
	            @endforeach
	            </div>
	        </div>
	    </div>
	</div>
@endsection