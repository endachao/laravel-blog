<?php

class ArticleStatus extends \Eloquent {
    protected $table = 'article_status';
	protected $fillable = [];
    public $timestamps = false;

    public static function initArticleStatus($articleId){
        self::insert(array('art_id'=>$articleId));
    }
}