
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}"><i class="fa fa-circle-o"></i> Users</a>
            </li>
            <li class="{{ Request::is('admin/roles*') ? 'active' : '' }}">
                <a href="{{ route('admin.roles.index') }}"><i class="fa fa-circle-o"></i> Roles</a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
             <a href="{{ route('admin.categories.index') }}"><i class="fa fa-edit"></i><span>Categories</span></a>
        </li>
        <li class="{{ Request::is('admin/hosts*') ? 'active' : '' }}">
            <a href="{{ route('admin.hosts.index') }}"><i class="fa fa-edit"></i><span>Hosts</span></a>
        </li>
        <li class="{{ Request::is('admin/lokets*') ? 'active' : '' }}">
            <a href="{{ route('admin.lokets.index') }}"><i class="fa fa-edit"></i><span>Lokets</span></a>
        </li>
          </ul>
        </li>
        


<li class="{{ Request::is('admin/sliders*') ? 'active' : '' }}">
    <a href="{{ route('admin.sliders.index') }}"><i class="fa fa-edit"></i><span>Sliders</span></a>
</li>

