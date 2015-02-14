<?php

class LoginController extends BaseController {

	/*
	* Controller for all Login related actions
	* @author Sander
	*/

	/*
	* Index for login page
	*/
	public function index() {
		return View::make('auth.login');
	}

	/*
	* Login action
	*/
	public function login() {
		// check if post
		if(Request::isMethod('post')) {
			// collect data
			$userdata = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			);
            // if given info matches db info
            if(Auth::validate($userdata)) {
				// remove validation because ardent
	            User::$rules = array();
	            $result = Auth::attempt(array('email' => $userdata['email'], 'password' => $userdata['password']), false);
	            // check
	            if($result) {
	            	// user logged in
	            	return Redirect::route('home');
	            } else {
	            	return View::make('auth.login')->with(array('message' => 'Something went wrong...'));
	            }
	        } else {
	        	return View::make('auth.login')->with(array('message' => 'Email or password incorrect.'));
	        }
		} else {
			// return login page
			return View::make('auth.login');
		}
	}

	/*
	* Create user action
	*/
	public function register() {
		// check if post
		if(Request::isMethod('post')) {
			// collect data
			$user = new User(Input::get());
            // if given info matches db info
            if($user->save()) {
				// login
	            User::$rules = array();
	            $result = Auth::attempt(array('email' => $user->email, 'password' => $user->password), false);
	            // check
	            if($result) {
	            	// user logged in
	            	return View::make('home');
	            } else {
	            	return View::make('auth.login')->with(array('message' => 'Something went wrong...'));
	            }
	        } else {
	        	return View::make('auth.create')->with(array('errors' => $user->errors()));
	        }
		} else {
			// return create page
			return View::make('auth.create');
		}
	}

}
