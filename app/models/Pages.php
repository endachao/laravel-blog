<?php

class Pages extends \Eloquent {
	protected $fillable = [];
    protected $table = 'pages';
    public $timestamps = false;
    static $rules = array(
        'title'=>'required',
        'content'=>'required',
    );

    public static function getPageById($pageId){
        return self::select('title','is_open','is_comment','seo_key','seo_desc')->find($pageId);
    }

    public static function getPageTitleById($pageId){
        $page = self::getPageById($pageId);
        return isset($page->title)?$page->title:'';
    }
}