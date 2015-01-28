<?php

namespace App\Controllers\Backend;
use Auth,BaseController,Form,Input,Redirect,Sentry,View,Validator,Notification;
use Options;
class OptionsController extends BaseController {

    // 站点设置
	public function getSite(){
        return View::make('backend.option.site')->withOptions(Options::all());
    }

    public function postSite(){

        $options = Input::get('options');

        foreach($options as $k=>$v){
            Options::where('option_name','=',$k)->update(['option_value'=>$v]);
        }

        Notification::success('更新成功');
        return Redirect::route('backend.options.site');
    }

}