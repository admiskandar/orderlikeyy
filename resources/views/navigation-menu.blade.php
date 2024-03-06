<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Header -->
    <div class="header">
    
        <!-- Logo -->
            <div class="header-left">
            <a href="{{ route('dashboard') }}" class="logo logo-normal">
                <img src="{{ asset('build') }}/assets/img/logo.png"  alt="">
            </a>
            <a href="{{ route('dashboard') }}" class="logo logo-white">
                <img src="{{ asset('build') }}/assets/img/logo-white.png"  alt="">
            </a>
            <a href="{{ route('dashboard') }}" class="logo-small">
                <img src="{{ asset('build') }}/assets/img/logo-small.png"  alt="">
            </a>
            <a id="toggle_btn" href="javascript:void(0);">
                <i data-feather="chevrons-left" class="feather-16"></i>
            </a>
        </div>
        <!-- /Logo -->
        
        <a id="mobile_btn" class="mobile_btn" href="#sidebar">
            <span class="bar-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </a>
        
        <!-- Header Menu -->
        <style>
    .user-menu {
        justify-content: flex-end;
    }
</style>

<ul class="nav user-menu">
    <li class="nav-item nav-item-box">
        <a href="javascript:void(0);" id="btnFullscreen">
            <i data-feather="maximize"></i>
        </a>
    </li>
    <li class="nav-item dropdown has-arrow main-drop">
        <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
            <span class="user-info">
                <!-- <span class="user-letter">
                    <img src="{{ asset('build') }}/assets/img/profiles/avator1.jpg" alt="" class="img-fluid">
                </span> -->
                <span class="user-detail">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                    <span class="user-role">{{ Auth::user()->user_type }}</span>
                </span>
            </span>
        </a>
        <div class="dropdown-menu menu-drop-user">
            <div class="profilename">
                <!-- <div class="profileset">
                    <span class="user-img"><img src="{{ asset('build') }}/assets/img/profiles/avator1.jpg" alt="">
                    <span class="status online"></span></span>
                    <div class="profilesets">
                        <h6>{{ Auth::user()->name }}</h6>
                        <h5>Super Admin</h5>
                    </div>
                </div> -->
                <hr class="m-0">
                <x-responsive-nav-link class="dropdown-item" href="{{ route('my.profile.show') }}">
                    <i class="me-2" data-feather="user"></i>
                    {{ __('My Profile') }}
                </x-responsive-nav-link>
                <hr class="m-0">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link class="dropdown-item logout pb-0" href="{{ route('logout') }}"
                        @click.prevent="$root.submit();">
                        <img src="{{ asset('build') }}/assets/img/icons/log-out.svg" class="me-2" alt="img">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </li>
</ul>

        <!-- /Header Menu -->
        
        <!-- Mobile Menu -->
        <div class="dropdown mobile-user-menu">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <x-responsive-nav-link class="dropdown-item" href="{{ route('my.profile.show') }}">
                    {{ __('My Profile') }}
                </x-responsive-nav-link>

                <!-- <a class="dropdown-item" href="signin.html">Logout</a> -->
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link class="dropdown-item logout pb-0" href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">
                        <img src="{{ asset('build') }}/assets/img/icons/log-out.svg" class="me-2" alt="img">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        <!-- /Mobile Menu -->
    </div>
    <!-- Header -->
    
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <!-- Navigation for KESUKOMP -->
                @if(Auth::user()->user_type == "KESUKOMP")
                <ul>
                    <li class="submenu-open">
                        <!-- <h6 class="submenu-hdr">Main</h6> -->
                        <ul>
                            <li class="">
                                <a href="{{ route('dashboard') }}" ><img src="{{ asset('build') }}/assets/img/custom-icon/dashboard.png" alt="img" style="max-width: 32px; max-height: 32px;">&nbsp;&nbsp;&nbsp;<span>Dashboard</span></a>
                            </li>
                        </ul>								
                    </li>
                    
                    <li class="submenu-open">
                        <!-- <h6 class="submenu-hdr">Manage User</h6> -->
                        <ul>
                            <li><a href="{{ route('user.list') }}"><img src="{{ asset('build') }}/assets/img/custom-icon/user-list.png" alt="img" style="max-width: 32px; max-height: 32px;">&nbsp;&nbsp;&nbsp;<span>Manage User Profile</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <!-- <h6 class="submenu-hdr">Manage Kiosk</h6> -->
                        <ul>
                            <li><a href="{{ route('kiosk.list') }}"><img src="{{ asset('build') }}/assets/img/custom-icon/kiosk.png" alt="img" style="max-width: 32px; max-height: 32px;">&nbsp;&nbsp;&nbsp;<span>Manage Kiosk</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <!-- <h6 class="submenu-hdr">Manage Menu</h6> -->
                        <ul>
                            <li><a href="{{ route('menu.list') }}"><img src="{{ asset('build') }}/assets/img/custom-icon/menu.png" alt="img" style="max-width: 32px; max-height: 32px;">&nbsp;&nbsp;&nbsp;<span>Manage Menu</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <!-- <h6 class="submenu-hdr">Manage Order / Sale </h6> -->
                        <ul>
                            <li><a href="{{ route('invoice.list') }}"><img src="{{ asset('build') }}/assets/img/custom-icon/invoice.png" alt="img" style="max-width: 32px; max-height: 32px;">&nbsp;&nbsp;&nbsp;<span>View Receipts</span></a></li>
                        </ul>
                    </li>
                </ul>
                @endif
                <!-- Navigation for Kiosk Staff -->
                @if(Auth::user()->user_type == "Kiosk Staff")
                <ul>
                    <li class="submenu-open">
                        <ul>
                            <li class="">
                                <a href="{{ route('dashboard') }}" ><img src="{{ asset('build') }}/assets/img/custom-icon/dashboard.png" alt="img" style="max-width: 32px; max-height: 32px;">&nbsp;&nbsp;&nbsp;<span>Dashboard</span></a>
                            </li>
                        </ul>								
                    </li>
                    <li class="submenu-open">
                        <!-- <h6 class="submenu-hdr">Manage Kiosk</h6> -->
                        <ul>
                            <li><a href="{{ route('kiosk.my.kiosk') }}"><img src="{{ asset('build') }}/assets/img/custom-icon/kiosk.png" alt="img" style="max-width: 32px; max-height: 32px;">&nbsp;&nbsp;&nbsp;<span>My Kiosk</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <!-- <h6 class="submenu-hdr">Manage Menu</h6> -->
                        <ul>
                            <li><a href="{{ route('menu.my.menu') }}"><img src="{{ asset('build') }}/assets/img/custom-icon/menu.png" alt="img" style="max-width: 32px; max-height: 32px;">&nbsp;&nbsp;&nbsp;<span>My Menu</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <!-- <h6 class="submenu-hdr">Manage Order / Sale </h6> -->
                        <ul>
                            <li><a href="{{ route('order.pos') }}"><img src="{{ asset('build') }}/assets/img/custom-icon/pos.png" alt="img" style="max-width: 32px; max-height: 32px;">&nbsp;&nbsp;&nbsp;<span>POS</span></a></li>
                            <!-- <li><a href="{{ route('order.sales.list') }}"><img src="{{ asset('build') }}/assets/img/custom-icon/dashboard.png" alt="img" style="max-width: 32px; max-height: 32px;">&nbsp;&nbsp;&nbsp;<span>Sales</span></a></li>  -->
                            <li><a href="{{ route('my.invoice.list') }}"><img src="{{ asset('build') }}/assets/img/custom-icon/invoice.png" alt="img" style="max-width: 32px; max-height: 32px;">&nbsp;&nbsp;&nbsp;<span>My Receipts</span></a></li>
                        </ul>
                    </li>
                </ul>
                @endif
                
                
                <!-- Navigation for customer -->
                @if(Auth::user()->user_type == "Customer")
                <ul>
                    <li class="submenu-open">
                        <ul>
                            <li>
                                <a href="{{ route('dashboard') }}" ><img src="{{ asset('build') }}/assets/img/custom-icon/homepage.png" alt="img" style="max-width: 32px; max-height: 32px;">&nbsp;&nbsp;&nbsp;<span>Home</span></a>
                            </li>
                        </ul>								
                    </li>
                    <li class="submenu-open">
                        <ul>
                            <li>
                                <a href="{{ route('kiosk.customer.list') }}" ><img src="{{ asset('build') }}/assets/img/custom-icon/kiosk.png" alt="img" style="max-width: 32px; max-height: 32px;">&nbsp;&nbsp;&nbsp;<span>Kiosk</span></a>
                            </li>
                        </ul>								
                    </li>
                    <li class="submenu-open">
                        <ul>
                            <li>
                                <a href="{{ route('menu.customer.list')}}" ><img src="{{ asset('build') }}/assets/img/custom-icon/menu.png" alt="img" style="max-width: 32px; max-height: 32px;">&nbsp;&nbsp;&nbsp;<span>Menu</span></a>
                            </li>
                        </ul>								
                    </li>
                    <li class="submenu-open">
                        <ul>
                            <li>
                                <a href="{{ route('favourite.list')}}" ><img src="{{ asset('build') }}/assets/img/custom-icon/wishlist.png" alt="img" style="max-width: 32px; max-height: 32px;">&nbsp;&nbsp;&nbsp;<span>My Favourite</span></a>
                            </li>
                        </ul>								
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </div>
</nav>
