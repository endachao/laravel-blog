<?php

namespace App\Controllers\Backend;

use Auth, BaseController, Form, Input, Redirect, Sentry, View, Validator, Notification;
use UserGroup;

class UserGroupController extends BaseController
{

    /**
     * Display a listing of the resource.
     * GET /backend/usergroup
     *
     * @return Response
     */
    public function index()
    {

        return View::make('backend.group.index')->withGroup(UserGroup::orderBy('id', 'desc')->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     * GET /backend/usergroup/create
     *
     * @return Response
     */
    public function create()
    {
        //
        return View::make('backend.group.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /backend/usergroup
     *
     * @return Response
     */
    public function store()
    {
        //
        $data = array(
            'name' => Input::get('name')
        );

        $validator = Validator::make($data, UserGroup::$rules);

        if ($validator->passes()) {

            try {

                $group = Sentry::createGroup(array(
                    'name' => $data['name'],
                ));

                if ($group) {
                    Notification::success('创建成功');
                    return Redirect::route('backend.group.index');
                }

            } catch (\Exception $e) {
                return Redirect::back()->withErrors(array('error' => $e->getMessage()))->withInput();
            }

        }

        Notification::error('创建失败');
        return Redirect::back()->withErrors($validator)->withInput();

    }

    /**
     * Display the specified resource.
     * GET /backend/usergroup/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /backend/usergroup/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
        return View::make('backend.group.edit')->withGroup(UserGroup::find($id));
    }

    /**
     * Update the specified resource in storage.
     * PUT /backend/usergroup/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
        $data = array(
            'name' => Input::get('name')
        );

        $validator = Validator::make($data, UserGroup::$rules);

        if ($validator->passes()) {

            try {


                $group = Sentry::findGroupById($id);

                // 更新分组详情
                $group->name = $data['name'];

                if($group->save()){
                    Notification::success('修改成功');
                    return Redirect::route('backend.group.index');
                }

            } catch (\Exception $e) {
                return Redirect::back()->withErrors(array('error' => $e->getMessage()))->withInput();
            }

        }

        Notification::error('修改失败');
        return Redirect::back()->withErrors($validator)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /backend/usergroup/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        if(UserGroup::destroy($id)){
            Notification::success('删除成功');
            return Redirect::route('backend.group.index');
        }
    }

}