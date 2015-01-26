@extends('backend._layouts.main')
@section('content')
<!-- content -->
<div class="admin-content">

    {{ Notification::showAll() }}

    <div class="am-cf am-padding">
        <div class="am-fl am-cf">
            <strong class="am-text-primary am-text-lg">首页</strong> /
            <small>标签</small>
        </div>
    </div>

    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">

                    <button type="button" class="am-btn am-btn-default" onclick=location.href='{{ URL::route("backend.tag.create")}}'>
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
                    <th class="table-title">标签名</th>
                    <th class="table-type">文章引用次数</th>
                </tr>

                </thead>
                <tbody>

                @foreach($tags as $k=> $v)

                <tr>
                    <td><input type="checkbox"/></td>
                    <td>{{ $v->id}}</td>
                    <td><a href="#">{{ $v->name}} </a></td>
                    <td>{{ $v->number}}</td>

                    <td>
                        <div class="am-btn-toolbar">
                            <div class="am-btn-group am-btn-group-xs">

                                {{ Form::open(array('route' => array('backend.tag.edit', $v->id), 'method' => 'get')) }}
                                <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                        class="am-icon-pencil-square-o"></span> 编辑
                                </button>
                                {{ Form::close() }}

                                {{ Form::open(array('route' => array('backend.tag.destroy', $v->id), 'method' => 'delete')) }}

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

                {{$tags->links('backend._layouts._page')}}
            </div>
            <hr/>
        </div>

    </div>
</div>
<!-- content end -->

@stop