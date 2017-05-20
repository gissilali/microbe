@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if (Auth::user()->approved)
                <div class="alert alert-success">
                    <h4 style="float: left;margin-right: 20px">You have been approved</h4>
                    <button class="fa fa-check btn btn-success"></button>
                    <a href="#">learn more</a>
                </div>
            @else
                <div class="alert alert-warning">
                    <h4 style="float: left;margin-right: 20px">Approval pending</h4>
                    <button class=" btn btn-warning"><i class="fa fa-spinner"></i></button>
                    <a href="#">learn more</a>
                </div>
            @endif
            <h4>Dashboard</h4>
            <div class="col-md-4">
                <div class="panel panel-default panel-item">
                    <a href="{{ url('register-candidate') }}"><i class="fa fa-user"></i></a>
                    <div class="panel-footer">
                        <h5>Register for candidacy</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default panel-item">
                    <a href="{{ url('vote') }}"><i class="fa fa-thumbs-up"></i></a>
                    <div class="panel-footer">
                        <h5>Vote</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default panel-item">
                    <a href=""><i class="fa fa-file-text"></i></a>
                    <div class="panel-footer">
                        <h5>Results</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
