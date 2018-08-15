<!-- Navigation
        ================================================== -->

        <!-- Responsive Navigation Trigger -->
        <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dash</a>

        <div class="dashboard-nav">
            <div class="dashboard-nav-inner">

                <ul data-submenu-title="Main">
                    <li class="active"><a href="{{ route('admin.dashboard') }}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                    <li><a href="{{ route('review.index') }}"><i class="sl sl-icon-envelope-open"></i> Reviews <span class="nav-tag messages">{{ App\Review::getCountAllReview() }}</span></a></li>
                    <li><a href="{{ route('lugar.index') }}"><i class="fa fa-calendar-check-o"></i> Places <span class="nav-tag messages">{{ App\Place::getCountAllPlace() }}</span></a></li>
                </ul>
                
                <ul data-submenu-title="Creador de:">
                    
                    <li><a href="{{ route('categoria.index') }}"><i class="sl sl-icon-star"></i> Categorias</a></li>
                    <li><a href="{{ route('lifestyle.index') }}"><i class="sl sl-icon-heart"></i> Lifestyles</a></li>
                    <li><a href="{{ route('lugar.create') }}"><i class="sl sl-icon-plus"></i> Lugares</a></li>
                    <li><a href="{{ route('review.create') }}"><i class="sl sl-icon-plus"></i> Review</a></li>
                </ul>	

                
                
            </div>
        </div>
        <!-- Navigation / End -->