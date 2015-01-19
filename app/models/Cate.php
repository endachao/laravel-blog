<?php

class Cate extends \Eloquent {

    protected $table = 'category';

    static $catList = [0=>'顶级分类'];

    static $rules = [
        'cate_name'=>'required',
        'as_name'=>'required',
        'parent_id'=>'Integer',
    ];

    protected $fillable = [
        'cate_name',
        'as_name',
        'parent_id',
        'seo_title',
        'seo_key',
        'seo_desc',
    ];


    /**
     * 获取所有分类 id=>cat_name
     * @return array
     */
    public static function getCateAll(){

        if(count(self::$catList) <= 1){

            $cate = self::all();

            foreach($cate as $k=>$v){
                self::$catList[$v->id] = $v->cate_name;
            }

            unset($cate);
        }

        return self::$catList;

    }

    /**
     * 根据parent_id 获取分类名称
     * @param $id
     * @return mixed
     */
    public static function getCateNameById($id){

        if(!isset(self::$catList[$id])){

            $cate = self::find($id);


            self::$catList[$id] = $cate->cate_name;

            unset($cate);

        }

        return self::$catList[$id];

    }
}