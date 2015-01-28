@extends('backend._layouts.main')
@section('content')
<!-- content -->
<div class="admin-content">

    {{ Notification::showAll() }}

    <div class="am-cf am-padding">
        <div class="am-fl am-cf">
            <strong class="am-text-primary am-text-lg">首页</strong> /
            <small>导航</small>
        </div>
    </div>

    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">

                    <button type="button" class="am-btn am-btn-default" onclick=location.href='{{ URL::route("backend.options.getNavCreate")}}'>
                    <span class="am-icon-plus"></span>
                    新增
                    </button>

                    <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除
                    </button>
                </div>
            </div>
        </div>


    </div>

    <div class="am-g">
        <div class="am-u-sm-12">
            <table class="am-table am-table-striped am-table-hover table-main">
                <thead>

                <tr>
                    <th class="table-check"><input type="checkbox"/></th>
                    <th class="table-id">ID</th>
                    <th class="table-title">链接名</th>
                    <th class="table-type">url</th>
                    <th class="table-type">显示顺序</th>
                    <th class="table-date">类型</th>
                    <th class="table-date">是否可用</th>
                    <th class="table-date">是否新窗口</th>
                    <th class="table-set">操作</th>
                </tr>

                </thead>
                <tbody>

                @foreach($nav as $k=> $v)

                <tr>
                    <td><input type="checkbox"/></td>
                    <td>{{ $v->id}}</td>
                    <td><a href="{{ $v->url }}">{{ $v->name}} </a></td>
                    <td>{{ $v->url}}</td>
                    <td>{{  $v->order_key }}</td>
                    <td>{{  $v->type }}</td>
                    <td>

                        @if($v->is_open == '1')

                            是

                        @else

                            否

                        @endif

                    </td>

                    <td>

                        @if($v->is_new == '1')

                        是

                        @else

                        否

                        @endif

                    </td>
                    <td>
                        <div class="am-btn-toolbar">
                            <div class="am-btn-group am-btn-group-xs">

                                {{ Form::open(array('route' => array('backend.options.getNavEdit', $v->id), 'method' => 'get')) }}
                                <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                        class="am-icon-pencil-square-o"></span> 编辑
                                </button>
                                {{ Form::close() }}

                                {{ Form::open(array('route' => array('backend.options.deleteNavDestroy', $v->id), 'method' => 'delete')) }}

                                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span
                                        class="am-icon-trash-o"></span> 删除
                                </button>

                                {{ Form::close() }}

                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
            <div class="am-cf">

                {{$nav->links('backend._layouts._page')}}
            </div>
            <hr/>
        </div>

    </div>
</div>
<!-- content end -->

@stop