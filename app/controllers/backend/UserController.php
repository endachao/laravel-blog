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
	}

}