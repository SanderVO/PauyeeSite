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
		'text',
		'user_id'
	);

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules = array(
		'title' => 'required|max:40',
		'intro' => 'required',
		'text' => 'required|min:50'
	);

	/**
	 * Reaction relationship
	 *
	 */
	public function reactions()
	{
	  return $this->hasMany('BlogReaction', 'blog_posts_id');
	}
	/**
	 * User relationship
	 *
	 */
	public function author()
	{
	  return $this->belongsTo('User', 'user_id');
	}

}
