@extends('frontend.layouts.frontend') 

@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Lpm! Algo salió mal.</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="/">Home</a></li>
						<li>Volver atrás</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->


<!-- Container -->
<div class="container">

	<div class="row">
		<div class="col-md-12">

			<section id="not-found" class="center">
				<h2>404 <i class="fa fa-question-circle"></i></h2>
				<p>Perdón pa! Seguro que ésta página no está más o la volamos.</p>

			


			</section>

		</div>
	</div>

</div>
<!-- Container / End -->

@include('frontend.layouts.partials.footer')

@endsection