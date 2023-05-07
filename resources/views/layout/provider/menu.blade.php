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
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{route('provider.posts_list')}}"><i data-feather="layers"></i><span>Posts</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>Room</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('provider.services.list') }}"><i data-feather="git-pull-request"> </i><span>Service</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>Electrical Parameters</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>Water Parameters</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>Incurred</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>Calculate</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>Coupon</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>History sent</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>Work</span></a></li>
                    <li class="sidebar-list">
                        <label class="badge badge-light-primary">9</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i><span>Report</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('provider.index')}}">Report the loss</a></li>
                            <li><a href="{{route('provider.index')}}">List of guest rooms</a></li>
                            <li><a href="{{route('provider.index')}}">List of guests renting a room</a></li>
                            <li><a href="{{route('provider.index')}}">List of guests with room debt</a></li>
                            <li><a href="{{route('provider.index')}}">The guest list is about to end the contract</a></li>
                            <li><a href="{{route('provider.index')}}">List of guests to deposit</a></li>
                            <li><a href="{{route('provider.index')}}">Revenue by service</a></li>
                            <li><a href="{{route('provider.index')}}">List of members by room</a></li>
                            <li><a href="{{route('provider.index')}}">Invoice details</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>Staff</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>Setting</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>Property</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>Coupon</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>Piles keep room</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>Change password</span></a></li>
{{--                    <li class="sidebar-list">--}}
{{--                        <label class="badge badge-light-danger">Latest</label><a class="sidebar-link sidebar-title link-nav" href="kanban.html"><i data-feather="monitor"> </i><span>kanban Board</span></a>--}}
{{--                    </li>--}}
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
