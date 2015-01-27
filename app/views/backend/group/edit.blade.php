@extends('backend._layouts.main')

@section('content')


<!-- content start -->


{{ Form::model($group, ['route' => ['backend.group.update', $group->id], 'method' => 'put','class'=>'am-form']) }}

<div class="admin-content">
    {{ Notification::showAll() }}

    @if ($errors->has('error'))
    <div class="am-alert am-alert-danger" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p>{{ $errors->first('error', ':message') }}</p>
    </div>
    @endif

    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">标签</strong> / <small>修改标签</small></div>
    </div>


    <div class="am-tabs am-margin" data-am-tabs>
        <ul class="am-tabs-nav am-nav am-nav-tabs">
            <li class="am-active"><a href="#tab1">基本信息</a></li>
        </ul>

        <div class="am-tabs-bd">
            <div class="am-tab-panel am-fade am-in am-active" id="tab1">


                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        分组名称
                    </div>

                    <div class="am-u-sm-8 am-u-md-2">
                        {{ Form::text('name', $group->name, ['class' => 'am-input-sm']) }}
                    </div>
                    <div class="am-hide-sm-only am-u-md-8">
                        *必填，不可重复
                        <font color="red">{{ $errors->first('name'); }}</font>
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