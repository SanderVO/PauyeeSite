<?php

class ClientController extends BaseController {

	/*
	* Controller for the client page
	* @author Sander
	*/

	/*
	* Index for about page
	*/
	public function index() {
		// get all blogs orderred by date
		$clients = Client::orderBy('created_at', 'DESC')->get();
		// return
		return View::make('client.index')->with('clients', $clients);
	}

	/*
	* Show single client
	*/
	public function show($slug) {
		// get id
		$id = explode("-", $slug)[1];
		// get all blogs orderred by date
		$client = Client::where('id', '=', $id)->with('reactions')->get()->first();
		// make empty reaction
		$reaction = new Reaction;
		// return
		return View::make('client.show')->with(array(
			'client' => $client,
			'reaction' => $reaction
		));
	}

	/*
	* Add a client
	*/
	public function create() {
		// new about
		$client = new Client;
		$blocks = [];
		// check if post
		if(Request::isMethod('post')) {
			// get input
			$client = new Client(Input::all());
			// loop through blocks
			foreach(Input::get('block') as $key => $block) {
				$blocks[$key] = new Block;
				$blocks[$key]->text = $block["'text'"];
				$blocks[$key]->block_type = $block["'type'"];
				$blocks[$key]->object_type = 'client';
				// check if picture
				if($blocks[$key]->block_type == 'picture') {
					$blocks[$key]->picture_pos = $block["'picture_pos'"];
					// get file
					if(Input::hasFile("block_picture_" . $key) && Input::file("block_picture_" . $key)->isValid()) {
						$file = Input::file("block_picture_" . $key);
						$filename = str_random(10) . "." . $file->getClientOriginalExtension();
						$file->move("assets/images/blocks/client", $filename);
						$blocks[$key]->picture = $filename;
					}
				}
			}
			// get file
			if(Input::hasFile('picture') && Input::file('picture')->isValid()) {
				$file = Input::file('picture');
				$filename = str_random(10) . "." . $file->getClientOriginalExtension();
				$file->move("assets/images/client", $filename);
				$client->picture = $filename;
			}
			// save
			if($client->save()) {
				// make url
				$client->name_url = strtolower($client->name) . "-" . $client->id;
				// save and redirect
				if($client->save()) {
					// save blocks
					foreach($blocks as $block) {
						$block->object_id = $client->id;
						$block->save();
					}
				}
				// redirect
				return Redirect::route('client')->with(array('message' => 'Success!'));
			} else {
				return $client->errors();
				if(isset($client->picture))
					unlink("assets/images/client/" . $filename);
				foreach($blocks as $key => $block) {
					if(isset($block->picture))
						unlink("assets/images/blocks/client/" . $block->picture);
				}
				// return
				return View::make('client.create')->with(array(
					'errors' => $client->errors(), 
					'client' => $client,
					'blocks' => $blocks,
					'url' => 'clients/create',
					'method' => 'post'
				));
			}
		} else {
			// return edit page
			return View::make('client.create')->with(array(
				'client' => $client,
				'blocks' => $blocks, 
				'url' => 'clients/create',
				'method' => 'post'
			));
		}
	}

	/*
	* Edit a blog post
	*/
	public function edit($id) {
		// get input
		$client = Client::find($id);
		// check if post
		if(Request::isMethod('put')) {
			// get input
			$client->fill(Input::all());
			// get file
			if(Input::hasFile('picture') && Input::file('picture')->isValid()) {
				$file = Input::file('picture');
				$filename = str_random(10) . "." . $file->getClientOriginalExtension();
				unlink($client->picture);
				$file->move("assets/img/client", $filename);
				$client->picture = $filename;
			}
			// make url
			$client->name_url = strtolower($client->name) . "-" . $client->id;
			// save
			if($client->save()) {
				return Redirect::route('client')->with(array('message' => 'Success!'));
			} else {
				return View::make('client.create')->with(array(
					'errors' => $client->errors(),
					'url' => 'clients/edit/'.$id,
					'method' => 'put'
				));
			}
		} else {
			// return edit page
			return View::make('client.create')->with(array(
				'client' => $client, 
				'url' => 'clients/edit/'.$id,
				'method' => 'put'
			));
		}
	}

	/*
	* Delete a blog post
	*/
	public function delete($id) {
		// get blog
		$client = Client::find($id);
		$picture = $client->picture;
		// get blog post
		if($client->destroy($id)) {
			// delete picture
			unlink("assets/images/client/" . $picture);
			// return index
			$clients = Client::orderBy('created_at', 'DESC')->get();
			return Redirect::route('client')->with('clients', $clients);
		} else {
			return Redirect::route('client')->with(array('message' => 'Something went wrong..'));
		}
	}

	/*
	* Search for a client name
	*/
	public function search($term) {
		// sanitize
	    $term = mysql_real_escape_string($term);
	    $term = htmlentities($term);
		// get clients
		$clients = Client::where('name', 'LIKE', '%'.$term.'%')->get();
		// return
		if(sizeof($clients) > 0)
			return Response::json($clients)->header('status', 200);
		else
			return Response::json(['msg' => 'Geen klanten gevonden met deze naam.'])->headers('status', 404);
	}

}
