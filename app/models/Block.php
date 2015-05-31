<?php

use LaravelBook\Ardent\Ardent;

class Block extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'blocks';

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
		'block_type',
		'text',
		'picture_pos',
		'object_id',
		'object_type'
	);

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules = array(
		'block_type' => 'required',
		'text' => 'required',
		'object_id' => 'required',
		'object_type' => 'required',
		'picture' => 'required_with:picture_pos',
		'picture_pos' => 'required_with:picture'
	);

}
