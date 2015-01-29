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

    public static function getArticleById($articleId){
        return self::select('cate_id','user_id','title','tags','keyword','desc','created_at','updated_at')->find($articleId);
    }


    public static function getArticleTitle($articleId){
        $article = self::getArticleById($articleId);
        return isset($article->title)?$article->title:'';
    }
}