<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::group(['middleware' => ['web']], function () {
  Route::get('/', ['uses' => 'PageController@getHome', 'as' => 'home']);

  Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle']) ->where('slug', '[\w\d\-\_]+');
  Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

  Route::get('/about', 'PageController@getAbout');


  Route::get('/contact', 'PageController@getContact');

  Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);

  Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);

  Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);

  Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);

  Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);

  Route::post('/contact', 'PageController@postContact');

  Route::resource('posts','PostController');

});

Auth::routes();

Route::get('/home', 'HomeController@index');
