@extends('backend._layouts.main')

@section('content')


<!-- content start -->


{{ Form::open(['route' => 'backend.cate.store', 'method' => 'post','class'=>'am-form']) }}






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
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">上级分类</div>
                    <div class="am-u-sm-8 am-u-md-10">

                        {{ Form::select('parent_id', Cate::getCateAll() , null , ['data-am-selected' => '{btnSize: "sm"}']) }}

                    </div>

                </div>


                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        分类名称
                    </div>

                    <div class="am-u-sm-8 am-u-md-4">
                        {{ Form::text('cate_name', '', ['class' => 'am-input-sm']) }}
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">
                        <small>
                        *必填，不可重复
                        <font color="red">{{ $errors->first('cate_name'); }}</font>
                        </small>
                    </div>
                </div>


                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        别名
                    </div>
                    <div class="am-u-sm-8 am-u-md-4">
                        {{ Form::text('as_name','',['class'=>'am-input-sm']) }}
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">
                        <small>
                        *必填，不可重复
                        <font color="red">{{ $errors->first('as_name'); }}</font>
                        </small>
                    </div>
                </div>

            </div>


            <div class="am-tab-panel am-fade" id="tab3">
                <form class="am-form">
                    <div class="am-g am-margin-top-sm">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            SEO 标题
                        </div>
                        <div class="am-u-sm-8 am-u-md-4 am-u-end">
                            {{ Form::text('seo_title','',['class'=>'am-input-sm']) }}
                        </div>
                    </div>

                    <div class="am-g am-margin-top-sm">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            SEO 关键字
                        </div>
                        <div class="am-u-sm-8 am-u-md-4 am-u-end">
                            {{ Form::text('seo_key','',['class'=>'am-input-sm']) }}
                        </div>
                    </div>

                    <div class="am-g am-margin-top-sm">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            SEO 描述
                        </div>
                        <div class="am-u-sm-8 am-u-md-4 am-u-end">
                            {{ Form::textarea('seo_desc','',['rows'=>4]) }}
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


@stop