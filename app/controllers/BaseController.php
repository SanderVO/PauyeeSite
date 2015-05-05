<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/**
	* Get instagram media of player
	* @return JSON
	*/
	public function getInstagramMedia() {
		$client = new \GuzzleHttp\Client();
		$response = $client->get('https://api.instagram.com/v1/users/44021013/media/recent?client_id=9ebc396cee1b44aa8698ee87ae8067f7');
		return $response->json();
	}

	/**
	* Get youtube media
	* @return JSON
	*/
	public function getYoutubeMedia($limit) {
		$client = new \GuzzleHttp\Client();
		$response = $client->get('https://www.googleapis.com/youtube/v3/search?key=AIzaSyAhE8_gFRyLUbCjBsSAVuoL7tKrlLPDE7c&channelId=UC4v7Xq5W45aAlnX8RaQRZ1g&part=snippet,id&order=date&maxResults=' . $limit);
		return $response->json();
	}

}
