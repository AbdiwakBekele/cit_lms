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
        <li class="{{ Request::is('admin') ? 'mm-active' : ''}} ">
            <a href="/admin">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <!-- Course Category -->
        <li class="{{ Request::is('courseCategory*') ? 'mm-active' : ''}} ">
            <a href="/courseCategory">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">Course Category</div>
            </a>
        </li>

        <!-- Course Management -->
        <li class="{{ Request::is('course*') ? 'mm-active' : ''}} ">
            <a href="/course">
                <div class="parent-icon"><i class='bx bx-book-content'></i>
                </div>
                <div class="menu-title">Course Management</div>
            </a>
        </li>

        <!-- Resource Managment -->
        <li class="{{ Request::is('resource*') ? 'mm-active' : ''}} ">
            <a href="/resource">
                <div class="parent-icon"><i class='bx bx-file-blank'></i>
                </div>
                <div class="menu-title">Resourse Management</div>
            </a>
        </li>

        <!-- Batch Management -->
        <li class="{{ Request::is('batch*') ? 'mm-active' : ''}} ">
            <a href="/batch">
                <div class="parent-icon"><i class='bx bx-group'></i>
                </div>
                <div class="menu-title">Batch Management</div>
            </a>
        </li>
        <!-- Student Managment -->
        <li class="{{ Request::is('student*') ? 'mm-active' : ''}} ">
            <a href="/student">
                <div class="parent-icon"><i class='bx bxs-user'></i>
                </div>
                <div class="menu-title">Student Management</div>
            </a>
        </li>

        <!-- Role Managment -->
        <li class="{{ Request::is('role*') ? 'mm-active' : ''}} ">
            <a href="/role">
                <div class="parent-icon"><i class='bx bx-user-plus'></i>
                </div>
                <div class="menu-title">Role Management</div>
            </a>
        </li>

        <!-- Event -->
        <li class="{{ Request::is('event*') ? 'mm-active' : ''}} ">
            <a href="/event">
                <div class="parent-icon"><i class='bx bx-calendar-event'></i>
                </div>
                <div class="menu-title">Event Management</div>
            </a>
        </li>

        <!-- Report -->
        <li class="{{ Request::is('report*') ? 'mm-active' : ''}} ">
            <a href="/report">
                <div class="parent-icon"><i class='bx bxs-report'></i>
                </div>
                <div class="menu-title">Report</div>
            </a>
        </li>
    </ul>

</div>