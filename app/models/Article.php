<?php

class Article extends \Eloquent {
    protected $table = 'article';
	protected $fillable = [];

    static $rules = array(
        'title'=>'required',
        'cate_id'=>'required',
        'content'=>'required',
    );

    public function status(){
        return $this->hasOne('ArticleStatus','art_id');
    }
}