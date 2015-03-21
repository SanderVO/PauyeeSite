<?php

class ReactionController extends BaseController {

	/*
	* Controller for the reactions
	* @author Sander
	*/

	/*
	* Add a reaction
	*/
	public function create() {
		// new about
		$reaction = new Reaction(Input::all());
		$reaction->ip = Request::getClientIp(true);
		// save
		if($reaction->save()) {
			// redirect
			return Redirect::route('client')->with(array('message' => 'Success!'));
		} else {
			return Redirect::route('client')->with(array('message' => 'Error!'));
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

}
