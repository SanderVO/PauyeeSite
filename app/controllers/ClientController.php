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
	* Add a client
	*/
	public function create() {
		// new about
		$client = new Client;
		// check if post
		if(Request::isMethod('post')) {
			// get input
			$client = new Client(Input::all());
			// get file
			if(Input::hasFile('picture') && Input::file('picture')->isValid()) {
				$file = Input::file('picture');
				$filename = str_random(10) . "." . $file->getClientOriginalExtension();
				$file->move("assets/images/client", $filename);
				$client->picture = $filename;
			}
			// save
			if($client->save()) {
				return Redirect::route('client')->with(array('message' => 'Success!'));
			} else {
				if(isset($client->picture))
					unlink("assets/images/client/" . $filename);
				return View::make('client.create')->with(array(
					'errors' => $client->errors(), 
					'client' => $client,
					'url' => 'clients/create',
					'method' => 'post'
				));
			}
		} else {
			// return edit page
			return View::make('client.create')->with(array(
				'client' => $client, 
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

}
