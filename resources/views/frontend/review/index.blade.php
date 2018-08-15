@extends('frontend.layouts.frontend')
      @section('keywords') {{ $oReview['keywords'] }} @endsection
      @section('description') {{ strip_tags($oReview['description']) }} @endsection
      @section('og-facebook')
          <meta property="og:url" content="{{ route('reviews.show', $oReview['revi_id']) }}" />
          <meta property="og:type" content="article" />
          <meta property="og:title" content="Escapar.me || {{ $oReview['name'] }}" />
          <meta property="og:description" content="{{ strip_tags($oReview['description']) }}" />
          @if($cImages)
              <meta property="og:image" content="{{ $cImages[0]['source'] ? url($cImages[0]['source']) : ' ' }}" />
          @else
              <meta property="og:image" content="{{ url('public/frontend/images/listing-item-01.jpg') ? url('public/frontend/images/listing-item-01.jpg') : ' ' }}" />
          @endif
      @endsection

  @section('content')
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
      <div class="container">
          <div class="row sticky-wrapper">
              <div class="col-lg-8 col-md-8 padding-right-30">
                  <div id="titlebar" class="listing-titlebar">
                      <div class="listing-titlebar-title">
                          <h2>
                              {{ $oReview['name'] }}
                          </h2>
                          <span>
                              <a href="#listing-location" class="listing-address">
                                  <i class="fa fa-map-marker"></i>
                                     {{ $oReview->place->name }}
                              </a>
                          </span>
                          <div class="star-rating" data-rating="{{ $oReview['valoration'] }}">
                              <div class="rating-counter"><a href="#listing-reviews"> {{ $oReview['calification'] }} </a></div>
                          </div>
                      </div>
                  </div>
                  <div id="listing-overview" class="listing-section">
                      <h3 class="listing-desc-headline">Acerca de este lugar</h3>
                      {!! $oReview['description'] !!}
                      <h3 class="listing-desc-headline">Que vas a encontrar</h3> <!-- tags de lifestyle -->
                      <ul class="listing-features checkboxes margin-top-0">
                          @foreach($oReview->reviewLifestyles as $reviewLifestyle)
                              @if($reviewLifestyle->lifestyle)
                                  <li>{{ $reviewLifestyle->lifestyle->name }}</li>
                              @endif
                          @endforeach
                      </ul>
                  </div>
                  <div id="listing-location" class="listing-section">
                      <h3 class="listing-desc-headline margin-top-60 margin-bottom-30">En el Mapa</h3>
                      <div id="singleListingMap-container">
                          <div id="singleListingMap" data-latitude="{{ $oReview['latitud'] }}" data-longitude="{{ $oReview['longitud'] }}" data-map-icon="im im-icon-Hamburger"></div>
                          <a href="#" id="streetView">Street View</a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-4 margin-top-75 sticky">
                  <a href="https://wa.me?text=Mirá%20que%20buen%20lugar%20para%20ir.{{ $oReview['name'] }} en {{ $oReview->place->name }}. link : {{ route('reviews.show', $oReview['revi_id']) }}" target="_blank">
                      <div class="verified-badge with-tip" data-tip-content="Compartí {{ $oReview['name'] }} en {{ $oReview->place->name }} con tus amigos ">
                          <i class="sl sl-icon-check"></i> Compartí {{ $oReview['name'] }} por WhatsApp
                      </div>
                  </a>
                  <div class="boxed-widget margin-top-35">
                      <div class="hosted-by-title">
                          <h4><span>Review por</span> <a href="javascript:void(0)">Escapar.me</a></h4>
                          <a href="" class="hosted-by-avatar"><img src="{{ asset('https://scontent.faep9-1.fna.fbcdn.net/v/t1.0-1/33922807_1741767322585949_2444569550931361792_n.png?_nc_cat=0&oh=8a6fb661f29569e5121da9f59f795b1b&oe=5BAF69AD') }}" alt=""></a>
                      </div>
                      <ul class="listing-details-sidebar">
                          <li><i class="fa fa-envelope-o"></i> <a href="#">hello@escapar.me</a></li>
                      </ul>
                      <ul class="listing-details-sidebar social-profiles">
                          <li><a href="https://www.facebook.com/Escaparme-1726887357407279/" target="_blank" class="facebook-profile"><i class="fa fa-facebook-square"></i>Escapar.me en Facebook</a></li>
                      </ul>
                  </div>
                  <div class="listing-share margin-top-40 margin-bottom-40 no-border">
                      <button
                         class="like-button like-event"
                         data-slug="{{$oReview['slug']}}">
                         <span class="like-icon"></span>¿Te gustó este lugar?
                      </button>
                      <div
                          class="fb-like like-button"
                          data-href="https://www.escapar.me/{{$oReview['slug']}}"
                          data-layout="button"
                          data-action="like"
                          data-size="large"
                          data-show-faces="false"
                          data-share="false">
                        </div>
                      <span id="txtSlug">150 han dicho que sí.</span>

                      <ul class="share-buttons margin-top-40 margin-bottom-0">
                          <!--<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Compartilo</a></li>-->
                          <li>

                            <a
                            class="fb-share"
                            href="https://www.facebook.com/sharer/sharer.php?app_id=405738903253856&sdk=joey&u=http://www.escapar.me/reviews/{{$oReview['slug']}}/&display=popup&ref=plugin&src=share_button"
                            onclick="return !window.open(this.href, 'Facebook', 'width=640,height=580')">
                              <i class="fa fa-facebook"></i> Compartilo</a>
                          </li>


                          <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li>
                      </ul>
                      <div class="clearfix"></div>
                  </div>
              </div>
          </div>
      </div>
      @include('frontend.layouts.partials.footer')
  @endsection
  @section('js')
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en&key=AIzaSyDiL0uDFIerL68MTsdfkCNpZ-JhTQQa6sI"></script>
      <script type="text/javascript" src="{{ asset('frontend/scripts/infobox.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('frontend/scripts/markerclusterer.js') }}"></script>
      <script type="text/javascript" src="{{ asset('frontend/scripts/maps.js') }}"></script>
      <link href="{{ asset('frontend/css/plugins/datedropper.css') }}" rel="stylesheet" type="text/css">
      <script src="{{ asset('frontend/scripts/datedropper.js') }}"></script>
      <script>$('#booking-date').dateDropper();</script>
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
      <script src="{{ asset('frontend/scripts/quantityButtons.js') }}"></script>
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
         FB.init({
           appId            : '826147477774719',
           autoLogAppEvents : true,
           xfbml            : true,
           version          : 'v2.10'
         });
         FB.AppEvents.logPageView();
        };
        (function(d, s, id){
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) {return;}
          js = d.createElement(s); js.id = id;
          js.src = "https://connect.facebook.net/es_LA/sdk.js";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        const like = $('.like-event');
        var accessToken;
        like.on('click', () => {
          var slug = $(this).data('slug')
          FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
              accessToken = response.authResponse.accessToken;
              console.log(accessToken);
              FB.api(
                  "/me/og.likes",
                  "POST",
                  {
                      "object": {
                        "fb:app_id": "826147477774719",
                        "og:type": "object",
                        "og:url": "http://escapar.me/reviews/"+slug,
                        "og:title": "Escapar.me || {{ $oReview['name'] }}",
                        "og:image": "{{ $cImages[0]['source'] ? url($cImages[0]['source']) : ' ' }}",
                      }
                  },
                  function (response) {
                      console.log('response', response);
                      console.log('error',response.error);
                  }
              );
            }
          });
        })
      </script>
  @endsection
