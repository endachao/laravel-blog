<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    static $rules = array(
        'email'=>'required | email',
        'password'=>'required',
        'first_name'=>'required',
        'last_name'=>'required',
        'group_id'=>'required',
    );

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    // 静态保存登陆信息
    static $user;


    public static function getLoginUserName(){

        if(!isset(self::$user->first_name) && !isset(self::$user->first_name)){

            self::$user = Sentry::getUser();

        }

        return self::$user->first_name.self::$user->last_name;
    }

    public static function getLoginUserId(){
        if(!isset(self::$user->id)){

            self::$user = Sentry::getUser();
        }

        return self::$user->id;
    }
}
