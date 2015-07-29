<?php

class VideoController extends BaseController {

	/*
	* Controller for all Video related actions
	* @author Sander
	*/

	/*
	* Index for blog page
	*/
	public function index() {
		// get all blogs orderred by date
		$videos = Video::orderBy('created_at', 'DESC')->get();
		$youtube = $this->getYoutubeMedia(4);
		// return $youtube;
		// return
		return View::make('video.index')->with([
			'videos' => $videos,
			'youtubedata' => $youtube
		]);
	}

	/*
	* Add a new video
	*/
	public function create() {
		// new blog
		$video = new Video;
		// check if post
		if(Request::isMethod('post')) {
			// get input
			$video = new Video(Input::all());
			// save
			if($video->save()) {
				return Redirect::route('video')->with(array('message' => 'Success!'));
			} else {
				return View::make('video.create')->with(array(
					'errors' => $video->errors(), 
					'video' => $video,
					'url' => 'videos/create',
					'method' => 'post'
				));
			}
		} else {
			// return edit page
			return View::make('video.create')->with(array(
				'video' => $video, 
				'url' => 'videos/create',
				'method' => 'post'
			));
		}
	}

	/*
	* Edit a blog post
	*/
	public function edit($id) {
		// get input
		$video = Video::find($id);
		// check if post
		if(Request::isMethod('put')) {
			// get input
			$video->fill(Input::all());
			// save
			if($video->save()) {
				return Redirect::route('video')->with(array('message' => 'Success!'));
			} else {
				return View::make('video.create')->with(array(
					'errors' => $video->errors(),
					'url' => 'videos/edit/'.$id,
					'method' => 'put'
				));
			}
		} else {
			// return edit page
			return View::make('video.create')->with(array(
				'video' => $video, 
				'url' => 'videos/edit/'.$id,
				'method' => 'put'
			));
		}
	}

	/*
	* Delete a video post
	*/
	public function delete($id) {
		// get video
		$video = Video::find($id);
		// get video post
		if($video->destroy($id)) {
			// return index
			$videos = Video::orderBy('created_at', 'DESC')->with('reactions')->get();
			return Redirect::route('video')->with('posts', $videos);
		} else {
			return Redirect::route('video')->with(array('message' => 'Something went wrong..'));
		}
	}

}
