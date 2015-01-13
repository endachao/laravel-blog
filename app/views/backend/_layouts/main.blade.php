<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Enda Blog Backend</title>
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/amazeui.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/admin.css') }}">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

    @include('backend._layouts.header')


<div class="am-cf admin-main">

<!-- sidebar start -->
    @include('backend._layouts.menu')
<!-- sidebar end -->

<!-- content start -->
    @yield('content')
<!-- content end -->

</div>

<a class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
    <hr>
    <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>


<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="{{ URL::asset('assets/js/polyfill/rem.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/polyfill/respond.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/amazeui.legacy.js') }}"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/amazeui.min.js') }}"></script>
<!--<![endif]-->
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
</body>
</html>
