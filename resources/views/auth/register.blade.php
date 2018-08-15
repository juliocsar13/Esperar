<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>Admin Escapar.me</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/colors/main.css') }}" id="colors">

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">


<!-- Content
================================================== -->

<!-- Coming Soon Page -->
<div class="coming-soon-page" style="background-image: url({{ asset('backend/images/main-search-background-01.jpg') }})">
	<div class="container">
		<!-- Search -->
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
                <form action="{{ route('admin.register.submit') }}" method="POST">
                    {{ csrf_field() }}
                    <h3>REGISTRARSE</h3>
                    
                    
                    <br>

                    <div class="main-search-input gray-style margin-top-30 margin-bottom-10">
                        <div class="main-search-input-item">
                            <input type="text" placeholder="Nombres" name="names" value="{{ old('names') }}" />
                            @if ($errors->has('names'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('names') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                    </div>

                    <div class="main-search-input gray-style margin-top-30 margin-bottom-10">
                        <div class="main-search-input-item">
                            <input type="text" placeholder="Apellidos" name="lastnames" value="{{ old('lastnames') }}" />
                            @if ($errors->has('lastnames'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastnames') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                    </div>

                    <div class="main-search-input gray-style margin-top-30 margin-bottom-10">
                        <div class="main-search-input-item">
                            <input type="text" placeholder="Email" name="email" value="{{ old('email') }}" />
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <div class="main-search-input gray-style margin-top-30 margin-bottom-10">
                        <div class="main-search-input-item">
                            <input type="password" placeholder="Password" name="password" value=""/>
                        </div>
                    </div>
                    
                    <div class="main-search-input gray-style margin-top-30 margin-bottom-10">
                        <div class="main-search-input-item">
                            <input type="password" placeholder="Confirmar Password" name="password_confirmation"/>
                        </div>
                        <button class="button">Ingresar</button>
                    </div>
                </form>
			</div>
		</div>
		<!-- Search Section / End -->
	</div>
</div>
<!-- Coming Soon Page / End -->

</div>
<!-- Wrapper / End -->



<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{ asset('backend/scripts/jquery-2.2.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/mmenu.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/chosen.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/rangeslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/tooltips.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/custom.js') }}"></script>

<!-- Countdown Script -->
<script type="text/javascript" src="{{ asset('backend/scripts/jquery.countdown.min.js') }}"></script>
<script type="text/javascript">
	$("#countdown")
		.countdown('2019/12/12', function(event) {
			var $this = $(this).html(event.strftime(''
			+ '<div><span>%D</span>  <i>Days</i></div>'
			+ '<div><span>%H</span> <i>Hours</i></div> '
			+ '<div><span>%M</span> <i>Minutes</i></div> '
			+ '<div><span>%S</span> <i>Seconds</i></div>'
		));
	});
</script>


</body>
</html>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
