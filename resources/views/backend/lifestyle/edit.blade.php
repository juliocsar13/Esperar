@extends('backend.layouts.backend') 

@section('content')

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Edita un Lifestyle</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dash</a></li>
                        <li>Editar un Lifestyle</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            @include('backend.layouts.partials.alerts.status')

            <div id="add-listing">

                <!-- Section -->
                <div class="add-listing-section">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-doc"></i> Edita un Lifestyle</h3>
                    </div>
                    <form action="{{ route('lifestyle.update', $oLifestyle['life_id']) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <!-- Title -->
                        <div class="row with-forms">
                            <div class="col-md-6">
                                <h5>Nombre de <i class="tip" data-tip-content="Ejemplo: Restaurante, Parrillas, Hospedajes..."></i></h5>
                                <input class="search-field" type="text" name="name" placeholder="Nombre del lifestyle" value="{{ $oLifestyle['name'] }}" required />
                            </div>
                        </div>

                        <button class="button preview">Actualizar <i class="fa fa-arrow-circle-right"></i></button>
                        <!-- Cuando crea y guarda, la pagina debe volver a la donde esta. Es decir, que si crea una categoria, sigue estando en la misma pagina. En lo posible, hacer que no cargue nuevamente la pagina, sino que sea un proceso. -->
                    </form>

                </div>
                <!-- Section / End -->

                
            </div>

            
        </div>

        <!-- Copyrights -->
        <div class="col-md-12">
            <div class="copyrights">© 2018 Escapar.me. </div>
        </div>

    </div>

@endsection