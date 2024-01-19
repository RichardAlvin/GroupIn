<section class="sidebar">
    <div class="sidebar-header">
        <h1>GroupIn CMS</h1>
    </div>
    <div class="sidebar-menu">
        <ul>
            <a href="/dashboard"><li class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</li></a>
            <a href="/dashboard/users"><li class="{{ request()->is('dashboard/users') ? 'active' : '' }}">Users</li></a>
            <a href="/dashboard/groups"><li class="{{ request()->is('dashboard/groups') ? 'active' : '' }}">Groups</li></a>
            <a href="#"><li>Settings</li></a>
        </ul>
    </div>
</section>