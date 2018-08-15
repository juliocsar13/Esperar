<!-- Header Container
    ================================================== -->
    <header id="header-container" class="fixed fullwidth dashboard">

        <!-- Header -->
        <div id="header" class="not-sticky">
            <div class="container">
                
                <!-- Left Side Content -->
                <div class="left-side">
                    
                    <!-- Logo -->
                    <div id="logo">
                        <h1 class="text-center" style="color: white"><Strong> Escapar.me</strong></h1>
                    </div>

                    <!-- Mobile Navigation -->
                    <div class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>

                    
                    
                </div>
                <!-- Left Side Content / End -->

                <!-- Right Side Content / End -->
                <div class="right-side">
                    <!-- Header Widget -->
                    <div class="header-widget">
                        
                        <!-- User Menu -->
                        <div class="user-menu">
                            <div class="user-name"><span><img src="{{ asset('backend/images/dashboard-avatar.jpg') }}" alt=""></span>Admin</div>
                            <ul>
                                <li><a href="{{ route('admin.dashboard') }}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                                <li><a href="{{ route('review.index') }}"><i class="sl sl-icon-envelope-open"></i> Listar Reviews</a></li>
                                <li><a href="{{ route('lugar.index') }}"><i class="fa fa-calendar-check-o"></i> Listar Lugares</a></li>
                                <li><a href="{{ route('admin.logout') }}"><i class="sl sl-icon-power"></i> Logout</a></li>
                            </ul>
                        </div>

                        <a href="{{ route('review.create') }}" class="button border with-icon">Crear Review <i class="sl sl-icon-plus"></i></a>
                    </div>
                    <!-- Header Widget / End -->
                </div>
                <!-- Right Side Content / End -->

            </div>
        </div>
        <!-- Header / End -->

    </header>
    <div class="clearfix"></div>
    <!-- Header Container / End -->