<!-- Header Container
================================================== -->
<header id="header-container">

        <!-- Header -->
        <div id="header">
            <div class="container">
                
                <!-- Left Side Content -->
                <div class="left-side">
                    
                    <!-- Logo -->
                    <div id="logo">
                        <a href="{{ route('home.index') }}"><img src="{{ asset('frontend/images/logo.png') }}" alt=""></a>
                    </div>
    
                    <!-- Mobile Navigation -->
                    <div class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
    
    
                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        <ul id="responsive">
    
                            <li><a  href="#">Start</a>
                                <ul>
                                    <li><a href="nosotros.html"> Escapar.me</a></li>
                                    <li><a href="news.html"> Alertas de Escapadas</a></li>
                                    <li><a href="my-review.html"> Agregar mi Review</a></li>
                                    <hr>
                                    <li><a href="https://www.facebook.com/Escaparme-1726887357407279/" target="_blank">Facebook</a></li>
                                    <li><a href="">Instagram</a></li>
                                    
                                    
                                </ul>
                            </li>
    
                            
    
                            <li><a href="#">Escapar.me </a>
                                <div class="mega-menu mobile-styles three-columns">
                                        <!-- estos links lo pongo a mano fer.. , la idea es que permitan tener friendly url tipo escarpar.me/buscador/negocios/bares-en-zona-norte -->
                                        <div class="mega-menu-section">
                                            <ul>
                                                <li class="mega-menu-headline">Lifestyle</li>
                                                @foreach(App\Lifestyle::getLifestyles(5) as $lifestyle)
                                                    <li><a href="javascript:void(0)"><i class="sl sl-icon-pin"></i> {{ $lifestyle->name }}</a></li>
                                                @endforeach

                                            </ul>
                                        </div>
                                        <!-- estos links lo pongo a mano deigo.. , la idea es que permitan tener friendly url tipo escarpar.me/a/lugares -->
                                        <div class="mega-menu-section">
                                            <ul>
                                                <li class="mega-menu-headline">Paises</li>
                                                @foreach(App\Place::$country as $i => $country)
                                                    <li><a href="javascript:void(0)"><i class="sl sl-icon-directions"></i> {{ $country }}</a></li>
                                                @endforeach
                                                {{-- <li><a href=""><i class="sl sl-icon-directions"></i> Chile</a></li>
                                                <li><a href=""><i class="sl sl-icon-directions"></i> Brasil</a></li>
                                                <li><a href=""><i class="sl sl-icon-directions"></i> Paraguay</a></li>
                                                <li><a href=""><i class="sl sl-icon-directions"></i> Uruguay</a></li> --}}
                                            </ul>
                                        </div>
    
                                        <div class="mega-menu-section">
                                            <ul>
                                                <li class="mega-menu-headline">Escapar.me</li>
                                                <li><a href="join-us.html"><i class="sl sl-icon-settings"></i> Join Us</a></li>
                                                <li><a href="publicidad.html"><i class="sl sl-icon-tag"></i> Publicidad</a></li>
                                                <li><a href="visitarme.html"><i class="sl sl-icon-pencil"></i> Visitar.me</a></li>
                                                <li><a href="contacto.html"><i class="sl sl-icon-diamond"></i> Contacto</a></li>
                                                <li><a href="contacto.html"><i class="sl sl-icon-notebook"></i> Legales</a></li>
                                            </ul>
                                        </div>
                                        
                                </div>
                            </li>
                            
                        
    
                            
                            
                        </ul>
                    </nav>
                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->
                    
                </div>
                <!-- Left Side Content / End -->
    
    
                <!-- Right Side Content / End -->
                <div class="right-side">
                    <div class="header-widget">
                        
                        {{-- <a href="visitar-me.html" class="button border with-icon">Visitar.me <i class="sl sl-icon-plus"></i></a> --}}
                    </div>
                </div>
                <!-- Right Side Content / End -->
    
                
    
            </div>
        </div>
        <!-- Header / End -->
    
    </header>
    <div class="clearfix"></div>
    <!-- Header Container / End -->