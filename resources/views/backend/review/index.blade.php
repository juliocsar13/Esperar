@extends('backend.layouts.backend')
@section('content')
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Reviews Creadas</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dash</a></li>
                        <li>Reviews</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4>Lista de Reviews Creadas</h4>
                <ul>
                    @foreach($cReviews as $key => $review)
                        <li>
                            <div class="list-box-listing">
                                <div class="list-box-listing-img">
                                    <a href="#">
                                        @if($review['image_first']):
                                            <img width="150" src="{{asset($review['image_first'])}}" alt="">
                                        @else
                                            <img src="{{ asset('backend/images/listing-item-02.jpg') }}" alt="">
                                        @endif
                                    </a>
                                </div><!-- Traer primera foto de las 10 que se cargan en la galeria -->
                                <div class="list-box-listing-content">
                                    <div class="inner">
                                        <h3>{{ $review['name'] }}</h3><!-- Nombre del Lugar -->
                                        <span>direccion</span><!-- Traer Provicina y Pais -->
                                        <div class="star-rating" data-rating="{{ $review['valoration'] }}"><!-- Puntate del Lugar -->
                                            <div class="rating-counter"> {{ $review['calification'] }}</div><!-- Calificacion en palabra -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons-to-right">

                                <a data-id={{ $review['revi_id'] }}  class=" btn-remove-review btn-remove-review button gray"><i class="sl sl-icon-close"></i> Borrar</a>
                                <a href="{{ route('review.edit', $review['revi_id']) }}" class="button gray"><i class="sl sl-icon-close"></i> Editar</a>
                                <a data-hidden-id="{{ $review['revi_id'] }}" class="button gray btnHidden" ><i class="sl sl-icon-close"></i>{{$review['state']}}</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <div class="copyrights">© 2018 Escapar.me. </div>
        </div>
    </div>
@endsection
