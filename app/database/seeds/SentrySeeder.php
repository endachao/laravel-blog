<?php
/**
 * User: 袁超<yccphp@163.com>
 * Time: 2015.01.13 上午11:36
 */
class SentrySeeder extends Seeder {

    public function run()
    {
        // 清空数据
        DB::table('users')->delete();
        DB::table('groups')->delete();
        DB::table('users_groups')->delete();

        // 创建用户
        Sentry::getUserProvider()->create(array(
            'email'      => '653069653@qq.com',
            'password'   => "101058",
            'first_name' => '超',
            'last_name'  => '袁',
            'activated'  => 1,
        ));

        // 创建用户组
        Sentry::getGroupProvider()->create(array(
            'name'        => 'Admin',
            'permissions' => ['admin' => 1],
        ));

        // 将用户加入用户组
        $adminUser  = Sentry::getUserProvider()->findByLogin('653069653@qq.com');
        $adminGroup = Sentry::getGroupProvider()->findByName('Admin');
        $adminUser->addGroup($adminGroup);
    }
}