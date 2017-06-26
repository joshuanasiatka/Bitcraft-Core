<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- Font-Awesome --}}
    <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" integrity="sha384-dNpIIXE8U05kAbPhy3G1cz+yZmTzA6CY8Vg/u2L9xRnHjJiAK76m2BIEaSEV+/aU" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="page-top">
            <a href="#" class="al-logo"><span>Bitcraft</span>Core</a>
            <a class="collapse-menu-link"><i class="fa fa-bars"></i></a>
            <div class="search">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Search for..." id="searchInput">
            </div>
            <div class="user-profile">
                <div class="al-user profile dropdown">
                    <a href="" class="profile-toggle-link dropdown-toggle">
                        <img src="{{ asset('img/default-profile.jpg') }}" alt="">
                    </a>
                    <ul class="top-dropdown-menu profile-dropdown dropdown-menu">
                        <li><i class="dropdown-arr"></i></li>
                        <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="#"><i class="fa fa-power-off"></i> Sign Out</a></li>
                    </ul>
                </div>
                <div>
                    <ul class="al-msg-center">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-bell-o"></i>
                                {{-- @TODO: Dynamic --}}
                                <span>5</span>
                                <span class="notification-ring"></span>
                            </a>
                            <div class="top-dropdown-menu dropdown-menu">
                                <i class="dropdown-arr"></i>
                                <div class="header">
                                    <strong>Notifications</strong>
                                    <a href="#">Mark All as Read</a>
                                    <a href="#">Settings</a>
                                </div>
                                <div class="msg-list">
                                    {{-- @TODO: Dynamic --}}
                                    <a href="#">
                                        <div class="img-area">
                                            <img src="{{ asset('img/default-profile.jpg') }}" alt="" class="photo-msg-item">
                                        </div>
                                        <span class="msg-area">
                                            <div><strong>Vlad</strong> posted a new comment</div>
                                            <span>1 min ago</span>
                                        </span>
                                    </a>
                                </div>
                                <a href="#">See all notifications</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="msg dropdown-toggle">
                                <i class="fa fa-envelope-o"></i>
                                <span>5</span>
                                <span class="notification-ring"></span>
                            </a>
                            <div class="top-dropdown-menu dropdown-menu">
                                <i class="dropdown-arr"></i>
                                <div class="header">
                                    <strong>Messages</strong>
                                    <a href="#">Mark All as Read</a>
                                    <a href="#">Settings</a>
                                </div>
                                <div class="msg-list">
                                    <a href="#">
                                        <div class="img-area">
                                            <img src="{{ asset('img/default-profile.jpg') }}" alt="" class="photo-msg-item">
                                        </div>
                                        <span class="msg-area">
                                            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat...</div>
                                            <span>1 min ago</span>
                                        </span>
                                    </a>
                                </div>
                                <a href="#">See all messages</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="questions-section">
                    Have Questions?
                    <a href="#">contact@bcc.com</a>
                </div>
            </div>
        </nav>
        <aside class="al-sidebar">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 853px;">
                <ul class="al-sidebar-list" style="overflow:hidden; width: auto; height: 853px;">
                    {{-- @TODO: Dynamic --}}
                    <li class="al-sidebar-list-item selected">
                        <a href="#" class="al-sidebar-list-link">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="al-sidebar-list-item with-sub-menu">
                        <a href="#" class="al-sidebar-list-link">
                            <i class="fa fa-cog"></i>
                            <span>Components</span>
                            <b class="fa fa-angle-down"></b>
                        </a>
                        <ul class="al-sidebar-sublist">
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Mail</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Timeline</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Tree View</a>
                            </li>
                        </ul>
                    </li>
                    <li class="al-sidebar-list-item with-sub-menu">
                        <a href="#" class="al-sidebar-list-link">
                            <i class="fa fa-bar-chart"></i>
                            <span>Charts</span>
                            <b class="fa fa-angle-down"></b>
                        </a>
                        <ul class="al-sidebar-sublist">
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Mail</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Timeline</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Tree View</a>
                            </li>
                        </ul>
                    </li>
                    <li class="al-sidebar-list-item with-sub-menu">
                        <a href="#" class="al-sidebar-list-link">
                            <i class="fa fa-laptop"></i>
                            <span>UI Features</span>
                            <b class="fa fa-angle-down"></b>
                        </a>
                        <ul class="al-sidebar-sublist">
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Mail</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Timeline</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Tree View</a>
                            </li>
                        </ul>
                    </li>
                    <li class="al-sidebar-list-item with-sub-menu">
                        <a href="#" class="al-sidebar-list-link">
                            <i class="fa fa-edit"></i>
                            <span>Form Elements</span>
                            <b class="fa fa-angle-down"></b>
                        </a>
                        <ul class="al-sidebar-sublist">
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Mail</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Timeline</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Tree View</a>
                            </li>
                        </ul>
                    </li>
                    <li class="al-sidebar-list-item with-sub-menu">
                        <a href="#" class="al-sidebar-list-link">
                            <i class="fa fa-table"></i>
                            <span>Tables</span>
                            <b class="fa fa-angle-down"></b>
                        </a>
                        <ul class="al-sidebar-sublist">
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Mail</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Timeline</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Tree View</a>
                            </li>
                        </ul>
                    </li>
                    <li class="al-sidebar-list-item with-sub-menu">
                        <a href="#" class="al-sidebar-list-link">
                            <i class="fa fa-map-marker"></i>
                            <span>Maps</span>
                            <b class="fa fa-angle-down"></b>
                        </a>
                        <ul class="al-sidebar-sublist">
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Mail</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Timeline</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Tree View</a>
                            </li>
                        </ul>
                    </li>
                    <li class="al-sidebar-list-item with-sub-menu">
                        <a href="#" class="al-sidebar-list-link">
                            <i class="fa fa-file"></i>
                            <span>Pages</span>
                            <b class="fa fa-angle-down"></b>
                        </a>
                        <ul class="al-sidebar-sublist">
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Mail</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Timeline</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Tree View</a>
                            </li>
                        </ul>
                    </li>
                    <li class="al-sidebar-list-item with-sub-menu">
                        <a href="#" class="al-sidebar-list-link">
                            <i class="fa fa-ellipsis-h"></i>
                            <span>Menu Level 1</span>
                            <b class="fa fa-angle-down"></b>
                        </a>
                        <ul class="al-sidebar-sublist">
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Mail</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Timeline</a>
                            </li>
                            <li class="ba-sidebar-sublist-item">
                                <a href="#">Tree View</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        @yield('content')
    </div>
    <script type="text/javascript">
        // Server Global Variable
        var V = {};
    </script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
