<?php
/**
 * 分类主控制器
 * @author 袁超<yccphp@163.com>
 */

namespace App\Controllers\Backend;
use Auth,BaseController,Form,Input,Redirect,Sentry,View,Validator,Notification;
use Cate;
class CategoryController extends BaseController {

    /**
     * 展示分类列表
     * @return mixed
     */
    public function index()
	{
		//
        $search = [
            'parent_id'=>Input::get('parent_id'),
            'cate_name'=>Input::get('cate_name',null),
        ];

        if($search['cate_name'] != null && $search['parent_id'] != 0){
            $cate = Cate::where('parent_id','=',$search['parent_id'])->where('cate_name','like',"%$search[cate_name]%")->paginate(15);
        }elseif($search['cate_name'] != null && $search['parent_id'] == 0){
            $cate = Cate::where('cate_name','like',"%$search[cate_name]%")->paginate(15);
        }elseif($search['cate_name'] == null && $search['parent_id'] != 0){
            $cate = Cate::where('parent_id','=',$search['parent_id'])->paginate(15);
        }else{
            $cate = Cate::orderBy('parent_id','asc')->paginate(15);
        }

        return View::make('backend.cate.index')->withCate($cate);

	}

    /**
     * 展示创建分类表单
     * @return mixed
     */
    public function create()
	{
		//
        return View::make('backend.cate.create');
	}

	/**
	 * 处理添加分类
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
        return View::make('backend.cate.edit')->withCate(Cate::find($id));
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
        $cate = Cate::findOrFail($id);

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

                $affectedRows = Cate::where('id', '=', $id)->update($data);

                if($affectedRows){
                    Notification::success('修改成功');
                    return Redirect::route('backend.cate.index');
                }

            }catch (\Exception $e){
                return Redirect::back()->withErrors(array('error' => $e->getMessage()))->withInput();
            }

        }

        Notification::error('修改失败');
        return Redirect::back()->withErrors($validator)->withInput();
	}

	/**
	 * 处理分类删除
	 * DELETE /backend/category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        if(Cate::destroy($id)){
            Notification::success('删除成功');
            return Redirect::route('backend.cate.index');
        }

	}

}