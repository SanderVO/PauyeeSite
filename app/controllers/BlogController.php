<?php

class BlogController extends BaseController {

	/**
	* Controller for all Blog related actions
	* @author Sander
	*/

	/*
	* Index for blog page
	*/
	public function index() {
		// get all blogs orderred by date
		$blogs = BlogPost::orderBy('created_at', 'DESC')->with('reactions', 'user', 'blocks')->get();
		// return
		return View::make('blog.index')->with('posts', $blogs);
	}

	/*
	* Show for blog page
	*/
	public function show($id) {
		// get blog
		$blog = BlogPost::whereId($id)->with('reactions', 'user', 'blocks')->first();
		// Reaction
		$reaction = new Reaction;
		// return
		return View::make('blog.show')->with(array(
			'post' => $blog,
			'reaction' => $reaction
		));
	}

	/*
	* Create a blog post
	*/
	public function create() {
		// new blog
		$blog = new BlogPost;
		$blocks = [];
		// check if post
		if(Request::isMethod('post')) {
			// get input
			$blog = new BlogPost(Input::all());
			$blog->user_id = Auth::user()->id;
			// loop through blocks
			foreach(Input::get('block') as $key => $block) {
				$blocks[$key] = new Block;
				$blocks[$key]->text = $block["'text'"];
				$blocks[$key]->block_type = $block["'type'"];
				$blocks[$key]->object_type = 'blog';
				// check if picture
				if($blocks[$key]->block_type == 'picture') {
					$blocks[$key]->picture_pos = $block["'picture_pos'"];
					// get file
					if(Input::hasFile("block_picture_" . $key) && Input::file("block_picture_" . $key)->isValid()) {
						$file = Input::file("block_picture_" . $key);
						$filename = str_random(10) . "." . $file->getClientOriginalExtension();
						$file->move("assets/images/blocks/blog", $filename);
						$blocks[$key]->picture = $filename;
					}
				}
			}
			// get file
			if(Input::hasFile('picture') && Input::file('picture')->isValid()) {
				$file = Input::file('picture');
				$filename = str_random(10) . "." . $file->getClientOriginalExtension();
				$file->move("assets/images/blog", $filename);
				$blog->picture = $filename;
			} else {
				$blog->picture = null;
			}
			// save
			if($blog->save()) {
				// make name url
				$blog->name_url = str_replace(".", "", str_replace(" ", "-", strtolower($blog->title))); 
				// save and redirect
				if($blog->save()) {
					// save blocks
					foreach($blocks as $block) {
						$block->object_id = $blog->id;
						$block->save();
					}
				}
				// redirect
				return Redirect::route('blog')->with(array('message' => 'Success!'));
			} else {
				return $blog->errors();
				// unlink
				if(isset($client->picture))
					unlink("assets/images/client/" . $filename);
				foreach($blocks as $key => $block) {
					if(isset($block->picture))
						unlink("assets/images/blocks/client/" . $block->picture);
				}
				// return errors
				return View::make('blog.create')->with(array(
					'errors' => $blog->errors(), 
					'blog' => $blog,
					'blocks' => $blocks,
					'url' => 'blog/create',
					'method' => 'post'
				));
			}
		} else {
			// return edit page
			return View::make('blog.create')->with(array(
				'blog' => $blog, 
				'blocks' => $blocks,
				'url' => 'blog/create',
				'method' => 'post'
			));
		}
	}

	/*
	* Edit a blog post
	*/
	public function edit($id) {
		// get input
		$blog = BlogPost::find($id);
		// check if post
		if(Request::isMethod('put')) {
			// get input
			$blog->fill(Input::all());
			$blog->user_id = Auth::user()->id;
			// get file
			if(Input::hasFile('picture') && Input::file('picture')->isValid()) {
				$file = Input::file('picture');
				$filename = str_random(10) . "." . $file->getClientOriginalExtension();
				$file->move("assets/images/blog", $filename);
				$blog->picture = $file->getRealPath();
			}
			// save
			if($blog->save()) {
				// make name url
				$blog->name_url = str_replace(".", "", str_replace(" ", "-", strtolower($blog->title))); 
				$blog->save();
				return Redirect::route('blog')->with(array('message' => 'Success!'));
			} else {
				return View::make('blog.create')->with(array(
					'errors' => $blog->errors(),
					'blog' => $blog,
					'url' => 'blog/edit/'.$id,
					'method' => 'put'
				));
			}
		} else {
			// return edit page
			return View::make('blog.create')->with(array(
				'blog' => $blog, 
				'url' => 'blog/edit/'.$id,
				'method' => 'put'
			));
		}
	}

	/*
	* Delete a blog post
	*/
	public function delete($id) {
		// get blog
		$blog = BlogPost::find($id);
		$picture = $blog->picture;
		// get blog post
		if($blog->destroy($id)) {
			// delete picture
			unlink("assets/images/blog/" . $picture);
			// return index
			$blogs = BlogPost::orderBy('created_at', 'DESC')->with('reactions')->get();
			return Redirect::route('blog')->with('posts', $blogs);
		} else {
			return Redirect::route('blog')->with(array('message' => 'Something went wrong..'));
		}
	}

}
