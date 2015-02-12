<?php

class BlogController extends BaseController {

	/*
	* Controller for all Blog related actions
	* @author Sander
	*/

	/*
	* Index for blog page
	*/
	public function index() {
		return View::make('blog.index');
	}

	/*
	* Create a blog post
	*/
	public function create() {
		// check if post
		if(Request::isMethod('post')) {
			// get input
			$blog = new BlogPost(Input::all());
			// save
			if($blog->save()) {
				return View::make('blog.index')->with(array('message' => 'Success!'));
			} else {
				return View::make('blog.create')->with($blog->errors());
			}
		} else {
			// return edit page
			return View::make('blog.create');
		}
	}

}
