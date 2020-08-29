<li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
    <a href="{{ route('admin.users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('admin/roles*') ? 'active' : '' }}">
    <a href="{{ route('admin.roles.index') }}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('admin/statuses*') ? 'active' : '' }}">
    <a href="{{ route('admin.statuses.index') }}"><i class="fa fa-edit"></i><span>Statuses</span></a>
</li>

<li class="{{ Request::is('admin/lokets*') ? 'active' : '' }}">
    <a href="{{ route('admin.lokets.index') }}"><i class="fa fa-edit"></i><span>Lokets</span></a>
</li>

<li class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
    <a href="{{ route('admin.categories.index') }}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('admin/hosts*') ? 'active' : '' }}">
    <a href="{{ route('admin.hosts.index') }}"><i class="fa fa-edit"></i><span>Hosts</span></a>
</li>

