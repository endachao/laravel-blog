<?php
/**
 * 登录退出控制器
 * @author 袁超<yccphp@163.com>
 */
namespace App\Controllers\Backend;

use Auth,BaseController,Form,Input,Redirect,Sentry,View,Validator,Notification;
use Cartalyst\Sentry\Users\Kohana\User;

class PublicController extends BaseController {


    /**
     * 展示登录视图
     * @return mixed
     */
    public function index()
	{
        return View::make('backend.public.index');
	}


    /**
     * 处理登录数据
     * @return mixed
     */
    public function login()
	{

        $credentials = [
            'email'=>Input::get('email'),
            'password'=>Input::get('password'),
        ];



        $rules = array(
            'email'=>'required | email',
            'password'=>'required'
        );

        $Validator = Validator::make($credentials,$rules);

        if($Validator->passes()){

            $remember = Input::get('remember',false);
            try{
                $user = Sentry::authenticate($credentials,$remember);

                if($user){
                    return Redirect::route('backend.main.index');
                }

            }catch (\Exception $e){
                return Redirect::route('backend.login')->withErrors(array('login' => $e->getMessage()));
            }

        }else{

            return Redirect::back()->withErrors($Validator)->withInput();
        }


	}

    /**
     * 处理退出登录
     * @return mixed
     */
    public function logout(){
        Sentry::logout();
        return Redirect::route('backend.login');
    }


}