<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
    @can('ver-usuario')
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    @endcan
    @can('ver-rol')
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    @endcan
    @can('ver-blog')
    <a class="nav-link" href="/blogs">
        <i class=" fas fa-blog"></i><span>Blogs</span>
    </a>
    @endcan
    @can('ver-tag')
    <a class="nav-link" href="/tags">
        <i class=" fas fa-blog"></i><span>Tags</span>
    </a>
    @endcan
</li>
