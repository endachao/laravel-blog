<?php

class Tags extends \Eloquent {
    protected $table = 'tags';
	protected $fillable = [];
    public $timestamps = false;
    static $rules = array(
        'name'=>'required'
    );


    public static function SetArticleTags($tags){
        $tag = explode(',',$tags);

        $tagIds = array();
        if(!empty($tag)){
            foreach($tag as $K=>$v){
                $tag_temp = self::where('name','=',$v)->first();
                if($tag_temp){
                    $tag_temp->number += 1;
                    $tag_temp->save();
                    $tagIds[] = $tag_temp->id;
                }else{
                    // insert
                    $tagIds[] = self::insertGetId(['name'=>$v]);
                }
            }

            unset($tag_temp);

        }

        return implode(',',$tagIds);

    }

    public static function getTagById($tagId){
        return self::find($tagId);
    }

    public static function getTagNameById($tagId){
        $tag = self::getTagById($tagId);
        return isset($tag->name)?$tag->name:'';
    }

    public static function getTagNamesByIds($tagIds){
        $tagIds = explode(',',$tagIds);
        $tagNames = array();
        if(!empty($tagIds)){
            foreach($tagIds as $k=>$v){
                $tagNames[] = self::getTagNameById($v);
            }
        }

        return implode(',',$tagNames);
    }
}