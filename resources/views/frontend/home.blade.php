@extends('frontend.layouts.frontend')
@section('content')
    <div class="main-search-container" data-background-image="{{ asset('frontend/images/main-search-background-01.jpg') }}">
        <div class="main-search-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="color: white" class="shadow">PARQUE NACIONAL DE LAS AVES </h2>
                        <h4 style="color: white" class=" shadow" >Visitamos este lugar increíble en Foz Do Iguazu.</h4>
                        <form action="{{ route('reviews.list') }}">
                            <div class="main-search-input">
                                <div class="main-search-input-item">
                                    <select data-placeholder="Lifestyle" class="chosen-select" name="lifestyle"  id="home-life-id">
                                        <option value>Tipo de escapada</option>
                                        @foreach($cLifestyles as $lifestyle):
                                            <option
                                                data-life="{{$lifestyle['name']}}"
                                                value="{{ $lifestyle['life_id'] }}">{{ $lifestyle['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="main-search-input-item">
                                    <select data-placeholder="Estilo" class="chosen-select" name="place" id="home-place-id" >
                                        <option value>Selecciona un lugar</option>
                                        @foreach($cPlaces as $place):
                                            @if($place['state'] == 'Ocultar')
                                              <option
                                                  data-country-id="{{ $place['country'] }}"
                                                  data-country="{{ App\Place::$country[$place['country']] }}"
                                                  data-place="{{ $place['name'] }}"
                                                  value="{{ $place['plac_id'] }}">{{ $place['name'] . ', ' . $place['province'] . ', ' . App\Place::$country[$place['country']] }}
                                              </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="country" id="id_country_hidden" value="">
                                <button class="button" id="searchHome">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="fullwidth padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-45">
                        Ultimas Escapadas Cargadas.
                        <span>Por ahi, alguna te pinta</span>
                    </h3>
                </div>
                <div class="col-md-12">
                    <div class="simple-slick-carousel dots-nav">
                    @foreach($cReviews as $review)
                        @if($review['state'] == "Ocultar")
                        <div class="carousel-item">
                            <a href="{{ route('reviews.show', $review->slug) }}" class="listing-item-container">
                                <div class="listing-item">
                                    @if($review->images->first())
                                        <img src="{{ asset($review->images->first()->source) }}" alt="">
                                    @else
                                        <img src="javascript:void(0)" alt="">
                                    @endif
                                    <div class="listing-item-content">
                                        <span data-id="{{$review->revi_id}}" class="tag">{{ $review->category->name }}</span><!-- categoria -->
                                        <h3>{{ $review['name'] }} </h3>
                                        <span>{{ $review->place->name }}</span><!-- Localidad -->
                                    </div>
                                </div>
                                <div class="star-rating" data-rating="{{ $review['valoration'] }}">
                                    <div class="rating-counter"> {{ $review['calification'] }}</div>
                                </div>
                            </a>
                        </div>
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="parallax"
        data-background="{{ asset('frontend/images/slider-bg-02.jpg') }}"
        data-color="#36383e"
        data-color-opacity="0.6"
        data-img-width="800"
        data-img-height="505">
        <div class="text-content white-font">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-8">
                        <h2>Hay un Ford para Cada Camino.</h2>
                        <p>Hay nuevas historias. Hay nuevos caminos. Escapate. </p>
                        <a href="javascript:void(0)" class="button margin-top-25">Ver Escapadas Ford</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="headline centered margin-top-75">
                    Lugares
                    <span>Seguro que alguno te sorprenderá.</span>
                </h3>
            </div>
        </div>
    </div>
    <div class="fullwidth-carousel-container margin-top-25 padding-bottom-70">
        <div class="fullwidth-slick-carousel category-carousel">
            @foreach($cPlaces as $place)
                @if($place['state'] == "Ocultar")
                <div class="fw-carousel-item">
                    <div class="category-box-container">
                        <a href="{{ route('lugares.show', $place->slug) }}" class="category-box" data-background-image="{{ asset($place->images->first() ? $place->images->first()->source : '') }}">
                            <div class="listing-item-details">
                                <span class="tag">{{ $place['province'] }}</span>
                            </div>
                            <div class="category-box-content">
                                <h3>{{ $place['name'] }}</h3>
                            </div>
                        </a>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
    @include('frontend.layouts.partials.footer')
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('frontend/scripts/search.js') }}"></script>
@endsection
