<?php

class GroupBind extends \Eloquent {
	protected $fillable = [];
    protected $table = 'users_groups';

    // key =>userid value=>group_id
    static  $user_group = array();


    /**
     * 根据userid 获取 groupid
     * @param $userId
     * @return mixed
     */
    public static function getUserGroupIdByUserId($userId){

        if(!isset(self::$user_group[$userId])){

            self::$user_group[$userId] = self::where('user_id','=',$userId)->pluck('group_id');
        }

        return self::$user_group[$userId];

    }

    public static function getUserGroupNameByUserId($userId){
        // 先获得 group id
        $groupId = self::getUserGroupIdByUserId($userId);

        return empty($groupId)?'':UserGroup::getUserGroupNameByGroupId($groupId);

    }
}