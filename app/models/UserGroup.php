<?php

class UserGroup extends \Eloquent {
	protected $fillable = [];
    protected $table = 'groups';

    static $userGroup;

    static $rules = array(
        'name'=>'required',
    );

    public static function getGroupAll(){

        if(empty(self::$userGroup)){

            $group = self::all();

            $temp = array();
            foreach($group  as $k=>$v){
                $temp[$v->id] = $v->name;
            }
            self::$userGroup = $temp;
            unset($temp);
        }
        return self::$userGroup;

    }

    public static function getUserGroupNameByGroupId($groupId){

        $Groups = self::getGroupAll();

        return isset($Groups[$groupId])?$Groups[$groupId]:'';
    }
}