@extends('backend.layouts.backend')

@section('content')
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Lugares Escapar.me</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dash</a></li>
                        <li>Lugares</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4>Lista de Lugares Creados<br><small>Los lugares creados, son aquellos donde las reviews deberan ser asigandas, es decir, que sin un lugar creado, una review no puede ser guardada.</small></h4>
                <ul>
                  @if($cPlaces)
                    @foreach($cPlaces as $place)
                        <li>
                            <div class="list-box-listing">
                                <div class="list-box-listing-img"><a href="#"><img src="{{ asset('backend/images/listing-item-02.jpg') }}" alt=""></a></div><!-- Traer primera foto de las 10 que se cargan en la galeria -->
                                <div class="list-box-listing-content">
                                    <div class="inner">
                                        <h3>{{ $place['name'] }}</h3><!-- Nombre del Lugar -->
                                        <span>{{ $place['province'] . ', ' . App\Place::$country[$place['country']] }}</span><!-- Traer Provicina y Pais -->
                                        <div class="star-rating" data-rating="{{ $place['valoration'] }}"><!-- Puntate del Lugar -->
                                            <div class="rating-counter"> {{ $place['calification'] }}</div><!-- Calificacion en palabra -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons-to-right" style="display: flex">
                                <a data-id={{ $place['plac_id'] }} class="btn-remove-place button gray"><i class="sl sl-icon-close"></i> Borrar</a>
                                <a href="{{ route('lugar.edit', $place['plac_id']) }}" class="button gray"><i class="sl sl-icon-close"></i> Editar</a><!-- Editar el contenido -->
                                <a data-hidden-id="{{ $place['plac_id'] }}" class="button gray btnHidden-lugar" ><i class="sl sl-icon-close"></i>{{$place['state']}}</a>

                            </div>
                        </li>
                    @endforeach
                  @endif
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <div class="copyrights">© 2018 Escapar.me. </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.frm-delete-place').on('submit', function (e) {
            e.preventDefault();
            let $this = $(this);

            if(confirm("¿Estas seguro de eliminar el lugar?"))
            {
                $this.unbind('submit').submit();
            }
        });
    </script>
@endsection
