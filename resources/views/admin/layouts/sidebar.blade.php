<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>

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
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{Request::route()->getName() == 'post.index'  ? 'active':''}}"><a href="{{route('post.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Posts</span></a></li>
            @can('posts.category',Auth::user())
            <li class="{{Request::route()->getName() == 'category.index' ? 'active':''}}" ><a href="{{route('category.index')}}" ><i class="fa fa-circle-o text-aqua"></i> <span>Categories</span></a></li>
            @endcan
            @can('posts.tag',Auth::user())
                <li class="{{Request::route()->getName() == 'tag.index' ? 'active':''}}"><a href="{{route('tag.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Tags</span></a></li>
            @endcan

            <li class="{{Request::route()->getName() == 'user.index' ? 'active':''}}"><a href="{{route('user.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Users</span></a></li>
            @can('admin.user.role',Auth::user())
            <li class="{{Request::route()->getName() == 'role.index' ? 'active':''}}"><a href="{{route('role.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Role</span></a></li>
            @endcan
            @can('admin.user.permission',Auth::user())
            <li class="{{Request::route()->getName() == 'permission.index' ? 'active':''}}"><a href="{{route('permission.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Permission</span></a></li>
            @endcan
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
