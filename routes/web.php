<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
	Route::get('register-candidate', 'Candidate\CandidateController@showRegistrationForm');
	Route::get('register-candidate/{category_id}', 'Candidate\CandidateController@registerCandidate');
    Route::get('vote', 'Vote\VoteContoller@index');
    Route::get('get-candidates', 'Candidate\CandidateController@getCandidates');
    Route::post('vote', 'Vote\VoteContoller@registerVote');
    Route::get('votes-with-category', 'Vote\VoteContoller@getVotesWithCategories');
    Route::get('results', 'ResultController@getView');
    Route::post('results', 'ResultController@getResults');
});

Route::group(['prefix' => 'admin'], function(){
        Route::get('home', 'Admin\DashboardController@index');
		// Authentication Routes...
        Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'Admin\Auth\LoginController@login');
        Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

        // Registration Routes...
        Route::get('register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('admin.register');
        Route::post('register', 'Admin\Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Admin\Auth\ResetPasswordController@reset');
});