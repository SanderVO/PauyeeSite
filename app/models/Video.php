<?php

use LaravelBook\Ardent\Ardent;

class Video extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'videos';

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
		'title',
		'description',
		'url'
	);

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules = array(
		'title' => 'required',
		'description' => 'required',
		'url' => 'required'
	);

}
