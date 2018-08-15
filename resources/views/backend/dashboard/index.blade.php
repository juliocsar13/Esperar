@extends('backend.layouts.backend') 

@section('content')
    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Hola Man! Como va eso!</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <!-- Content -->
    <div class="row">

        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-1">
                <div class="dashboard-stat-content"><h4>{{ App\Place::getCountAllPlace() }}</h4> <span>Lugares Creados</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Map2"></i></div>
            </div>
        </div>

        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-2">
                <div class="dashboard-stat-content"><h4>{{ App\Review::getCountAllReview() }}</h4> <span>Reviews</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Line-Chart"></i></div>
            </div>
        </div>

        
        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-3">
                <div class="dashboard-stat-content"><h4>{{ App\Lifestyle::getCountAllLifestyle() }}</h4> <span>Lifestyles</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Add-UserStar"></i></div>
            </div>
        </div>

        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-4">
                <div class="dashboard-stat-content"><h4>{{ App\Category::getCountAllCategory() }}</h4> <span>Categorias</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
            </div>
        </div>
    </div>


    <div class="row">
        
        


        <!-- Copyrights -->
        <div class="col-md-12">
            <div class="copyrights">© 2018 Escapar.me. </div>
        </div>
    </div>
@endsection