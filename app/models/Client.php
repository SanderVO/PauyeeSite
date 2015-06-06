<?php

use LaravelBook\Ardent\Ardent;

class Client extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'clients';

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
		'name_url',
		'description',
		'text'
	);

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules = array(
		'name' => 'required',
		'description' => 'required'
	);

	/**
	 * Reactions relationship
	 *
	 */
	public function reactions()
	{
	  return $this->hasMany('Reaction', 'object_id')->where('object', '=', 'client');
	}
	/**
	 * Blocks relationship
	 *
	 */
	public function blocks()
	{
	  return $this->hasMany('Block', 'object_id')->where('object_type', '=', 'client');
	}

}
