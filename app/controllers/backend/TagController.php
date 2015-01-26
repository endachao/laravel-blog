<?php

namespace App\Controllers\Backend;
use Auth,BaseController,Form,Input,Redirect,Sentry,View,Validator,Notification;
use Tags;
class TagController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /backend/tag
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        return View::make('backend.tag.index')->withTags(Tags::orderBy('number','desc')->paginate(15));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /backend/tag/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make('backend.tag.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /backend/tag
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $data = [
            'name'=>Input::get('name')
        ];

        $validator = Validator::make($data,Tags::$rules);

        if($validator->passes()){

            try{

                if(Tags::insert($data)){

                    Notification::success('添加成功');
                    return Redirect::route('backend.tag.index');
                }

            }catch (\Exception $e){

                return Redirect::back()->withErrors(array('error' => $e->getMessage()))->withInput();

            }

        }else{
            Notification::error('添加失败');
            return Redirect::back()->withErrors($validator)->withInput();
        }
	}

	/**
	 * Display the specified resource.
	 * GET /backend/tag/{id}
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
	 * GET /backend/tag/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
        return View::make('backend.tag.edit')->withTag(Tags::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /backend/tag/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
        $data = [
            'name'=>Input::get('name')
        ];

        $validator = Validator::make($data,Tags::$rules);

        if($validator->passes()){

            try{

                $affectedRows = Tags::where('id', '=', $id)->update($data);

                if($affectedRows){
                    Notification::success('修改成功');
                    return Redirect::route('backend.tag.index');
                }

            }catch (\Exception $e){

                return Redirect::back()->withErrors(array('error' => $e->getMessage()))->withInput();

            }

        }else{
            Notification::error('修改失败');
            return Redirect::back()->withErrors($validator)->withInput();
        }

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /backend/tag/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        if(Tags::destroy($id)){
            Notification::success('删除成功');
            return Redirect::route('backend.tag.index');
        }
	}

}