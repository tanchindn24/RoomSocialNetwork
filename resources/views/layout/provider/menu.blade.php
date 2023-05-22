<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="{{route('provider.index')}}"><img class="img-fluid for-light" src="{{URL::asset('/assets/backend/provider/assets/images/logo/logo.png')}}" alt=""><img class="img-fluid for-dark" src="/assets/backend/provider/assets/images/logo/logo_dark.png" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"></i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{route('provider.index')}}"><img class="img-fluid" src="{{URL::asset('/assets/backend/provider/assets/images/logo/logo-icon.png')}}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="{{route('provider.index')}}"><img class="img-fluid" src="{{URL::asset('/assets/backend/provider/assets/images/logo/logo-icon.png')}}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-light-primary">1</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i><span class="lan-3">Dashboard</span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="{{route('provider.index')}}">Dashboard</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('provider.chat.seeker') }}"><i data-feather="message-circle"></i><span>Chat</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('provider.post.list') }}"><i data-feather="layers"></i><span>Bài viết</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('provider.room.list') }}"><i data-feather="grid"></i><span>Phòng</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('provider.service.list') }}"><i data-feather="package"></i><span>Dịch vụ</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="cloud-lightning"></i><span>Chỉ số điện</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="cloud-rain"></i><span>Chỉ số nước</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>Phát sinh</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="dollar-sign"></i><span>Tính tiền</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="credit-card"></i><span>Phiếu chi</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="message-square"></i><span>Lịch sử gửi email/SMS</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="list"></i><span>Công việc</span></a></li>
                    <li class="sidebar-list">
                        <label class="badge badge-light-primary">9</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="tag"></i><span>Báo cáo</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('provider.index')}}">Báo cáo lời lỗ</a></li>
                            <li><a href="{{route('provider.index')}}">Danh sách khách thuê phòng</a></li>
                            <li><a href="{{route('provider.index')}}">Danh sách khách đang thuê phòng</a></li>
                            <li><a href="{{route('provider.index')}}">Danh sách khách nợ tiền phòng</a></li>
                            <li><a href="{{route('provider.index')}}">Danh sách khách sắp hết hợp đồng</a></li>
                            <li><a href="{{route('provider.index')}}">Danh sách khách thuê đặt cọc</a></li>
                            <li><a href="{{route('provider.index')}}">Doanh thu theo dịch vụ</a></li>
                            <li><a href="{{route('provider.index')}}">Danh sách thành viên theo phòng</a></li>
                            <li><a href="{{route('provider.index')}}">Chi tiết hóa đơn</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="users"></i><span>Nhân viên</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="settings"></i><span>Thiết lập</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="dollar-sign"></i><span>Tài sản</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="file-text"></i><span>Phiếu thu</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="feather"></i><span>Cọc giữ phòng</span></a></li>
{{--                    <li class="sidebar-list">--}}
{{--                        <label class="badge badge-light-danger">Latest</label><a class="sidebar-link sidebar-title link-nav" href="kanban.html"><i data-feather="monitor"> </i><span>kanban Board</span></a>--}}
{{--                    </li>--}}
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
