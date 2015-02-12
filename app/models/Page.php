<?php

use LaravelBook\Ardent\Ardent;

class Page extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pages';

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
		'name',
	);

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules = array(
		'name' => 'required',
	);

	/**
	 * Texts relationship
	 *
	 */
	public function texts()
	{
	  return $this->hasMany('PageText', 'pages_id');
	}

}
