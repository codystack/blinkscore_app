    <div class="topbar-wrap">
        <div class="topbar is-sticky">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ul class="topbar-nav d-lg-none">
                        <li class="topbar-nav-item relative">
                            <a class="toggle-nav" href="#">
                                <div class="toggle-icon">
                                    <span class="toggle-line"></span>
                                    <span class="toggle-line"></span>
                                    <span class="toggle-line"></span>
                                    <span class="toggle-line"></span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    
                    <a class="topbar-logo" href="dashboard">
                        <img src="./assets/images/logo_light.svg" srcset="./assets/images/logo_light.svg 2x" alt="logo">
                    </a>
                    <ul class="topbar-nav">
                        <li class="topbar-nav-item relative">
                            <span class="user-welcome d-none d-lg-inline-block">Welcome! <?= $firstName ?></span>
                            <a class="toggle-tigger user-thumb" href="#">
                                <em class="ti ti-user"></em>
                            </a>
                            <div class="toggle-class dropdown-content dropdown-content-right dropdown-arrow-right user-dropdown">
                                <div class="user-status">
                                    <h6 class="user-status-title"><?= $fullName ?></h6>
                                    <p class="text-white"><small><?= $userEmail ?></small></p>
                                </div>
                                <ul class="user-links">
                                    <li>
                                        <a href="profile">
                                            <i class="ti ti-id-badge"></i>My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="logout">
                                            <i class="ti ti-power-off"></i>Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="navbar">
            <div class="container">
                <div class="navbar-innr">
                    <ul class="navbar-menu">
                        <li><a href="dashboard"><em class="ikon ikon-dashboard"></em> Dashboard</a></li>

                        <li><a href="applications"><em class="ikon ikon-distribution"></em> Applications</a></li>

                        <li><a href="transactions"><em class="ikon ikon-transactions"></em> Transactions</a></li>

                        <li><a href="profile"><em class="ikon ikon-user"></em> Profile</a></li>
                    </ul>
                    <ul class="navbar-btns">
                        <li>
                            <a href="applications" class="btn btn-sm btn-outline btn-danger">
                                <em class="text-danger ti ti-files"></em><span>POF Application</span>
                            </a>
                        </li>
                        <li class="d-none">
                            <span class="badge badge-outline badge-success badge-lg">
                                <em class="text-success ti ti-files mgr-1x"></em><span class="text-success">KYC Approved</span>
                            </span>
                        </li>
                    </ul>
                </div>
                <!-- .navbar-innr -->
            </div>
            <!-- .container -->
        </div>
        <!-- .navbar -->
    </div>