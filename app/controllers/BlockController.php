<?php

class BlockController extends BaseController {

	/*
	* Controller for all Block related actions
	* @author Sander
	*/

	/*
	* Return new block
	*/
	public function newBlock($type, $block_type) {
		// make new
		$block = new Block;
		$block->type = $block_type;
		$block->object_type = $type;
		// return
		return Response::json($block);
	}

	/*
	* Create a blog post
	*/
	public function create() {
		// new blog
		$blog = new BlogPost;
		// check if post
		if(Request::isMethod('post')) {
			// get input
			$blog = new BlogPost(Input::all());
			$blog->user_id = Auth::user()->id;
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
				$blog->save();
				return Redirect::route('blog')->with(array('message' => 'Success!'));
			} else {
				return View::make('blog.create')->with(array(
					'errors' => $blog->errors(), 
					'blog' => $blog,
					'url' => 'blog/create',
					'method' => 'post'
				));
			}
		} else {
			// return edit page
			return View::make('blog.create')->with(array(
				'blog' => $blog, 
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
