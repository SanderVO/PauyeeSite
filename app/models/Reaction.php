<?php

use LaravelBook\Ardent\Ardent;

class Reaction extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reactions';

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
		'text',
		'object',
		'object_id',
		'ip'
	);

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules = array(
		'name' => 'required',
		'text' => 'required|min:10',
		'object' => 'required',
		'object_id' => 'required',
		'ip' => 'required'
	);

	/**
	 * Blog relationship
	 *
	 */
	public function blog()
	{
	  return $this->belongsTo('BlogPost', 'object_id')->where('object', '=', 'blog');
	}

}
