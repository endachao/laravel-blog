<?php

class Comment extends \Eloquent {
	protected $fillable = [];
    protected $table = 'comment';

    const COMMENT_IN_TYPE_ARTISAN = 1;
    const COMMENT_IN_TYPE_PAGE = 2;

    static $types = array(
        self::COMMENT_IN_TYPE_ARTISAN => '文章评论',
        self::COMMENT_IN_TYPE_PAGE => '单页评论'
    );


    public static function getCommentElByTypeIdAndElId($typeId,$elId){

        $title = '';
        if(array_key_exists($typeId,self::$types)){

            if($typeId == self::COMMENT_IN_TYPE_ARTISAN){
                $title = Article::getArticleTitle($elId);
            }elseif($typeId == self::COMMENT_IN_TYPE_PAGE){
                $title = Pages::getPageTitleById($elId);
            }
        }

        return $title;

    }

}