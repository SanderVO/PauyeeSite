<?php

class AboutController extends BaseController {

	/*
	* Controller for the about me page
	* @author Sander
	*/

	/*
	* Index for about page
	*/
	public function index() {
		// get all blogs orderred by date
		$text = About::get()->first();
		// return
		return View::make('about.index')->with('text', $text);
	}

	/*
	* Create a about post
	*/
	public function create() {
		// new about
		$about = new About;
		// check if post
		if(Request::isMethod('post')) {
			// get input
			$about = new About(Input::all());
			// get file
			if(Input::hasFile('picture') && Input::file('picture')->isValid()) {
				$file = Input::file('picture');
				$filename = str_random(10) . "." . $file->getClientOriginalExtension();
				$file->move("assets/images/about", $filename);
				$about->picture = $filename;
			}
			// save
			if($about->save()) {
				return Redirect::route('about')->with(array('message' => 'Success!'));
			} else {
				unlink("assets/images/about/" . $filename);
				return View::make('about.create')->with(array(
					'errors' => $about->errors(), 
					'about' => $about,
					'url' => 'about/create',
					'method' => 'post'
				));
			}
		} else {
			// return edit page
			return View::make('about.create')->with(array(
				'about' => $about, 
				'url' => 'about/create',
				'method' => 'post'
			));
		}
	}

	/*
	* Edit a blog post
	*/
	public function edit($id) {
		// get input
		$about = About::find($id);
		// check if post
		if(Request::isMethod('put')) {
			// get input
			$about->fill(Input::all());
			// get file
			if(Input::hasFile('picture') && Input::file('picture')->isValid()) {
				$file = Input::file('picture');
				$filename = str_random(10) . "." . $file->getClientOriginalExtension();
				unlink($about->picture);
				$file->move("assets/images/about", $filename);
				$about->picture = "assets/images/about/" . $filename;
			}
			// save
			if($about->save()) {
				return Redirect::route('about')->with(array('message' => 'Success!'));
			} else {
				return View::make('about.create')->with(array(
					'errors' => $about->errors(),
					'url' => 'about/edit/'.$id,
					'method' => 'put'
				));
			}
		} else {
			// return edit page
			return View::make('about.create')->with(array(
				'about' => $about, 
				'url' => 'about/edit/'.$id,
				'method' => 'put'
			));
		}
	}

}
