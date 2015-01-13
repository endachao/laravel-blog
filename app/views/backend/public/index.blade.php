<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login Page | Amaze UI Example</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/amazeui.min.css') }}"/>
    <style>
        .header {
            text-align: center;
        }
        .header h1 {
            font-size: 200%;
            color: #333;
            margin-top: 30px;
        }
        .header p {
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="am-g">
        <h1>Enda Blog</h1>
        <p>Blog system development based on laravel 4.2<br/>博客系统基于Laravel 4.2</p>
    </div>
    <hr />
</div>
<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
        <h3>登录</h3>
        <hr>

        @if ($errors->has('login'))

        <font color="red">{{ $errors->first('login', ':message') }}</font>

        @endif

        {{ Form::open(['route' => 'backend.login','method'=>'POST','class'=>'am-form']) }}
        	
            {{ Form::label('email', 'Email', ['email' => 'email']) }}
            {{ Form::text('email', '', ['id' => 'password']) }}
            <font color="red">{{ $errors->first('email');}}</font>
            <br>

            {{ Form::label('password', 'Password', ['for' => 'password']) }}
            {{ Form::password('password', ['id' => 'password']) }}
            <font color="red">{{ $errors->first('email'); }}</font>
            <br>

            <label for="remember-me">
                	{{ Form::checkbox('remember', '1', null,  ['id' => 'remember-me']) }}
                记住密码
            </label>

            <br />
            <div class="am-cf">
                {{ Form::submit('Submit', ['class' => 'am-btn am-btn-primary am-btn-sm am-fl']) }}
                <input type="submit" name="" value="忘记密码 ^_^? " class="am-btn am-btn-default am-btn-sm am-fr">
            </div>
        {{ Form::close() }}


        <hr>
        <p>© 2015 Enda Blog Powered by Enda</p>
    </div>
</div>
</body>
</html>