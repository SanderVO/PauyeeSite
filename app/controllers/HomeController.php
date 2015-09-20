<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index() {
		// get slider pictures
		$pics = SliderPicture::orderBy('position', 'ASC')->get();
		// get instagram pictures
		$c = 0;
		// about
		$about = About::first();
		$tmpar = explode(". ", $about->text);
		$about->text = "";
		for($i=0;$i<4;$i++) {
			if(isset($tmpar[$i]))
				$about->text .= $tmpar[$i] . ". ";
		}
		// return
		return View::make('home.home')->with(array(
			'pictures' => $pics,
			'about' => $about
		));
	}

}
