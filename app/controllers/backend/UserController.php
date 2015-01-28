<?php
namespace App\Controllers\Backend;
use Auth,BaseController,Form,Input,Redirect,Sentry,View,Validator,Notification;
use User,UserGroup;
class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /backend/user
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        return View::make('backend.user.index')->withUser(User::orderBy('id', 'desc')->paginate(15));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /backend/user/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make('backend.user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /backend/user
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $user = array(
            'email'=>Input::get('email'),
            'password'=>Input::get('password'),
            'first_name'=>Input::get('first_name'),
            'last_name'=>Input::get('last_name'),
            'group_id'=>Input::get('group_id'),
            'activated'=>Input::get('activated')
        );

        $validator = Validator::make($user,User::$rules);

        if($validator->passes()){

            Sentry::getUserProvider()->create(array(
                'email'      =>$user['email'],
                'password'   =>$user['password'],
                'first_name' =>$user['first_name'],
                'last_name'  =>$user['last_name'],
                'activated'  =>$user['activated'],
            ));

            // 将用户加入用户组
            $adminUser  = Sentry::getUserProvider()->findByLogin($user['email']);
            $adminGroup = Sentry::getGroupProvider()->findById($user['group_id']);
            $adminUser->addGroup($adminGroup);

            Notification::success('创建管理员成功');
            return Redirect::route('backend.user.index');
        }

        Notification::error('添加失败');
        return Redirect::back()->withErrors($validator)->withInput();
	}

	/**
	 * Display the specified resource.
	 * GET /backend/user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /backend/user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
        return View::make('backend.user.edit')->withUser(User::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /backend/user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
        $user = array(
            'email'=>Input::get('email'),
            'password'=>Input::get('password'),
            'first_name'=>Input::get('first_name'),
            'last_name'=>Input::get('last_name'),
            'group_id'=>Input::get('group_id'),
            'activated'=>Input::get('activated')
        );

        $rules = User::$rules;

        unset($rules['password']);

        $validator = Validator::make($user,$rules);

        if($validator->passes()){

            $userModel = Sentry::findUserById($id);

            // password
            if(!empty($user['password'])){
                $userModel->password = $user['password'];
            }

            $userModel->email = $user['email'];
            $userModel->first_name = $user['first_name'];
            $userModel->last_name = $user['last_name'];
            $userModel->activated = $user['activated'];

            if($userModel->save()){

                //update group
                $adminGroup = Sentry::findGroupById($user['group_id']);

                if($userModel->addGroup($adminGroup)){

                    Notification::success('修改成功');
                    return Redirect::route('backend.user.index');
                }

            }

        }

        Notification::error('修改失败');
        return Redirect::back()->withErrors($validator)->withInput();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /backend/user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        $user = Sentry::findUserById($id);

        if($user->delete()){
            Notification::success('删除成功');
            return Redirect::route('backend.user.index');
        }
	}

}