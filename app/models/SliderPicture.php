<?php

use LaravelBook\Ardent\Ardent;

class SliderPicture extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'slider_pictures';

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
		'picture',
		'position'
	);

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules = array(
		'title' => 'required',
		'description' => 'required',
		'picture' => 'required',
		'position' => 'required'
	);

}
