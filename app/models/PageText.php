<?php

use LaravelBook\Ardent\Ardent;

class PageText extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'page_texts';

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
		'element',
		'pages_id'
	);

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules = array(
		'name' => 'required',
		'element' => 'required',
		'pages_id' => 'required'
	);

	/**
	 * Page relationship
	 *
	 */
	public function page()
	{
	  return $this->belongsTo('Page', 'pages_id');
	}
	/**
	 * Media relationship
	 *
	 */
	public function media()
	{
	  return $this->hasMany('PageMedia', 'page_texts_id');
	}

}
