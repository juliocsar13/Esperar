@extends('frontend.layouts.frontend')
@section('content')
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Escapar.me</h2><span>Tenemos estas alternativas para vos. </span>
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Escapar.me a </a></li>
						<li><a href="buscador">Lista de Escapadas</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-3 col-md-4 hidden-xs hidde-sm padding-right-30">
			<div class="sidebar">
				<div class="widget margin-bottom-40">
					<h3 class="margin-top-0 margin-bottom-30">Review Actual</h3>
					<ul class="listing-details-sidebar" id="previewId">
					</ul>
				</div>
				<div class="widget margin-bottom-40">
					<h3 class="margin-top-0 margin-bottom-30">Mejora tu reviews</h3>
						<div class="checkboxes one-in-row margin-bottom-15">
							<h4>Ubicaciones</h4>
							@foreach(App\Place::$country as $i => $country)
							<li >
								<input
									id="check-country-{{strtolower($i)}}"
									value="{{$i}}"
									class="check_country"
									type="checkbox"
									name="contry[1][]"/>
								<label id="lb-country-{{strtolower($i)}}" for="check-country-{{strtolower($i)}}">{{ $country }} </label>
							</li>
							@endforeach
						</div>
						<div class="checkboxes one-in-row margin-bottom-15 margin-top-35">
							<h4>Lugares</h4>
							@foreach($cPlaces as $i => $place)
							<li>
								<input
								id="check-place-{{$place['plac_id']}}"
								type="checkbox"
								name="contry[2][]"
								class="check_place"
								value="{{$place['plac_id']}}"/>
								<label id="lb-place-{{$place['plac_id']}}" for="check-place-{{$place['plac_id']}}"> {{ $place['name'] }} </label>
							</li>
							@endforeach
						</div>
						<div class="checkboxes one-in-row margin-bottom-15 margin-top-35">
							<h4>LifeStyle</h4>
							@foreach($cLifestyles as $i => $lifestyle)
							<li>
								<input
								id="check-life-{{$lifestyle['name']}}"
								type="checkbox"

								name="contry[3][]"
								class="check_life"
								value="{{$lifestyle['life_id']}}"/>
								<label id="lb-lifestyle-{{$lifestyle['life_id']}}" for="check-life-{{$lifestyle['name']}}">{{ $lifestyle['name'] }}</label>
							</li>
							@endforeach
						</div>
				</div>
			</div>
		</div>
		<div class="col-lg-9 col-md-8 ">
			<div class="row">
				<div  id="filterId">
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<div class="pagination-container margin-top-20 margin-bottom-40">
						<nav class="pagination">
							No hay mas resultados para esta busqueda.
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('frontend.layouts.partials.footer')
@endsection
@section('js')
	<script type="text/javascript" src="{{ asset('frontend/scripts/main.js') }}"></script>
@endsection
