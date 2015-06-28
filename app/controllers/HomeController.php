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
		$insta = [];
		$tmp = $this->getInstagramMedia();
		foreach($tmp['data'] as $val) {
			$insta[] = $val;
			$c++;
			if($c == 15)
				break 1;
		}
		// about
		$about = About::first();
		// return
		return View::make('home.home')->with(array(
			'pictures' => $pics,
			'instadata' => $insta,
			'about' => $about
		));
	}

}
