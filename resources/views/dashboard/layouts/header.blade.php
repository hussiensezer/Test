<!--start top header-->
<header class="top-header">
    <nav class="navbar navbar-expand gap-3">
        <div class="mobile-menu-button">
            <ion-icon name="menu-sharp"></ion-icon>
        </div>
        <div class="top-navbar-right ms-auto">

            <ul class="navbar-nav align-items-center">
                <li class="nav-item mobile-search-button">
                    <a class="nav-link" href="javascript:;" title="ابحث">
                        <div class="">
                            <ion-icon name="search-sharp"></ion-icon>
                        </div>
                    </a>
                </li>

                {{--Start Langauge Switcher--}}
                    @include('dashboard.layouts.language_switcher')
                {{--End Langauge Switcher--}}
                
                <li class="nav-item dropdown dropdown-large">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown" title="الإشعارات">
                        <div class="position-relative">
                            <span class="notify-badge">8</span>
                            <ion-icon name="notifications-sharp"></ion-icon>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:;" title="الإشعارات">
                            <div class="msg-header">
                                <p class="msg-header-title">Notifications</p>
                                <p class="msg-header-clear ms-auto">Marks all as read</p>
                            </div>
                        </a>
                        <div class="header-notifications-list">
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-primary">
                                        <ion-icon name="cart-outline"></ion-icon>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
                            ago</span></h6>
                                        <p class="msg-info">You have recived new orders</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-danger">
                                        <ion-icon name="person-outline"></ion-icon>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                            ago</span></h6>
                                        <p class="msg-info">5 new user registered</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-success">
                                        <ion-icon name="document-outline"></ion-icon>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
                            ago</span></h6>
                                        <p class="msg-info">The pdf files generated</p>
                                    </div>
                                </div>
                            </a>

                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-info">
                                        <ion-icon name="checkmark-done-outline"></ion-icon>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Product Approved <span class="msg-time float-end">2 hrs ago</span></h6>
                                        <p class="msg-info">Your new product has approved</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-warning">
                                        <ion-icon name="send-outline"></ion-icon>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
                            ago</span></h6>
                                        <p class="msg-info">5.1 min avarage time response</p>
                                    </div>
                                </div>
                            </a>

                        </div>
                        <a href="javascript:;">
                            <div class="text-center msg-footer">View All Notifications</div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-user-setting">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                        <div class="user-setting">
                            <img src="{{URL::asset('assets/images/profile-logo.png')}}" class="user-img" alt="">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex flex-row align-items-center gap-2 user-profile-inner">
                                    <img src="{{URL::asset('assets/images/profile-logo.png')}}" alt="" class="rounded-circle" width="54" height="54">
                                    <div class="">
                                        <h6 class="mb-0 dropdown-user-name">{{auth('users')->user()->name}}</h6>
                                        <small class="mb-0 dropdown-user-designation text-secondary">UI Developer</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <ion-icon name="person-outline"></ion-icon>
                                    </div>
                                    <div class="ms-3"><span>Profile</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <ion-icon name="settings-outline"></ion-icon>
                                    </div>
                                    <div class="ms-3"><span>Setting</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <ion-icon name="speedometer-outline"></ion-icon>
                                    </div>
                                    <div class="ms-3"><span>Dashboard</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <ion-icon name="wallet-outline"></ion-icon>
                                    </div>
                                    <div class="ms-3"><span>Earnings</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <ion-icon name="cloud-download-outline"></ion-icon>
                                    </div>
                                    <div class="ms-3"><span>Downloads</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                                <form action="{{route("dashboard.logout")}}" method="post" class="" id="logout">
                                @csrf
                            <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout').submit()">


                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <ion-icon name="log-out-outline"></ion-icon>
                                    </div>
                                    <div class="ms-3"><span>Logout</span>
                                    </div>
                                </div>
                            </a>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>
    </nav>
</header>
<!--end top header-->
