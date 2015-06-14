<?php

use LaravelBook\Ardent\Ardent;

class BlogPost extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'blog_posts';

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
		'intro',
		'user_id'
	);

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules = array(
		'title' => 'required|max:40',
		'intro' => 'required'
	);

	/**
	 * Reaction relationship
	 *
	 */
	public function reactions()
	{
	  return $this->hasMany('Reaction', 'object_id')->where('object', '=', 'blog');
	}
	/**
	 * User relationship
	 *
	 */
	public function user()
	{
	  return $this->belongsTo('User', 'user_id');
	}
	/**
	 * Blocks relationship
	 *
	 */
	public function blocks()
	{
	  return $this->hasMany('Block', 'object_id')->where('object_type', '=', 'blog');
	}

}
