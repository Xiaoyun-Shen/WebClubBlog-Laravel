<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset( 'user/img/person_icon.jpg')}}" class="img-circle"   alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name }}</p>

            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Web Club</li>
            <li class="active treeview">
                <li ><a href="{{route('posts.index')}}"><i class="fa fa-circle-o"></i> Posts</a></li>

            @can('posts.category',Auth::user())
                <li><a href="{{route('categories.index')}}"><i class="fa fa-circle-o"></i> Categories</a></li>
            @endcan

            @can('posts.tag',Auth::user())
                <li><a href="{{route('tags.index')}}"><i class="fa fa-circle-o"></i> Tags</a></li>
            @endcan

            @can('posts.user',Auth::user())
                <li><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i> Users</a></li>
                <li><a href="{{route('roles.index')}}"><i class="fa fa-circle-o"></i> Roles</a></li>
                <li><a href="{{route('permissions.index')}}"><i class="fa fa-circle-o"></i> Permissions</a></li>
            @endcan
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>