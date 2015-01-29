## laravel-blog

Blog system development based on laravel 4.2

###Usage
---
1. clone laravel-blog 到你的服务器环境

	```
	cd www #你的服务器放网站的目录
	git clone git@github.com:yccphp/laravel-blog.git
	```

1. 切换到 laravel-blog 所在目录，使用composer 更新项目

	> 如果没有安装过composer请先安装：<br>
 	linux/OSX: [https://getcomposer.org/doc/00-intro.md#installation-nix](https://getcomposer.org/doc/00-intro.md#installation-nix)<br>
 	windows: [https://getcomposer.org/doc/00-intro.md#installation-windows](https://getcomposer.org/doc/00-intro.md#installation-windows)

	```
	// 因为我提交的时候,为了避免大家重新下载各种包，我直接提交了 vendor ，所以执行 composer dump-autoload 就行
	cd laravel-blog/
	composer dump-autoload	
	```

1. 修改数据库配置`app/config/database.php`,在数据库中创建一个`库`,把配置信息填写到配置文件中

1. 修改`app/storage/` 目录权限为可写,*nix下 执行：

    ```
    sudo chmod -R 755 app/storage/
    ```

1. 初始管理员的用户名为`653069653@qq.com`,密码为`101058`,你想修改可以在`app/database/seeds/SentrySeeder.php`中修改初始人员信息再执行安装
1. 安装数据库

    ```
    php artisan migrate #安装数据表结构
    php artisan migrate --package=cartalyst/sentry #安装 sentry 
    php artisan db:seed #初始系统数据
    ```

1. 开启重写模块:使用`apache`请开启`mod_rewrite`,使用`nginx`同学请参考这个配置示例：[https://gist.github.com/davzie/3938080](https://gist.github.com/davzie/3938080)

1. 把你的域名绑定到 `laravel-blog/public` 下

1. 那么现在访问`http://yourhost/backend` 应该会跳转到后台登录页。


###开发进度
---
目前还在开发中，您可以点击 `watch` ，订阅最新推送，可以点击 `start` 来支持我

博客项目建立时间：2015-01-13

后台开发进度

1. 后台登录：100%
2. 分类：100%
3. 标签：100%
4. 文章：100%
5. 网站基本设置：100%
6. 导航管理：100%
7. 单页管理：100%
8. 用户组：80% （未做权限分配）
9. 用户：80% （未做权限分配）
10. 评论：20% （完成评论列表）

喜欢这个项目，喜欢 laravel 欢迎加入 QQ 群与我们讨论：365969825

####感谢支持！
