<?php
/**
 * 初始化系统设置
 * User: 袁超<yccphp@163.com>
 * Time: 2015.01.28 下午2:25
 */
class OptionsSeeder extends Seeder{

    public function run(){

        $config = [
            [
                'option_name'=>'title',
                'option_value'=>'网站标题'
            ],

            [
                'option_name'=>'subheading',
                'option_value'=>'副标题'
            ],

            [
                'option_name'=>'put_on_record',
                'option_value'=>'国安 00009'
            ],

            [
                'option_name'=>'all_ow_access',
                'option_value'=>1
            ],

            [
                'option_name'=>'allow_comments',
                'option_value'=>1
            ],

            [
                'option_name'=>'seo_key',
                'option_value'=>'seo 关键字'
            ],

            [
                'option_name'=>'seo_desc',
                'option_value'=>'seo 描述'
            ],

            [
                'option_name'=>'copyright',
                'option_value'=>'版权申明'
            ],

            [
                'option_name'=>'smtp_url',
                'option_value'=>'smtp.qq.com'
            ],
            [
                'option_name'=>'smtp_user',
                'option_value'=>'teste@qq.com'
            ],

            [
                'option_name'=>'smtp_name',
                'option_value'=>'显示的昵称'
            ],

            [
                'option_name'=>'smtp_pass',
                'option_value'=>'password'
            ],

            [
                'option_name'=>'smtp_port',
                'option_value'=>25
            ],
        ];

        DB::table('options')->insert($config);

    }

}