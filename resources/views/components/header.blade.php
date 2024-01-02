{{-- <div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li>
                <a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none">
                    <i class="fas fa-search"></i>
                </a>
            </li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="/profile" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav> --}}

<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <!-- Logo icon -->
                <a href="{{ url('/') }}">
                    <b class="logo-icon">
                        <!-- Dark Logo icon -->
                        <img src="{{ asset('assets/images/icon-elearning.png') }}" alt="homepage" class="dark-logo" width="40" />
                        <!-- Light Logo icon -->
                        <img src="{{ asset('assets/images/icon-elearning.png') }}" alt="homepage" class="light-logo" width="40" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                        <!-- dark Logo text -->
                        <img src="{{ asset('assets/images/text-elearning.png') }}" alt="homepage" class="dark-logo" width="100"/>
                        <!-- Light Logo text -->
                        <img src="{{ asset('assets/images/text-elearning.png') }}" class="light-logo" alt="homepage" width="100" />
                    </span>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                <!-- Notification -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)" id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                        <span><i data-feather="bell" class="svg-icon"></i></span>
                        <span class="badge badge-primary notify-no rounded-circle">{{auth()->user()->unreadNotifications->count()}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                        <ul class="list-style-none" style="overflow-y: scroll; height: 300px;">
                            @if (auth()->user()->unreadNotifications)
                                <li class="">
                                    <a href="{{route('mark-as-read')}}" class="btn btn-success btn-sm text-white">Mark All as Read</a>
                                </li>
                            @endif
                            <li>
                                <div class="message-center notifications position-relative">
                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                        <a href="#" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                            <div class="btn btn-danger rounded-circle btn-circle"><i data-feather="airplay" class="text-white"></i></div>
                                            <div class="w-75 d-inline-block v-middle pl-2">
                                                <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                                                <span class="font-12 text-nowrap d-block text-muted font-weight-bold">
                                                    {{$notification->data['message']}}
                                                </span>
                                                <span class="font-12 text-nowrap d-block text-muted">{{ date('d M Y, g:ia', strtotime($notification->created_at)) }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                    @foreach (auth()->user()->readNotifications as $notification)
                                        <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2 text-secondary">
                                            <div class="btn btn-danger rounded-circle btn-circle"><i data-feather="airplay" class="text-white"></i></div>
                                            <div class="w-75 d-inline-block v-middle pl-2">
                                                <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                                                <span class="font-12 text-nowrap d-block text-muted">
                                                    {{$notification->data['message']}}
                                                </span>
                                                <span class="font-12 text-nowrap d-block text-muted">{{ date('d M Y, g:ia', strtotime($notification->created_at)) }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                            {{-- <li>
                                <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                                    <strong>Check all notifications</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                <!-- End Notification -->
                <!-- ============================================================== -->
                <!-- create new -->
                <!-- ============================================================== -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="settings" class="svg-icon"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> --}}
                {{-- <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="javascript:void(0)">
                        <div class="customize-input">
                            <select class="custom-select form-control bg-white custom-radius custom-shadow border-0">
                                <option selected>EN</option>
                                <option value="1">AB</option>
                                <option value="2">AK</option>
                                <option value="3">BE</option>
                            </select>
                        </div>
                    </a>
                </li> --}}
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                {{-- <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="javascript:void(0)">
                        <form>
                            <div class="customize-input">
                                <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                    type="search" placeholder="Search" aria-label="Search">
                                <i class="form-control-icon" data-feather="search"></i>
                            </div>
                        </form>
                    </a>
                </li> --}}
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (!auth()->user()->user_profile)
                            <img src="{{ asset(auth()->user()->user_profile->getAvatarPath()) }}" alt="user" class="rounded-circle" width="40" height="40">
                        @endif
                        <span class="ml-2 d-none d-lg-inline-block">
                            <span>Halo,</span>
                            <span class="text-dark">{{ auth()->user()->user_profile->fullname ?? '' }}</span>
                            <i data-feather="chevron-down" class="svg-icon"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="/profile-pengguna">
                            <i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                            Profil
                        </a>
                        {{-- <a class="dropdown-item" href="javascript:void(0)">
                            <i data-feather="credit-card" class="svg-icon mr-2 ml-1"></i>
                            My Balance
                        </a> --}}
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i data-feather="mail" class="svg-icon mr-2 ml-1"></i>
                            Pesan
                        </a>
                        {{-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i data-feather="settings" class="svg-icon mr-2 ml-1"></i>
                            Account Setting
                        </a> --}}
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                            Logout
                        </a>
                        {{-- <div class="dropdown-divider"></div>
                        <div class="pl-4 p-3">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info">View
                                Profile
                            </a>
                        </div> --}}
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
