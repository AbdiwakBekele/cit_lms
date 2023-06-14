<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/admin/images/wAsset 3@300x.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">CTI</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-menu'></i>
        </div>
    </div>

    <!--------- Side Menu ------->
    <ul class="metismenu" id="menu">
        <!-- Dashboard -->
        @can('view dashboard')
        <li class="{{ Request::is('admin') ? 'mm-active' : ''}} ">
            <a href="/admin">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        @endcan

        @can('manage course')
        <!-- Course Management -->
        <li
            class="{{ (Request::is('course*') || Request::is('section*') || Request::is('content*')) ? 'mm-active' : ''}} ">
            <a href="/course">
                <div class="parent-icon"><i class='bx bx-book-content'></i>
                </div>
                <div class="menu-title">Course Management</div>
            </a>
        </li>
        @endcan

        @can('manage resource')
        <!-- Resource Managment -->
        <li class="{{ Request::is('resource*') ? 'mm-active' : ''}} ">
            <a href="/resource">
                <div class="parent-icon"><i class='bx bx-file-blank'></i>
                </div>
                <div class="menu-title">Resourse Management</div>
            </a>
        </li>
        @endcan

        @can('manage batch')
        <!-- Batch Management -->
        <li class="{{ Request::is('batch*') ? 'mm-active' : ''}} ">
            <a href="/batch">
                <div class="parent-icon"><i class='bx bx-group'></i>
                </div>
                <div class="menu-title">Batch Management</div>
            </a>
        </li>
        @endcan

        @can('manage students')
        <!-- Student Managment -->
        <li class="{{ Request::is('student*') ? 'mm-active' : ''}} ">
            <a href="/student">
                <div class="parent-icon"><i class='bx bxs-user'></i>
                </div>
                <div class="menu-title">Student Management</div>
            </a>
        </li>
        @endcan

        @can('manage registration')
        <!-- Event -->
        <li class="{{ Request::is('registration*') ? 'mm-active' : ''}} ">
            <a href="/registration">
                <div class="parent-icon"><i class='bx bx-calendar-event'></i>
                </div>
                <div class="menu-title">Registration Management</div>
            </a>
        </li>
        @endcan

        @can('manage users')
        <!-- User Managment -->
        <li class="{{ Request::is('user*') ? 'mm-active' : ''}} ">
            <a href="/user">
                <div class="parent-icon"><i class='bx bx-user-plus'></i>
                </div>
                <div class="menu-title">User Management</div>
            </a>
        </li>
        @endcan

        @canany(['manage roles', 'manage permissions'])
        <!-- Role Managment -->
        <li class="{{ Request::is('role*') || Request::is('permission*')  ? 'mm-active' : ''}} ">
            <a href="/role">
                <div class="parent-icon"><i class='bx bx-shield-quarter'></i>
                </div>
                <div class="menu-title">Role | Permission</div>
            </a>
        </li>
        @endcanany



        @can('view report')
        <!-- Report -->
        <li class="{{ Request::is('report*') ? 'mm-active' : ''}} ">
            <a href="#">
                <div class="parent-icon"><i class='bx bxs-report'></i>
                </div>
                <div class="menu-title">Report</div>
            </a>
        </li>
        @endcan
    </ul>

</div>