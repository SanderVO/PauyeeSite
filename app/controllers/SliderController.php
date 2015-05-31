<?php

class SliderController extends BaseController {

	/*
	* Controller for all Blog related actions
	* @author Sander
	*/

	/*
	* Index for blog page
	*/
	public function index() {
		// get all blogs orderred by date
		$sliders = SliderPicture::orderBy('position', 'ASC')->get();
		// return
		return View::make('slider.index')->with('sliders', $sliders);
	}

	/*
	* Create a slider picture
	*/
	public function create() {
		// new picture
		$slider = new SliderPicture;
		// check if post
		if(Request::isMethod('post')) {
			// get input
			$slider = new SliderPicture(Input::all());
			// get file
			if(Input::hasFile('picture') && Input::file('picture')->isValid()) {
				$file = Input::file('picture');
				$filename = str_random(10) . "." . $file->getClientOriginalExtension();
				$file->move("assets/images/slider", $filename);
				$slider->picture = $filename;
			}
			// save
			if($slider->save()) {
				return Redirect::route('slider')->with(array('message' => 'Success!'));
			} else {
				return View::make('slider.create')->with(array(
					'errors' => $slider->errors(), 
					'slider' => $slider,
					'url' => 'sliders/create',
					'method' => 'post'
				));
			}
		} else {
			// return edit page
			return View::make('slider.create')->with(array(
				'slider' => $slider, 
				'url' => 'sliders/create',
				'method' => 'post'
			));
		}
	}

	/*
	* Edit a slider picture
	*/
	public function edit($id) {
		// get input
		$slider = SliderPicture::find($id);
		// check if post
		if(Request::isMethod('put')) {
			// save old position
			$oldpos = $slider->position;
			// get input
			$slider->fill(Input::all());
			// get file
			if(Input::hasFile('picture') && Input::file('picture')->isValid()) {
				$file = Input::file('picture');
				$filename = str_random(10) . "." . $file->getClientOriginalExtension();
				$file->move("assets/images/slider", $filename);
				$slider->picture = $filename;
			}
			// check positions
			if($oldpos != $slider->position) {
				// switch positions
				$oldslider = SliderPicture::where('position', '=', $slider->position)->get()->first();
				$oldslider->position = $oldpos;
				if($slider->validate())
					$oldslider->save();
			}
			// save
			if($slider->save()) {
				return Redirect::route('slider')->with(array('message' => 'Success!'));
			} else {
				return View::make('slider.create')->with(array(
					'errors' => $slider->errors(),
					'slider' => $slider,
					'url' => 'sliders/edit/'.$id,
					'method' => 'put'
				));
			}
		} else {
			// return edit page
			return View::make('slider.create')->with(array(
				'slider' => $slider, 
				'url' => 'sliders/edit/'.$id,
				'method' => 'put'
			));
		}
	}

	/*
	* Delete a slider picture post
	*/
	public function delete($id) {
		// get slider picture
		$slider = SliderPicture::find($id);
		$picture = $slider->picture;
		// get slider picture post
		if($slider->destroy($id)) {
			// delete picture
			unlink("assets/images/slider/" . $picture);
			// return index
			$pictures = SliderPicture::orderBy('created_at', 'DESC')->with('reactions')->get();
			return Redirect::route('slider')->with('pictures', $pictures);
		} else {
			return Redirect::route('slider')->with(array('message' => 'Something went wrong..'));
		}
	}

}
