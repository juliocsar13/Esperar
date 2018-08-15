@extends('frontend.layouts.frontend')

@section('keywords') {{ $oPlace['keywords'] }} @endsection

@section('description') {{ strip_tags($oPlace['description']) }} @endsection

@section('og-facebook')

        <meta property="og:url" content="{{ route('lugares.show', $oPlace['plac_id']) }}" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Escapar.me > {{ $oPlace['name'] }}" />
        <meta property="og:description" content="{{ strip_tags($oPlace['description']) }}" />
        @if($cImages)
            <meta property="og:image" content="{{ $cImages[0]['source'] ? url($cImages[0]['source']) : ' ' }}" />
        @else
            <meta property="og:image" content="{{ url('public/frontend/images/listing-item-01.jpg') ? url('public/frontend/images/listing-item-01.jpg') : ' ' }}" />

        @endif
@endsection

@section('content')

    <!-- Slider
================================================== -->
    <div class="listing-slider mfp-gallery-container margin-bottom-0">

        @if($cImages)
            @foreach($cImages as $key => $image)
                <a href="{{ asset($image['source']) }}" data-background-image="{{ asset($image['source']) }}" class="item mfp-gallery"></a>
            @endforeach
        @else
            <a href="{{ asset('frontend/images/listing-item-01.jpg') }}" data-background-image="{{ asset('frontend/images/listing-item-01.jpg') }}" class="item mfp-gallery"></a>
            <a href="{{ asset('frontend/images/listing-item-01.jpg') }}" data-background-image="{{ asset('frontend/images/listing-item-01.jpg') }}" class="item mfp-gallery"></a>
            <a href="{{ asset('frontend/images/listing-item-01.jpg') }}" data-background-image="{{ asset('frontend/images/listing-item-01.jpg') }}" class="item mfp-gallery"></a>
        @endif
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row sticky-wrapper">
            <div class="col-lg-8 col-md-8 padding-right-30">

                <!-- Titlebar -->
                <div id="titlebar" class="listing-titlebar">
                    <div class="listing-titlebar-title">
                        <h2>
                            {{ $oPlace['name'] }}
                            <!-- <span class="listing-tag">Pueblos del Interior</span> tag de lifestyle -->
                        </h2>
                        <span>
                            <a href="#listing-location" class="listing-address">
                                <i class="fa fa-map-marker"></i>
                                    {{ $oPlace['name'] }}, {{ $oPlace['province'] }}, {{ App\Place::$country[$oPlace['country']] }}
                                <!-- Lugar, provincia, y pais -->
                            </a>
                        </span>
                        <div class="star-rating" data-rating="{{ $oPlace['valoration'] }}">
                            <div class="rating-counter"><a href="#listing-reviews"> {{ $oPlace['calification'] }} </a></div><!-- calificacion de una palabra que hare desde el back -->
                        </div>
                    </div>
                </div>

                <!-- Listing Nav
                <div id="listing-nav" class="listing-nav-container">
                    <ul class="listing-nav">
                        <li><a href="#listing-overview" class="active">Overview</a></li>
                        <li><a href="#listing-pricing-list">Pricing</a></li>
                        <li><a href="#listing-location">Location</a></li>
                        <li><a href="#listing-reviews">Reviews</a></li>
                        <li><a href="#add-review">Add Review</a></li>
                    </ul>
                </div>-->

                <!-- Overview -->
                <div id="listing-overview" class="listing-section">

                    <!-- Description -->
                    <h3 class="listing-desc-headline">Acerca de este lugar</h3>
                    {!! $oPlace['description'] !!}



                    <!-- Amenities -->
                    <h3 class="listing-desc-headline">Que vas a encontrar</h3> <!-- tags de lifestyle -->
                    <ul class="listing-features checkboxes margin-top-0">
                        @foreach($oPlace->placeLifestyles as $placeLifestyle)
                            <li>{{ $placeLifestyle->lifestyle->name }}</li>
                        @endforeach
                    </ul>
                </div>





                <!-- Location -->
                <div id="listing-location" class="listing-section">
                    <h3 class="listing-desc-headline margin-top-60 margin-bottom-30">En el Mapa</h3>

                    <div id="singleListingMap-container">
                        <div id="singleListingMap" data-latitude="{{ $oPlace['latitud'] }}" data-longitude="{{ $oPlace['longitud'] }}" data-map-icon="im im-icon-Hamburger"></div>
                        <a href="#" id="streetView">Street View</a>
                    </div>
                </div>







            </div>


            <!-- Sidebar
            ================================================== -->
            <div class="col-lg-4 col-md-4 margin-top-75 sticky">


                <!-- Verified Badge -->
                <div class="verified-badge with-tip" data-tip-content="Compartí {{ $oPlace['name'] }} con tus amigos.">
                    <i class="sl sl-icon-check"></i> Compartir por WhatsApp
                </div>






                <div class="boxed-widget margin-top-35">
                    <div class="hosted-by-title">
                        <h4><span>Review por</span> <a href="javascript:void(0)">Escapar.me</a></h4>
                        <a href="" class="hosted-by-avatar"><img src="{{ asset('https://scontent.faep9-1.fna.fbcdn.net/v/t1.0-1/33922807_1741767322585949_2444569550931361792_n.png?_nc_cat=0&oh=8a6fb661f29569e5121da9f59f795b1b&oe=5BAF69AD') }}" alt=""></a>
                    </div>
                    <ul class="listing-details-sidebar">
                        <!--<li><i class="sl sl-icon-phone"></i> </li>
                         <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> -->
                        <li><i class="fa fa-envelope-o"></i> <a href="#">hello@escapar.me</a></li>
                    </ul>

                    <ul class="listing-details-sidebar social-profiles">
                        <li><a href="https://www.facebook.com/Escaparme-1726887357407279/" target="_blank" class="facebook-profile"><i class="fa fa-facebook-square"></i>Escapar.me en Facebook</a></li>

                    </ul>




                </div>
                <!-- Contact / End-->


                <!-- Share / Like -->
                <div class="listing-share margin-top-40 margin-bottom-40 no-border">
                    <!--<button class="like-button" onclick="postLike();"> <span class="like-icon"></span>¿Te gustó este lugar?</button>-->
                    <div class="fb-like"
                      style="width:220px"
                      data-href="http://www.escapar.me/lugares/{{$oPlace['slug']}}"
                      data-layout="button"
                      data-action="like"
                      data-size="large" data-show-faces="false" data-share="false"></div>
                      <span>{{$cLikes}} han dicho que sí.</span>

                        <!-- Share Buttons -->
                        <ul class="share-buttons margin-top-40 margin-bottom-0">
                            <!--<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Compartilo</a></li>-->
                            <li>

                          <a
                          class="fb-share"
                          href="https://www.facebook.com/sharer/sharer.php?app_id=405738903253856&sdk=joey&u=http://www.escapar.me/lugares/{{$oPlace['slug']}}/&display=popup&ref=plugin&src=share_button"
                          onclick="return !window.open(this.href, 'Facebook', 'width=640,height=580')">
                            <i class="fa fa-facebook"></i> Compartilo</a>
                        </li>
                            <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li>
                        </ul>
                        <div class="clearfix"></div>
                </div>

            </div>
            <!-- Sidebar / End -->

        </div>
    </div>


    @include('frontend.layouts.partials.footer')

@endsection

@section('js')

    <!-- Maps -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en&key=AIzaSyDiL0uDFIerL68MTsdfkCNpZ-JhTQQa6sI"></script>
<script type="text/javascript" src="{{ asset('frontend/scripts/infobox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/scripts/markerclusterer.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/scripts/maps.js') }}"></script>


<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
<link href="{{ asset('frontend/css/plugins/datedropper.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('frontend/scripts/datedropper.js') }}"></script>
<script>$('#booking-date').dateDropper();</script>

<!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
<script src="{{ asset('frontend/scripts/timedropper.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/plugins/timedropper.css') }}">
<script>
this.$('#booking-time').timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#f91942",
	borderColor: "#f91942",
	minutesInterval: '15'
});

var $clocks = $('.td-input');
	_.each($clocks, function(clock){
	clock.value = null;
});
</script>

<!-- Booking Widget - Quantity Buttons -->
<script src="{{ asset('frontend/scripts/quantityButtons.js') }}"></script>
<script>
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=405738903253856&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
    </script>
    <script>
      var objectToLike = "http://www.escapar.me/lugares/{{$oPlace['slug']}}"
      window.fbAsyncInit = function() {
        FB.init({
          autoLogAppEvents : true,
          appId      : "405738903253856", // App ID
          status     : true,    // check login status
          //cookie     : true,    // enable cookies to allow the // server to access the session
          xfbml      : true,     // parse page for xfbml or html5 // social plugins like login button below
          version     : 'v2.7',  // Specify an API version
        });
      };
      (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "https://connect.facebook.net/es_LA/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));

      function postLike() {
        FB.api(
           'https://graph.facebook.com/me/og.likes',
           'post',
           { object: objectToLike,
             privacy: {'value': 'SELF'} },
           function(response) {
             if (!response) {
               alert('Error occurred.');
             } else if (response.error) {
               document.getElementById('result').innerHTML =
                 'Error: ' + response.error.message;
             } else {
               document.getElementById('result').innerHTML =
                 '<a href=\"https://www.facebook.com/me/activity/' +
                 response.id + '\">' +
                 'Story created.  ID is ' +
                 response.id + '</a>';
             }
           }
        );
      }
    </script>
@endsection
