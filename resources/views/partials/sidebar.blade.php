{{--<ul class="nav navbar-nav navbar-right">
    <!-- Authentication Links -->
    @if (Auth::guest())
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
        </li>
    @endif
</ul>--}}

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/admin_theme/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="{{ route('home') }}"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
			
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-star-o"></i> <span>Blog Post Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('categories.create') }}"><i class="fa fa-plus"></i> Add Category</a></li>
                    <li><a href="{{ route('categories.index') }}"><i class="fa fa-eye"></i>View All Categories</a></li>
                    <li><a href="{{ route('blog.create') }}"><i class="fa fa-plus"></i> Add Post</a></li>
                    <li><a href="{{ route('blog.index') }}"><i class="fa fa-eye"></i>View All Posts</a></li>
                </ul>
            </li>	
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-star-o"></i> <span>Team Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('team.create') }}"><i class="fa fa-plus"></i> Add Team Member</a></li>
                    <li><a href="{{ route('team.index') }}"><i class="fa fa-eye"></i>View All Members</a></li>
                </ul>
            </li>	
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-star-o"></i> <span>Clients Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('clients.create') }}"><i class="fa fa-plus"></i> Add Client</a></li>
                    <li><a href="{{ route('clients.index') }}"><i class="fa fa-eye"></i>View All Clients</a></li>
                </ul>
            </li>	
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-star-o"></i> <span>Services Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('services.create') }}"><i class="fa fa-plus"></i> Add Services</a></li>
                    <li><a href="{{ route('services.index') }}"><i class="fa fa-eye"></i>View All Services</a></li>
                </ul>
            </li>
				<li class="treeview">
                <a href="#">
                    <i class="fa fa-star-o"></i> <span>Photo Gallery </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('photogallery.create') }}"><i class="fa fa-plus"></i> Add New Photo</a></li>
                    <li><a href="{{ route('photogallery.index') }}"><i class="fa fa-eye"></i> View All Photos</a></li>
                 </ul>
            </li>
				<li class="treeview">
                <a href="#">
                    <i class="fa fa-star-o"></i> <span>Portfolio Management </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('portfolio.create') }}"><i class="fa fa-plus"></i> Add Portfolio</a></li>
                    <li><a href="{{ route('portfolio.index') }}"><i class="fa fa-eye"></i> View All Portfolios</a></li>
                </ul>
            </li>
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-star-o"></i> <span>Site Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('generalsettings.index') }}"><i class="fa fa-eye"></i>General Settings</a></li>
                  <li><a href="{{ route('pageSeo.index') }}"><i class="fa fa-eye"></i>Pages SEO Content</a></li>
                 </ul>
            </li>
		</ul>
    </section>
    <!-- /.sidebar -->
</aside>
