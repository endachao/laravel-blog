@extends('backend._layouts.main')
@section('content')
<!-- content -->
<div class="admin-content">

    {{ Notification::showAll() }}

    <div class="am-cf am-padding">
        <div class="am-fl am-cf">
            <strong class="am-text-primary am-text-lg">首页</strong> /
            <small>评论</small>
        </div>
    </div>



    <div class="am-g">
        <div class="am-u-sm-12">
            <table class="am-table am-table-striped am-table-hover table-main">
                <thead>

                <tr>
                    <th class="table-check"><input type="checkbox"/></th>
                    <th class="table-id">ID</th>
                    <th class="table-title">评论对象</th>
                    <th class="table-type">评论类型</th>
                    <th class="table-type">状态</th>
                    <th class="table-type">评论人</th>
                    <th class="table-type">邮箱</th>
                    <th class="table-set">操作</th>
                </tr>

                </thead>
                <tbody>

                @foreach($comment as $k=> $v)

                <tr>
                    <td><input type="checkbox"/></td>
                    <td>{{ $v->id}}</td>
                    <td><a href="#">《 {{ Comment::getCommentElByTypeIdAndElId($v->type_id,$v->el_id) }} 》</a></td>
                    <td>
                       {{ Comment::$types[$v->type_id] }}
                    </td>
                    <td>
                        @if($v->flag == '0')
                            不显示
                        @else
                            显示
                        @endif
                    </td>

                    <td>{{ $v->username }}</td>
                    <td>{{ $v->email }}</td>
                    <td>
                        <div class="am-btn-toolbar">
                            <div class="am-btn-group am-btn-group-xs">

                                {{ Form::open(array('route' => array('backend.pages.edit', $v->id), 'method' => 'get')) }}
                                <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                        class="am-icon-pencil-square-o"></span> 编辑
                                </button>
                                {{ Form::close() }}

                                {{ Form::open(array('route' => array('backend.pages.edit', $v->id), 'method' => 'get')) }}
                                <button class="am-btn am-btn-default am-btn-xs am-text-warning"><span
                                        class="am-icon-pencil-square-o"></span> 回复
                                </button>
                                {{ Form::close() }}

                                {{ Form::open(array('route' => array('backend.pages.destroy', $v->id), 'method' => 'delete')) }}

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

                {{$comment->links('backend._layouts._page')}}
            </div>
            <hr/>
        </div>

    </div>
</div>
<!-- content end -->

@stop