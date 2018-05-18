<aside class="main-sidebar">

    <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Меню</li>
            <li>
                <a href="{{ route('adminDashboardIndex') }}">
                    <i class="glyphicon glyphicon-home"></i> <span>Главная</span>
                </a>
            </li>
            <li>
                <a href="{{ route('adminNewsIndex') }}">
                    <i class="glyphicon glyphicon-th-list"></i>
                    <span>Новости</span>
                </a>
            </li>
            <li>
                <a href="{{ route('adminArtistIndex') }}">
                    <i class="glyphicon glyphicon-th-list"></i>
                    <span>Исполнители</span>
                </a>
            </li>
            <li>
                <a href="{{ route('adminAlbumIndex') }}">
                    <i class="glyphicon glyphicon-th-list"></i>
                    <span>Альбомы</span>
                </a>
            </li>
            <li>
                <a href="{{ route('adminLyricsIndex') }}">
                    <i class="glyphicon glyphicon-th-list"></i>
                    <span>Тексты песен</span>
                </a>
            </li>
            <li>
                <a href="{{ route('adminInterviewIndex') }}">
                    <i class="glyphicon glyphicon-th-list"></i>
                    <span>Интервью</span>
                </a>
            </li>
            <li>
                <a href="{{ route('adminArticleIndex') }}">
                    <i class="glyphicon glyphicon-list-alt"></i>
                    <span>Статьи</span>
                </a>
            </li>
            <li>
                <a href="{{ route('adminUserIndex') }}">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Пользователи</span>
                </a>
            </li>
            <li>
                <a href="{{ route('adminRoleIndex') }}">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Роли</span>
                </a>
            </li>
            <li>
                <a href="{{ route('adminCategoryIndex') }}">
                    <i class="glyphicon glyphicon-th-list"></i>
                    <span>Категории</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Коментарии</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('adminCommentNewsIndex') }}"><i class="fa fa-circle-o"></i> К новостям</a></li>
                    <li><a href="{{ route('adminCommentArtistIndex') }}"><i class="fa fa-circle-o"></i> К исполнителям</a></li>
                    <li><a href="{{ route('adminCommentAlbumIndex') }}"><i class="fa fa-circle-o"></i> К альбомам</a></li>
                    <li><a href="{{ route('adminCommentLyricsIndex') }}"><i class="fa fa-circle-o"></i> К текстам песен</a></li>
                    <li><a href="{{ route('adminCommentInterviewIndex') }}"><i class="fa fa-circle-o"></i> К интервью</a></li>
                    <li><a href="{{ route('adminCommentArticleIndex') }}"><i class="fa fa-circle-o"></i> К статьям</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('adminClearCache') }}" onclick="return confirm('Вы действительно хотите удалить весь кеш?')">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Удалить весь кеш</span>
                </a>
            </li>
            <br />
            <br />
            <br />
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>