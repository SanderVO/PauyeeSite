<?php

class ContactController extends BaseController {

	/*
	* Controller for the contact page
	* @author Sander
	*/

	/*
	* Contact Index
	*/
	public function index() {
		// return with errors
		return View::make('contact.contact');
	}

	/*
	* Send mail for contact form
	*/
	public function send() {
		// vars
		$output = '';
		$errors = [];
		// get input
		$input = Input::all();
		// validation
		$input['email'] != '' ? '' : $errors['email']['empty'] = 'E-mail kan niet leeg zijn.';
		strpos($input['email'],'@') !== false ? '' : $errors['email']['regex'] = 'Geen geldig e-mail adres';
		$input['name'] != '' ? '' : $errors['name']['empty'] = 'Naam kan niet leeg zijn.';
		$input['message'] != '' ? '' : $errors['message']['empty'] = 'Bericht kan niet leeg zijn.';
		strlen($input['message']) < 15 ? '' : $errors['message']['len'] = 'Bericht moet groter zijn dan 15 letters.';
		// if no errors, send mail
		if(sizeof($errors) == 0) {
			// TODO: send mail
			return View::make('contact.contact')->with(array(
				'message' => 'Bedankt! Ik zal zo snel mogelijk reageren op je bericht.',
			));
		} else {
			// return with errors
			return View::make('contact.contact')->with(array(
				'message' => 'Er ging iets fout.',
				'error' => $errors,
			));
		}
	}

}
