<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

    public static $passwordAttributes  = array('password', 'password_confirmation');
    public $autoHashPasswordAttributes = true;
    public $autoPurgeRedundantAttributes = true;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	* Mass Assignment protection
	*
	* @var array
	*/
	protected $fillable = array(
		'email',
		'name',
		'password',
		'password_confirmation'
	);

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules = array(
		'email' => 'required|email|unique:users',
		'name' => 'required',
		'password' => 'required|confirmed',
		'password_confirmation' => 'required',
	);

	/**
	 * Blog relationship
	 *
	 */
	public function blogs()
	{
	  return $this->hasMany('BlogPost', 'user_id');
	}

}
