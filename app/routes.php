<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('backend/login',
    array(
        'as' => 'backend.login',
        'uses' => 'App\Controllers\Backend\PublicController@index'
    ));

Route::post('backend/login',
    array(
        'as' => 'backend.login',
        'uses' => 'App\Controllers\Backend\PublicController@login'
    ));

Route::get('backend/logout',
    array(
        'as' => 'backend.logout',
        'uses' =>'App\Controllers\Backend\PublicController@logout'
    ));



Route::group(['prefix'=>'backend','before'=>'auth.backend'],function(){

    Route::any('/','App\Controllers\Backend\MainController@index');
    Route::resource('main','App\Controllers\Backend\MainController');
    Route::resource('cate','App\Controllers\Backend\CategoryController');
    Route::resource('tag','App\Controllers\Backend\TagController');
    Route::resource('article','App\Controllers\Backend\ArticleController');
    Route::resource('group','App\Controllers\Backend\UserGroupController');
    Route::resource('user','App\Controllers\Backend\UserController');
    Route::resource('pages','App\Controllers\Backend\PagesController');
    Route::resource('comment','App\Controllers\Backend\CommentController');
    Route::controller(
        'options',
        'App\Controllers\Backend\OptionsController',
        [
            'getSite'=>'backend.options.site',
            'postSite'=>'backend.options.postSite',
            'getNavIndex'=>'backend.options.getNavIndex',
            'getNavCreate'=>'backend.options.getNavCreate',
            'postNavCreate'=>'backend.options.postNavCreate',
            'getNavEdit'=>'backend.options.getNavEdit',
            'putNavEdit'=>'backend.options.putNavEdit',
            'deleteNavDestroy'=>'backend.options.deleteNavDestroy',
        ]
    );

});