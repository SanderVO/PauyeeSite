<?php

use LaravelBook\Ardent\Ardent;

class BlogReaction extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'blog_reactions';

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
		'text'
	);

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules = array(
		'name' => 'required',
		'text' => 'required|min:10'
	);

	/**
	 * Blog relationship
	 *
	 */
	public function blog()
	{
	  return $this->belongsTo('BlogPost', 'blog_posts_id');
	}

}
