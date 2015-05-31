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
* API
*/
Route::group(array('prefix' => 'api'), function() {

	/*
	* About
	*/
	Route::group(array('prefix' => 'about'), function() {
		Route::match(array('GET', 'POST'), '/create', array('before' => 'auth', 'as' => 'about.create', 'uses' => 'AboutController@create'));
		Route::match(array('GET', 'PUT'), '/edit/{id}', array('before' => 'auth', 'as' => 'about.edit', 'uses' => 'AboutController@edit'));
	});

	/*
	* Blocks
	*/
	Route::group(array('prefix' => 'blocks'), function() {
		Route::get('/{type}/{block_type}', array('before' => 'auth', 'as' => 'about.create', 'uses' => 'BlockController@newBlock'));
	});

});

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

/*
* About
*/
Route::group(array('prefix' => 'about'), function() {
	Route::any('/', array('as' => 'about', 'uses' => 'AboutController@index'));
	Route::match(array('GET', 'POST'), '/create', array('before' => 'auth', 'as' => 'about.create', 'uses' => 'AboutController@create'));
	Route::match(array('GET', 'PUT'), '/edit/{id}', array('before' => 'auth', 'as' => 'about.edit', 'uses' => 'AboutController@edit'));
});

/*
* Clients
*/
Route::group(array('prefix' => 'clients'), function() {
	Route::any('/', array('as' => 'client', 'uses' => 'ClientController@index'));
	Route::match(array('GET', 'POST'), '/create', array('before' => 'auth', 'as' => 'client.create', 'uses' => 'ClientController@create'));
	Route::match(array('GET', 'PUT'), '/edit/{id}', array('before' => 'auth', 'as' => 'client.edit', 'uses' => 'ClientController@edit'));
	Route::delete('/delete/{id}', array('before' => 'auth', 'as' => 'client.delete', 'uses' => 'ClientController@delete'));
	Route::any('/{slug}', array('as' => 'client.show', 'uses' => 'ClientController@show'));
	Route::get('/search/{term}', array('as' => 'client.search', 'uses' => 'ClientController@search'));
});

/*
* Videos
*/
Route::group(array('prefix' => 'videos'), function() {
	Route::any('/', array('as' => 'video', 'uses' => 'VideoController@index'));
	Route::match(array('GET', 'POST'), '/create', array('before' => 'auth', 'as' => 'video.create', 'uses' => 'VideoController@create'));
	Route::match(array('GET', 'PUT'), '/edit/{id}', array('before' => 'auth', 'as' => 'video.edit', 'uses' => 'VideoController@edit'));
	Route::delete('/delete/{id}', array('before' => 'auth', 'as' => 'video.delete', 'uses' => 'VideoController@delete'));
});

/*
* Reactions
*/
Route::group(array('prefix' => 'reactions'), function() {
	Route::any('/', array('as' => 'reaction', 'uses' => 'ReactionController@index'));
	Route::post('/create', array('as' => 'reaction.create', 'uses' => 'ReactionController@create'));
	Route::match(array('GET', 'PUT'), '/edit/{id}', array('before' => 'auth', 'as' => 'reaction.edit', 'uses' => 'ReactionController@edit'));
});

/*
* Contact
*/
Route::group(array('prefix' => 'contact'), function() {
	Route::any('/', array('as' => 'contact', 'uses' => 'ContactController@index'));
	Route::post('send', array('as' => 'contact.create', 'uses' => 'ContactController@send'));
});

/*
* Slider
*/
Route::group(array('prefix' => 'sliders'), function() {
	Route::any('/', array('as' => 'slider', 'uses' => 'SliderController@index'));
	Route::match(array('GET', 'POST'), '/create', array('before' => 'auth', 'as' => 'slider.create', 'uses' => 'SliderController@create'));
	Route::match(array('GET', 'PUT'), '/edit/{id}', array('before' => 'auth', 'as' => 'slider.edit', 'uses' => 'SliderController@edit'));
	Route::delete('/delete/{id}', array('before' => 'auth', 'as' => 'slider.delete', 'uses' => 'SliderController@delete'));
});