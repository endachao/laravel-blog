<?php

namespace App\Controllers\Backend;
use Auth,BaseController,Form,Input,Redirect,Sentry,View,Validator,Notification;
use Cate;
class CategoryController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /backend/category
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        return View::make('backend.cate.index')->withCate(Cate::all());

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /backend/category/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make('backend.cate.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /backend/category
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $data = array(
            'parent_id'=>Input::get('parent_id'),
            'cate_name'=>Input::get('cate_name'),
            'as_name'=>Input::get('as_name'),
            'seo_title'=>Input::get('seo_title'),
            'seo_key'=>Input::get('seo_key'),
            'seo_desc'=>Input::get('seo_desc'),
        );

        $validator = Validator::make($data,Cate::$rules);
        if($validator->passes()){
            try{
                if(Cate::insert($data)){
                    Notification::success('添加成功');
                    return Redirect::route('backend.cate.index');
                }
            }catch (\Exception $e){

                return Redirect::back()->withErrors(array('error' => $e->getMessage()))->withInput();
            }
        }

        Notification::error('添加失败');
        return Redirect::back()->withErrors($validator)->withInput();

	}

	/**
	 * Display the specified resource.
	 * GET /backend/category/{id}
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
	 * GET /backend/category/{id}/edit
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
	 * PUT /backend/category/{id}
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
	 * DELETE /backend/category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}