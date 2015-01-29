<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
        <ul class="am-list admin-sidebar-list">
            <li><a href="admin-index.html"><span class="am-icon-home"></span> 首页</a></li>
            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}">
                    <span class="am-icon-file"></span> 内容管理 <span class="am-icon-angle-right am-fr am-margin-right"></span>
                </a>

                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
                    <li><a href="{{URL::route('backend.cate.index')}}" class="am-cf">
                            <span class="am-icon-check"></span>
                            文章分类
                            <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{URL::route('backend.tag.index')}}">
                            <span class="am-icon-puzzle-piece"></span>
                            标签管理
                        </a>
                    </li>

                    <li><a href="{{URL::route('backend.article.index')}}">
                            <span class="am-icon-clipboard"></span>
                            文章列表
                        </a>
                    </li>

                    <li><a href="{{URL::route('backend.pages.index')}}">
                            <span class="am-icon-clipboard"></span>
                            单页管理
                        </a>
                    </li>

                    <li><a href="{{URL::route('backend.comment.index')}}">
                            <span class="am-icon-clipboard"></span>
                            评论管理
                        </a>
                    </li>


<!--                    <li><a href="admin-gallery.html">-->
<!--                            <span class="am-icon-th"></span>-->
<!--                            相册页面-->
<!--                            <span class="am-badge am-badge-secondary am-margin-right am-fr">24</span>-->
<!--                        </a>-->
<!--                    </li>-->

                </ul>
            </li>

            <li class="admin-parent">
                <a class="am-cf am-collapsed" data-am-collapse="{target: '#user-nav'}">
                    <span class="am-icon-file"></span> 用户管理 <span class="am-icon-angle-right am-fr am-margin-right"></span>
                </a>

                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="user-nav">
                    <li><a href="{{URL::route('backend.group.index')}}" class="am-cf">
                            <span class="am-icon-child"></span>
                            <span class="am-icon-child"></span>
                            用户组管理
                        </a>
                    </li>
                    <li><a href="{{URL::route('backend.user.index')}}" class="am-cf">
                            <span class="am-icon-child"></span>
                            用户管理
                        </a>
                    </li>
                </ul>
            </li>

            <li class="admin-parent">
                <a class="am-cf am-collapsed" data-am-collapse="{target: '#config-nav'}">
                    <span class="am-icon-file"></span> 系统设置 <span class="am-icon-angle-right am-fr am-margin-right"></span>
                </a>

                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="config-nav">

                    <li><a href="{{URL::route('backend.options.site')}}" class="am-cf">
                            <span class="am-icon-pencil-square-o"></span>
                            系统参数
                        </a>
                    </li>

                    <li><a href="{{URL::route('backend.options.getNavIndex')}}" class="am-cf">
                            <span class="am-icon-pencil-square-o"></span>
                            导航管理
                        </a>
                    </li>

                </ul>
            </li>

<!--            <li><a href="admin-table.html"><span class="am-icon-table"></span> 表格</a></li>-->
<!--            <li><a href="admin-form.html"><span class="am-icon-pencil-square-o"></span> 表单</a></li>-->
<!--            <li><a href="#"><span class="am-icon-sign-out"></span> 注销</a></li>-->
        </ul>

        <div class="am-panel am-panel-default admin-sidebar-panel">
            <div class="am-panel-bd">
                <p><span class="am-icon-bookmark"></span> 公告</p>
                <p>时光静好，与君语；细水流年，与君同。—— Amaze UI</p>
            </div>
        </div>

        <div class="am-panel am-panel-default admin-sidebar-panel">
            <div class="am-panel-bd">
                <p><span class="am-icon-tag"></span> wiki</p>
                <p>Welcome to the Amaze UI wiki!</p>
            </div>
        </div>
    </div>
</div>