@extends('backend._layouts.main')
@section('content')
<!-- content -->
<div class="admin-content">

    {{ Notification::showAll() }}

    <div class="am-cf am-padding">
        <div class="am-fl am-cf">
            <strong class="am-text-primary am-text-lg">首页</strong> /
            <small>文章列表</small>
        </div>
    </div>

    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">

                    <button type="button" class="am-btn am-btn-default" onclick=location.href='{{ URL::route("backend.article.create")}}'>
                    <span class="am-icon-plus"></span>
                    新增
                    </button>

                    <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除
                    </button>
                </div>
            </div>
        </div>

        {{ Form::open(['route' => 'backend.article.index', 'method' => 'get']) }}


        <div class="am-u-sm-12 am-u-md-3">
            <div class="am-form-group">

                {{ Form::select('parent_id', Cate::getCateAll() ,null, ['data-am-selected' => '{btnSize: "sm"}']) }}
            </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
            <div class="am-input-group am-input-group-sm">
                {{ Form::text('cate_name', '', ['class' => 'am-form-field']) }}
          <span class="am-input-group-btn">
              {{ Form::submit('搜索', ['class' => 'am-btn am-btn-default']) }}
          </span>
            </div>
        </div>

        {{ Form::close() }}


    </div>

    <div class="am-g">
        <div class="am-u-sm-12">
            <table class="am-table am-table-striped am-table-hover table-main">
                <thead>

                <tr>
                    <th class="table-check"><input type="checkbox"/></th>
                    <th class="table-id">ID</th>
                    <th class="table-title">标题</th>
                    <th class="table-type">分类</th>
                    <th class="table-date">作者</th>
                    <th class="table-date">标签</th>
                    <th class="table-date">游览量</th>
                    <th class="table-date">评论量</th>
                    <th class="table-date">创建时间</th>
                    <th class="table-set">操作</th>
                </tr>

                </thead>
                <tbody>

                @foreach($article as $k=> $v)

                <tr>
                    <td><input type="checkbox"/></td>
                    <td>{{ $v->id}}</td>
                    <td><a href="#">{{ $v->title}} </a></td>
                    <td>{{  Cate::getCateNameById($v->cate_id) }}</td>
                    <td>{{ $v->user_id}}</td>
                    <td>{{ Tags::getTagNamesByIds($v->tags)}}</td>
                    <td>{{ $v->status->view_number}}</td>
                    <td>{{ $v->status->comment_number}}</td>
                    <td>{{ $v->created_at}}</td>
                    <td>
                        <div class="am-btn-toolbar">
                            <div class="am-btn-group am-btn-group-xs">

                                {{ Form::open(array('route' => array('backend.article.edit', $v->id), 'method' => 'get')) }}
                                <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                        class="am-icon-pencil-square-o"></span> 编辑
                                </button>
                                {{ Form::close() }}

                                {{ Form::open(array('route' => array('backend.article.destroy', $v->id), 'method' => 'delete')) }}

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

                {{$article->links('backend._layouts._page')}}
            </div>
            <hr/>
        </div>

    </div>
</div>
<!-- content end -->

@stop