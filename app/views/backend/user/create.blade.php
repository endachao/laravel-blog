@extends('backend._layouts.main')

@section('content')


<!-- content start -->


{{ Form::open(['route' => 'backend.user.store', 'method' => 'post','class'=>'am-form']) }}

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
                        邮箱
                    </div>

                    <div class="am-u-sm-8 am-u-md-4">
                        {{ Form::email('email', '', ['class' => 'am-input-sm']) }}
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
                        密码
                    </div>
                    <div class="am-u-sm-8 am-u-md-4">
                        {{ Form::password('password','',['class'=>'am-input-sm']) }}
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">
                        <small>
                            *必填
                            <font color="red">{{ $errors->first('title'); }}</font>
                        </small>
                    </div>
                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        姓
                    </div>
                    <div class="am-u-sm-8 am-u-md-4">
                        {{ Form::text('first_name','',['class'=>'am-input-sm']) }}
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">
                        <small>
                            *必填
                            <font color="red">{{ $errors->first('title'); }}</font>
                        </small>
                    </div>
                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        名
                    </div>
                    <div class="am-u-sm-8 am-u-md-4">
                        {{ Form::text('last_name','',['class'=>'am-input-sm']) }}
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">
                        <small>
                            *必填
                            <font color="red">{{ $errors->first('title'); }}</font>
                        </small>
                    </div>
                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">状态</div>
                    <div class="am-u-sm-8 am-u-md-10">
                        <div class="am-btn-group" data-am-button>
                            <label class="am-btn am-btn-default am-btn-xs am-active">
                                {{ Form::radio('activated',1,true) }} 正常
                            </label>
                            <label class="am-btn am-btn-default am-btn-xs">
                                {{ Form::radio('activated',0) }} 禁用
                            </label>

                        </div>
                    </div>
                </div>


                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">用户组</div>
                    <div class="am-u-sm-8 am-u-md-10">

                        {{ Form::select('group_id', UserGroup::getGroupAll() , null , ['data-am-selected' => '{btnSize: "sm"}']) }}

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