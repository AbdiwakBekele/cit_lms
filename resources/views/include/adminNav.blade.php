<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>

            <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                data-bs-target="#SearchModal">
                <input class="form-control px-5" disabled type="search" placeholder="Search">
                <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i
                        class='bx bx-search'></i></span>
            </div>


            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"
                        data-bs-target="#SearchModal">
                        <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="avascript:;"
                            data-bs-toggle="dropdown"><img src="{{ asset('assets/admin/images/county/USA Flag.png') }}"
                                width="22" alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                        src="{{ asset('assets/admin/images/county/USA Flag.png') }}" width="20"
                                        alt=""><span class="ms-2">English</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                        src="{{ asset('assets/admin/images/county/Ethiopia Flag.png') }}" width="20"
                                        alt=""><span class="ms-2">Amharic</span></a>
                            </li>
                        </ul>
                    </li>

                    <!-- Should be Here! -->
                    <div class="app-container"> </div>

                    <!-- Notification -->
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            data-bs-toggle="dropdown"><span class="alert-count">1</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-badge">1 New</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{ asset('assets/admin/images/avatars/avatar-1.png') }}"
                                                class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Abebe Solomon<span class="msg-time float-end">5 hr
                                                    ago</span></h6>
                                            <p class="msg-info">Testing...</p>
                                        </div>
                                    </div>
                                </a>

                            </div>

                            <a href="javascript:;">
                                <div class="text-center msg-footer">
                                    <button class="btn btn-primary w-100">View All Notifications</button>
                                </div>
                            </a>
                        </div>
                    </li>

                </ul>
            </div>
            <!-- Profile Section -->
            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    <!-- Profile Image -->
                    @if(auth()->user()->profile_img)
                    <img width="30" height="30" class="rounded-circle"
                        src=" {{ asset('user_profile/'.auth('student')->user()->profile_img) }} ">

                    @else
                    <img width="30" height="30" class="rounded-circle" src=" {{ asset('images/AM2A1021.JPG') }} ">
                    @endif


                    <div class="user-info">
                        <p class="user-name mb-0">{{auth()->user()->fullname}}</p>
                        @php
                        $roles = Auth::user()->getRoleNames();
                        @endphp
                        <p class="designattion mb-0">
                            @foreach($roles as $role)
                            {{ $role }} |
                            @endforeach
                        </p>


                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="/admin_profile"><i
                                class="bx bx-user fs-5"></i><span>Profile</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                class="bx bx-cog fs-5"></i><span>Settings</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="/admin"><i
                                class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
                    </li>

                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="/user_logout"><i
                                class="bx bx-log-out-circle"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>

        </nav>
    </div>
</header>