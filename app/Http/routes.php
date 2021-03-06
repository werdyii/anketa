<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/','ResearchController@index');

Route::get('proposals/{id}','ProposalsController@index');
Route::post('proposals','ProposalsController@store');

Route::get('step1/{id}', 'ResearchController@step1');
Route::post('step1','ResearchController@storeStep1');

Route::get('step2','ResearchController@step2');
Route::post('step2','ResearchController@storeStep2');

Route::get('step3','ResearchController@step3');
Route::post('step3','ResearchController@storeStep3');

Route::get('thanks','ResearchController@thanks');

Route::get('end/{id}', ['as'=>'result', 'uses' => 'ResearchController@end']);

/*
Route::get('voters','VotersController@index');
Route::get('voters/create','VotersController@create');
Route::get('voters/{id}','VotersController@show');
Route::post('voters','VotersController@store');
*/

/**
 * ADMINISTRATION SECTION
 * 
 */

Route::group(['namespace' => 'Admin','prefix' => 'admin'], function()
{
    Route::get('/',function(){
    	return view('admin.index');
    });
	Route::resource('polls','PollsController');
    Route::resource('voters','VotersController');
});
