<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="/" class="brand-wrap">
            <img src="{{URL::asset('public/assets/back-end/imgs/theme/logo.svg')}}" class="logo" alt="Dashboard" />
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
        </div>
    </div>
    <nav>
        <ul class="menu-aside">
            <li class="menu-item active">
                <a class="menu-link" href="/admin">
                    <i class="icon material-icons md-home"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" disabled href="#">
                    <i class="icon material-icons md-pie_chart"></i>
                    <span class="text">Thống kê</span>
                </a>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-person"></i>
                    <span class="text">Chủ trọ</span>
                </a>
                <div class="submenu">
                    <a href="{{route('account-chutro')}}">Danh sách chủ trọ</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-person"></i>
                    <span class="text">Khách thuê</span>
                </a>
                <div class="submenu">
                    <a href="{{route('account-khach')}}">Danh sách khách thuê</a>
                </div>
            </li>
        </ul>
        <hr />
        <ul class="menu-aside">
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-comment"></i>
                    <span class="text">Tin đăng</span>
                </a>
                <div class="submenu">
                    <a href="{{route('baiviet')}}">Danh sách tin đăng</a>
                    <a href="{{route('danhmuc')}}">Danh mục phòng</a>
                    <a href="">Báo cáo của khách thuê</a>
                </div>
            </li>
        </ul>
        <br />
        <br />
    </nav>
</aside>
