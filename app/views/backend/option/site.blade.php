@extends('backend._layouts.main')

@section('content')


<!-- content start -->


{{ Form::open(['route' => 'backend.options.postSite', 'method' => 'post','class'=>'am-form']) }}



<div class="admin-content">
    {{ Notification::showAll() }}

    @if ($errors->has('error'))
    <div class="am-alert am-alert-danger" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p>{{ $errors->first('error', ':message') }}</p>
    </div>
    @endif

    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">系统设置</strong> / <small>基本设置</small></div>
    </div>


    <div class="am-tabs am-margin" data-am-tabs>
        <ul class="am-tabs-nav am-nav am-nav-tabs">
            <li class="am-active"><a href="#tab1">站点信息</a></li>
        </ul>

        <div class="am-tabs-bd">
            <div class="am-tab-panel am-fade am-in am-active" id="tab1">

                @foreach($options as $k=>$v)

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        {{Lang::get('backend_config.'.$v->option_name )}}
                    </div>

                    <div class="am-u-sm-8 am-u-md-4">
                        {{ Form::text('options['.$v->option_name.']', $v->option_value, ['class' => 'am-input-sm']) }}
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">
                        <small>
                            *必填
                            <font color="red">{{ $errors->first($v->option_name); }}</font>
                        </small>
                    </div>
                </div>

                @endforeach


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