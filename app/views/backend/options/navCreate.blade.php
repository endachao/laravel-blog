@extends('backend._layouts.main')

@section('content')


<!-- content start -->


{{ Form::open(['route' => 'backend.options.postNavCreate', 'method' => 'post','class'=>'am-form']) }}


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
        </ul>

        <div class="am-tabs-bd">
            <div class="am-tab-panel am-fade am-in am-active" id="tab1">

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        链接名称
                    </div>

                    <div class="am-u-sm-8 am-u-md-4">
                        {{ Form::text('name','', ['class' => 'am-input-sm']) }}
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">
                        <small>
                            *必填
                            <font color="red">{{ $errors->first('name'); }}</font>
                        </small>
                    </div>
                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        链接地址
                    </div>

                    <div class="am-u-sm-8 am-u-md-4">
                        {{ Form::text('url','', ['class' => 'am-input-sm']) }}
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">
                        <small>
                            *必填
                            <font color="red">{{ $errors->first('url'); }}</font>
                        </small>
                    </div>
                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        排序
                    </div>

                    <div class="am-u-sm-8 am-u-md-4">
                        {{ Form::text('order_key','', ['class' => 'am-input-sm']) }}
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">
                        <small>
                            *必填
                            <font color="red">{{ $errors->first('order_key'); }}</font>
                        </small>
                    </div>
                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">类别</div>
                    <div class="am-u-sm-8 am-u-md-10">

                        {{ Form::select('type',['top'=>'导航','bottom'=>'底部'] , null , ['data-am-selected' => '{btnSize: "sm"}']) }}

                    </div>

                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">是否开启</div>
                    <div class="am-u-sm-8 am-u-md-10">
                        <div class="am-btn-group" data-am-button>
                            <label class="am-btn am-btn-default am-btn-xs am-active">
                                {{ Form::radio('is_open',1,true) }} 正常
                            </label>
                            <label class="am-btn am-btn-default am-btn-xs">
                                {{ Form::radio('is_open',0) }} 禁用
                            </label>

                        </div>
                    </div>
                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">是否新窗口</div>
                    <div class="am-u-sm-8 am-u-md-10">
                        <div class="am-btn-group" data-am-button>
                            <label class="am-btn am-btn-default am-btn-xs am-active">
                                {{ Form::radio('is_new',1,true) }} 是
                            </label>
                            <label class="am-btn am-btn-default am-btn-xs">
                                {{ Form::radio('is_new',0) }} 否
                            </label>

                        </div>
                    </div>
                </div>

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