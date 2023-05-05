<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="{{route('admin.index')}}"><img class="img-fluid for-light"
                                                                          src="{{URL::asset('assets/backend/admin/assets/images/logo/logo.png')}}"
                                                                          alt=""><img class="img-fluid for-dark"
                                                                                      src="{{URL::asset('assets/backend/admin/assets/images/logo/logo_dark.png')}}"
                                                                                      alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i>
            </div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{route('admin.index')}}"><img class="img-fluid"
                                                                               src="{{URL::asset('assets/backend/admin/assets/images/logo/logo-icon.png')}}"
                                                                               alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="{{route('admin.index')}}"><img class="img-fluid"
                                                                                 src="{{URL::asset('assets/backend/admin/assets/images/logo/logo-icon.png')}}"
                                                                                 alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                                                              aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">Dashboard</h6>
                            <p class="lan-2">Dashboards</p>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i>
                            <span class="lan-3">Dashboard</span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="{{route('admin.index')}}">Default</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="users"></i><span>Users</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('admin.users.provider')}}">Provider</a></li>
                            <li><a href="{{route('admin.users.seeker')}}">Seeker</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                                data-feather="list"></i><span>Categories</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('admin.category.list')}}">List</a></li>
                            <li><a href="{{route('admin.category.list.add')}}">Add</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                                data-feather="box"></i><span>Posts</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('admin.post.list')}}">List</a></li>
                            <li><a href="user-cards.html">Statistical</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="{{ route('admin.serviceCategory.list') }}">
                            <i data-feather="box"></i>
                            <span>Service</span></a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
