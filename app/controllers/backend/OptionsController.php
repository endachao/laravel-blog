<?php

namespace App\Controllers\Backend;
use Auth,BaseController,Form,Input,Redirect,Sentry,View,Validator,Notification;
use Options,Navigation;
class OptionsController extends BaseController {

    // 站点设置
	public function getSite(){
        return View::make('backend.options.site')->withOptions(Options::all());
    }

    public function postSite(){

        $options = Input::get('options');

        foreach($options as $k=>$v){
            Options::where('option_name','=',$k)->update(['option_value'=>$v]);
        }

        Notification::success('更新成功');
        return Redirect::route('backend.options.site');
    }

    public function getNavIndex(){
        return View::make('backend.options.navIndex')->withNav(Navigation::orderBy('order_key','asc')->paginate(15));
    }


    public function getNavCreate(){
        return View::make('backend.options.navCreate');
    }

    public function postNavCreate(){

        $data = array(
            'name'=>Input::get('name'),
            'url'=>Input::get('url'),
            'order_key'=>Input::get('order_key'),
            'type'=>Input::get('type'),
            'is_open'=>Input::get('is_open'),
            'is_new'=>Input::get('is_new'),
        );

        $rules = array(
            'name'=>'required',
            'url'=>'required | url'
        );

        $validator = Validator::make($data,$rules);

        if($validator->passes()){

            if(Navigation::insert($data)){
                Notification::success('添加成功');
                return Redirect::route('backend.options.getNavIndex');
            }
        }

        Notification::error('添加失败');
        return Redirect::back()->withErrors($validator)->withInput();

    }

    public function getNavEdit($id){
        return View::make('backend.options.navEdit')->withNav(Navigation::find($id));
    }

    public function putNavEdit($id){

        $data = array(
            'name'=>Input::get('name'),
            'url'=>Input::get('url'),
            'order_key'=>Input::get('order_key'),
            'type'=>Input::get('type'),
            'is_open'=>Input::get('is_open'),
            'is_new'=>Input::get('is_new'),
        );

        $rules = array(
            'name'=>'required',
            'url'=>'required | url'
        );

        $validator = Validator::make($data,$rules);

        if($validator->passes()){

            $affectedRows = Navigation::where('id', '=', $id)->update($data);

            if($affectedRows){
                Notification::success('修改成功');
                return Redirect::route('backend.options.getNavIndex');
            }

        }

        Notification::error('修改失败');
        return Redirect::back()->withErrors($validator)->withInput();
    }

    public function deleteNavDestroy($id){
        if(Navigation::destroy($id)){
            Notification::success('删除成功');
            return Redirect::route('backend.options.getNavIndex');
        }
    }
}