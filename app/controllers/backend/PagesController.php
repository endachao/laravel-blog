<?php
namespace App\Controllers\Backend;
use Auth,BaseController,Form,Input,Redirect,Sentry,View,Validator,Notification;
use Pages;
class PagesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /backend/pages
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        return View::make('backend.pages.index')->withPages(Pages::orderBy('id','desc')->paginate(15));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /backend/pages/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make('backend.pages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /backend/pages
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $data = array(
            'title'=>Input::get('title'),
            'content'=>Input::get('content'),
            'is_open'=>Input::get('is_open'),
            'is_comment'=>Input::get('is_comment'),
            'seo_key'=>Input::get('seo_key'),
            'seo_desc'=>Input::get('seo_desc'),
        );

        $validator = Validator::make($data,Pages::$rules);

        if($validator->passes()){

            if(Pages::insert($data)){

                Notification::success('添加成功');
                return Redirect::route('backend.pages.index');

            }

        }

        Notification::error('添加失败');
        return Redirect::back()->withErrors($validator)->withInput();
	}

	/**
	 * Display the specified resource.
	 * GET /backend/pages/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
        return Pages::select('content')->find($id)->content;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /backend/pages/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
        return View::make('backend.pages.edit')->withPage(Pages::select('id','title','is_open','is_comment','seo_key','seo_desc')
            ->find($id)
        );
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /backend/pages/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
        $data = array(
            'title'=>Input::get('title'),
            'content'=>Input::get('content'),
            'is_open'=>Input::get('is_open'),
            'is_comment'=>Input::get('is_comment'),
            'seo_key'=>Input::get('seo_key'),
            'seo_desc'=>Input::get('seo_desc'),
        );

        $validator = Validator::make($data,Pages::$rules);

        if($validator->passes()){


            $affectedRows = Pages::where('id', '=', $id)->update($data);

            if($affectedRows){
                Notification::success('修改成功');
                return Redirect::route('backend.pages.index');
            }

        }

        Notification::error('修改失败');
        return Redirect::back()->withErrors($validator)->withInput();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /backend/pages/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        if(Pages::destroy($id)){

            Notification::success('删除成功');
            return Redirect::route('backend.pages.index');

        }
	}

}