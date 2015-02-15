<?php

use LaravelBook\Ardent\Ardent;

class About extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'about';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	/**
	* Mass Assignment protection
	*
	* @var array
	*/
	protected $fillable = array(
		'text'
	);

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules = array(
		'text' => 'required',
		'picture' => 'required'
	);

}
