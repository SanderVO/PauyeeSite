<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
* Home
*/
Route::any('/', array('as' => 'home', 'uses' => 'HomeController@index'));

/*
* Login, etc.
*/
Route::get('/login', array('as' => 'login', 'uses' => 'LoginController@index'));
Route::post('/login', array('before' => 'csrf', 'as' => 'login.post', 'uses' => 'LoginController@login'));
Route::get('/register', array('as' => 'register', 'uses' => 'LoginController@register'));
Route::post('/register', array('before' => 'csrf', 'as' => 'register.post', 'uses' => 'LoginController@register'));

/*
* Blog
*/
Route::group(array('prefix' => 'blog'), function() {
	Route::any('/', array('as' => 'blog', 'uses' => 'BlogController@index'));
	Route::post('/create', array('before' => 'auth|csrf', 'as' => 'blog.create', 'uses' => 'BlogController@create'));
	Route::get('/create', array('before' => 'auth', 'as' => 'blog.create.page', 'uses' => 'BlogController@create'));
	Route::get('/edit/{id}', array('before' => 'auth', 'as' => 'blog.edit.page', 'uses' => 'BlogController@edit'));
	Route::put('/edit/{id}', array('before' => 'auth', 'as' => 'blog.edit', 'uses' => 'BlogController@edit'));
	Route::delete('/delete/{id}', array('before' => 'auth', 'as' => 'blog.delete', 'uses' => 'BlogController@delete'));
});