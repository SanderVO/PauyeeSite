<?php

use LaravelBook\Ardent\Ardent;

class PageMedia extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'page_media';

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
		'url',
		'type',
		'page_texts_id'
	);

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules = array(
		'url' => 'required',
		'type' => 'required',
		'page_texts_id' => 'required'
	);

	/**
	 * Page relationship
	 *
	 */
	public function text()
	{
	  return $this->belongsTo('PageText', 'page_texts_id');
	}

}
