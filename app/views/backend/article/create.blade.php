@extends('backend._layouts.main')

@section('content')


<!-- content start -->
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-21475122-5']);
    _gaq.push(['_setCustomVar', 1, 'Repo', 'lepture/editor']);
    _gaq.push(['_trackPageview']);
    _gaq.push(['_trackPageLoadTime']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        if (location.port) {
            return;
        }
        ga.src = '//www.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
<style type="text/css">

    .editor-wrapper {
        max-width: 680px;
        padding: 10px;
        margin: 60px auto;
    }
</style>
<script type="text/javascript" src="{{ URL::asset('assets/markdown/marked.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/markdown/editor.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('assets/markdown/editor.css') }}">

{{ Form::open(['route' => 'backend.article.store', 'method' => 'post','class'=>'am-form']) }}


<div class="admin-content">
    {{ Notification::showAll() }}

    @if ($errors->has('error'))
    <div class="am-alert am-alert-danger" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p>{{ $errors->first('error', ':message') }}</p>
    </div>
    @endif

    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">表单</strong> / <small>form</small></div>
    </div>


    <div class="am-tabs am-margin" data-am-tabs>
        <ul class="am-tabs-nav am-nav am-nav-tabs">
            <li class="am-active"><a href="#tab1">基本信息</a></li>
            <li><a href="#tab3">SEO 选项</a></li>
        </ul>

        <div class="am-tabs-bd">
            <div class="am-tab-panel am-fade am-in am-active" id="tab1">

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">文章分类</div>
                    <div class="am-u-sm-8 am-u-md-10">

                        {{ Form::select('cate_id', Cate::getCateAll() , null , ['data-am-selected' => '{btnSize: "sm"}']) }}

                    </div>

                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        标题
                    </div>

                    <div class="am-u-sm-8 am-u-md-4">
                        {{ Form::text('title', '', ['class' => 'am-input-sm']) }}
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">
                        <small>
                        *必填，不可重复
                        <font color="red">{{ $errors->first('title'); }}</font>
                        </small>
                    </div>
                </div>




                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        标签
                    </div>

                    <div class="am-u-sm-8 am-u-md-4">
                        {{ Form::text('tags', '', ['class' => 'am-input-sm']) }}
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">
                        <small>
                        *以英文小写逗号分割
                        <font color="red">{{ $errors->first('tags'); }}</font>
                        </small>
                    </div>
                </div>


                <div class="am-g am-margin-top-sm">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        内容
                    </div>
                    <div class="am-u-sm-8 am-u-md-8 am-u-end">
                        {{ Form::textarea('content','',['id'=>'editor']) }}
                    </div>
                </div>

            </div>


            <div class="am-tab-panel am-fade" id="tab3">
                <form class="am-form">


                    <div class="am-g am-margin-top-sm">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            SEO 关键字
                        </div>
                        <div class="am-u-sm-8 am-u-md-4 am-u-end">
                            {{ Form::text('keyword','',['class'=>'am-input-sm']) }}
                        </div>
                    </div>

                    <div class="am-g am-margin-top-sm">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            描述
                        </div>
                        <div class="am-u-sm-8 am-u-md-4 am-u-end">
                            {{ Form::textarea('desc','') }}
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <div class="am-margin">
        {{ Form::submit('提交保存',['class'=>'am-btn am-btn-primary am-btn-xs']) }}

    </div>

</div>
{{ Form::close() }}
<!-- content end -->
<script type="text/javascript" src="{{ URL::asset('assets/markdown/zepto.min.js') }}"></script>
<script type="text/javascript">
    (function($) {
        var editor = new Editor();
        editor.render();
    })(Zepto);
</script>

@stop