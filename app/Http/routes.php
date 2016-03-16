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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'api/v1/blog'], function() {
  Route::post('article/create', 'APICallsController@createArticle');
  Route::put('article/edit/{id}', 'APICallsController@editArticle');
  Route::delete('article/delete/{id}', 'APICallsController@deleteArticle');
  Route::get('article/{id}', 'APICallsController@fetchArticle');
  Route::get('articles/{skip}/{number_of_articles}', 'APICallsController@fetchRangeOfArticles');
});
