{{-- <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('login') }}">Rapp</a>
</div>
<div class="sidebar-brand sidebar-brand-sm">
    <a href="{{ route('login') }}">RR</a>
</div>
<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="nav-item dropdown {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
            <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
            </li>
            <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard-ecommerce-dashboard') }}">Ecommerce Dashboard</a>
            </li>
        </ul>
    </li>
    <li class="menu-header">Administrator</li>
    @can('role-list')
    <li class="{{ Request::is('roles') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('roles') }}"><i class="far fa-square"></i> <span>Roles</span></a>
    </li>
    @endcan
    @can('user-list')
    <li class="{{ Request::is('users') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('users') }}"><i class="far fa-square"></i> <span>Users</span></a>
    </li>
    @endcan

</ul>

</aside>
</div> --}}
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        {{-- @dd(parse_url(request()->url())) --}}
        {{-- @if(request()->has('news'))
                asd
        @endif --}}
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item {{ Request::is('dashboard') ? 'active selected' : '' }}">
                    <a class="sidebar-link sidebar-link" href="{{ url('/') }}" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Beranda</span>
                    </a>
                </li>
                
                <li class="sidebar-item {{ parse_url(request()->url())['path'] == '/news' ? 'active selected' : '' }}">
                    <a class="sidebar-link sidebar-link" href="{{ url('news') }}" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">News</span>
                    </a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Admin</span>
                </li>

                <li class="sidebar-item {{ Request::is('roles') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ url('roles') }}" aria-expanded="false">
                        <i data-feather="tag" class="feather-icon"></i>
                        <span class="hide-menu">Roles</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('payment') ? 'active' : '' }}">
                    <a class="sidebar-link sidebar-link" href="{{ url('payment') }}" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Payment Approval</span>
                    </a>
                </li>
                
                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Data Pengguna</span>
                </li>

                <li class="sidebar-item {{ Request::is('users') ? 'active' : '' }}">
                    <a class="sidebar-link sidebar-link" href="{{ url('users') }}" aria-expanded="false">
                        <i data-feather="message-square" class="feather-icon"></i>
                        <span class="hide-menu">User Profile</span>
                    </a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Regulasi TKDN</span>
                </li>

                <li class="sidebar-item {{ Request::is('permenperincategory') ? 'active' : '' }}">
                    <a class="sidebar-link sidebar-link" href="{{ url('permenperincategory') }}" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Permen Category</span>
                    </a>
                </li>
                <li class="sidebar-item {{ parse_url(request()->url())['path'] == '/needs' ? 'active selected' : '' }}">
                    <a class="sidebar-link sidebar-link" href="{{ url('needs') }}" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">List Of Needs</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('computation') ? 'active' : '' }}">
                    <a class="sidebar-link sidebar-link" href="{{ url('computation') }}" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Calculation</span>
                    </a>
                </li>

                {{-- <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Data Pengguna</span>
                </li>

                <li class="sidebar-item {{ Request::is('roles') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ url('roles') }}" aria-expanded="false">
                        <i  class="fas fa-user"></i>
                        <span class="hide-menu">Profil Pengguna</span>
                    </a>
                </li> --}}
                {{-- ================================================================================================== --}}
                {{-- <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Applications</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="ticket-list.html" aria-expanded="false">
                        <i data-feather="tag" class="feather-icon"></i>
                        <span class="hide-menu">Ticket List </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="app-chat.html" aria-expanded="false">
                        <i data-feather="message-square" class="feather-icon"></i>
                        <span class="hide-menu">Chat</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="app-calendar.html"aria-expanded="false">
                        <i data-feather="calendar" class="feather-icon"></i>
                        <span class="hide-menu">Calendar</span>
                    </a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Components</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                            class="hide-menu">Forms </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="form-inputs.html" class="sidebar-link"><span
                                    class="hide-menu"> Form Inputs
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="form-input-grid.html" class="sidebar-link"><span
                                    class="hide-menu"> Form Grids
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span
                                    class="hide-menu"> Checkboxes &
                                    Radios
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                            class="hide-menu">Tables </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="table-basic.html" class="sidebar-link"><span
                                    class="hide-menu"> Basic Table
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="table-dark-basic.html" class="sidebar-link"><span
                                    class="hide-menu"> Dark Basic Table
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="table-sizing.html" class="sidebar-link"><span
                                    class="hide-menu">
                                    Sizing Table
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="table-layout-coloured.html" class="sidebar-link"><span
                                    class="hide-menu">
                                    Coloured
                                    Table Layout
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="table-datatable-basic.html" class="sidebar-link"><span
                                    class="hide-menu">
                                    Basic
                                    Datatables
                                    Layout
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="bar-chart" class="feather-icon"></i><span
                            class="hide-menu">Charts </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="chart-morris.html" class="sidebar-link"><span
                                    class="hide-menu"> Morris Chart
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="chart-chart-js.html" class="sidebar-link"><span
                                    class="hide-menu"> ChartJs
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="chart-knob.html" class="sidebar-link"><span class="hide-menu">
                                    Knob Chart
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="box" class="feather-icon"></i><span class="hide-menu">UI
                            Elements </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="ui-buttons.html" class="sidebar-link"><span class="hide-menu">
                                    Buttons
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="ui-modals.html" class="sidebar-link"><span class="hide-menu">
                                    Modals </span></a>
                        </li>
                        <li class="sidebar-item"><a href="ui-tab.html" class="sidebar-link"><span class="hide-menu">
                                    Tabs </span></a></li>
                        <li class="sidebar-item"><a href="ui-tooltip-popover.html" class="sidebar-link"><span
                                    class="hide-menu"> Tooltip &
                                    Popover</span></a></li>
                        <li class="sidebar-item"><a href="ui-notification.html" class="sidebar-link"><span
                                    class="hide-menu">Notification</span></a></li>
                        <li class="sidebar-item"><a href="ui-progressbar.html" class="sidebar-link"><span
                                    class="hide-menu">Progressbar</span></a></li>
                        <li class="sidebar-item"><a href="ui-typography.html" class="sidebar-link"><span
                                    class="hide-menu">Typography</span></a></li>
                        <li class="sidebar-item"><a href="ui-bootstrap.html" class="sidebar-link"><span
                                    class="hide-menu">Bootstrap
                                    UI</span></a></li>
                        <li class="sidebar-item"><a href="ui-breadcrumb.html" class="sidebar-link"><span
                                    class="hide-menu">Breadcrumb</span></a></li>
                        <li class="sidebar-item"><a href="ui-list-media.html" class="sidebar-link"><span
                                    class="hide-menu">List
                                    Media</span></a></li>
                        <li class="sidebar-item"><a href="ui-grid.html" class="sidebar-link"><span class="hide-menu">
                                    Grid </span></a></li>
                        <li class="sidebar-item"><a href="ui-carousel.html" class="sidebar-link"><span
                                    class="hide-menu">
                                    Carousel</span></a></li>
                        <li class="sidebar-item"><a href="ui-scrollspy.html" class="sidebar-link"><span
                                    class="hide-menu">
                                    Scrollspy</span></a></li>
                        <li class="sidebar-item"><a href="ui-toasts.html" class="sidebar-link"><span class="hide-menu">
                                    Toasts</span></a>
                        </li>
                        <li class="sidebar-item"><a href="ui-spinner.html" class="sidebar-link"><span class="hide-menu">
                                    Spinner </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="ui-cards.html"
                        aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span
                            class="hide-menu">Cards
                        </span></a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Authentication</span></li>

                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="authentication-login1.html"
                        aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span
                            class="hide-menu">Login
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="authentication-register1.html"
                        aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span
                            class="hide-menu">Register
                        </span></a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="feather" class="feather-icon"></i><span
                            class="hide-menu">Icons
                        </span></a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link"><span
                                    class="hide-menu"> Fontawesome Icons </span></a></li>

                        <li class="sidebar-item"><a href="icon-simple-lineicon.html" class="sidebar-link"><span
                                    class="hide-menu"> Simple Line Icons </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="crosshair" class="feather-icon"></i><span
                            class="hide-menu">Multi
                            level
                            dd</span></a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                    class="hide-menu"> item 1.1</span></a>
                        </li>
                        <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                    class="hide-menu"> item 1.2</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)"
                                aria-expanded="false"><span class="hide-menu">Menu 1.3</span></a>
                            <ul aria-expanded="false" class="collapse second-level base-level-line">
                                <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                            class="hide-menu"> item
                                            1.3.1</span></a></li>
                                <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                            class="hide-menu"> item
                                            1.3.2</span></a></li>
                                <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                            class="hide-menu"> item
                                            1.3.3</span></a></li>
                                <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                            class="hide-menu"> item
                                            1.3.4</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                    class="hide-menu"> item
                                    1.4</span></a></li>
                    </ul>
                </li> --}}
                {{-- <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Extra</span>
                </li> --}}
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="docs/docs.html" aria-expanded="false">
                        <i data-feather="edit-3" class="feather-icon"></i>
                        <span class="hide-menu">Documentation</span>
                    </a>
                </li> --}}
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('logout') }}" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i>
                        <span class="hide-menu">Logout</span>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
