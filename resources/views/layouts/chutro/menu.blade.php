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
                <a class="menu-link" href="/chutro">
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
                <a class="menu-link" href="page-sellers-cards.html">
                    <i class="icon material-icons md-store"></i>
                    <span class="text">Phòng trọ</span>
                </a>
                <div class="submenu">
                    <a href="{{route('ds-loaiphong')}}">Loại phòng</a>
                    <a href="{{route('ds-phongtro')}}">Danh sách Phòng</a>
                    <a href="page-sellers-list.html">Hợp đồng</a>
                    <a href="page-seller-detail.html">Hóa đơn</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-person"></i>
                    <span class="text">Khách thuê</span>
                </a>
                <div class="submenu">
                    <a href="page-account-login.html">Thêm khách thuê trọ</a>
                    <a href="page-account-register.html">Danh sách khách thuê</a>
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
                    <a href="{{Route('chutro.tindang')}}">Danh sách tin đăng</a>
                    <a href="{{Route('chutro.danhmuc')}}">Danh mục phòng</a>
                    <a href="page-settings-2.html">Yêu cầu khách thuê</a>
                </div>
            </li>
        </ul>
        <br />
        <br />
    </nav>
</aside>
