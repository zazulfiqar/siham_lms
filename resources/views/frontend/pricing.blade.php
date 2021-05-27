<!DOCTYPE html>
<html lang="zxx">
@include('frontend.layout.head')

  <body class="innerpages body_bg">
    <!-- Header Start -->
    @include('frontend.layout.header');
    <!-- Header End -->

<!-- innerBanner start -->
		<div class="innerBanner">
                @if($price_header_image == null)
                <img src="{{asset('images/Bannar-5.jpg')}}" class="img-responsive" alt="courses-Banner">
            @endif
            @if($price_header_image != null)
                
                <img src="{{url('/siham_lms/storage/app/public/'.$price_header_image	)}}"  class="img-responsive" alt="courses-Banner">

            @endif

			<div class="innerBannerOverlay">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 centerCol">
						<h1>Pricing</h1>
					</div>
				</div>
			</div>
		</div>
<!-- innerBanner end -->

   <div class="clear"></div>

  <!-- Pricing-section -->
    <div class="Pricing_section Pricing_page">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-sm-10 col-xs-12 center">
            <div class="startLearning_head">
              <h2 data-aos="fade-down">Pricing</h2>
              <p data-aos="fade-down">Get access to specialized video training that teaches practical skills for improving your career and life, every month. Weekly content updates from multiple world's best experts.</p>
            </div>
          </div>
        </div>
        <div class="row">
            @foreach($pricing as $price)
            <div class="col-md-4 col-sm-4 col-xs-12" data-aos="flip-left">
                <div class="Pricing_Box">
                    <h3>{{$price->course_duration}}</h3>
                    <span>{{$price->price}}</span>
                    <p>{{$price->description}}</p>
                    <hr>
                    <ul>
                        @if($price->feature_one)
                        <li>{{$price->feature_one}}</li>
                        @else
                        @endif
                        @if($price->feature_two)
                        <li>{{$price->feature_two}}</li>
                        @else
                        @endif
                        @if($price->feature_three)
                        <li>{{$price->feature_three}}</li>
                        @else
                        @endif
                        @if($price->feature_four)
                        <li>{{$price->feature_four}}</li>
                        @else
                        @endif
                        @if($price->feature_five)
                        <li>{{$price->feature_five}}</li>
                        @else
                        @endif

                    </ul>
                </div>
                <div class="Pricing_Box2">
                <a href="{{route('register')}}" class="btn_pink">Join Us</a>
                </div>
            </div>


          @endforeach
        </div>
      </div>
    </div>
    <!-- Pricing-section -->

@include('frontend.layout.footer')
    <!-- Js Files Start -->
    <script src="{{asset('js/allmix.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
  </body>
</html>
