<!DOCTYPE html>
<html lang="zxx">
@include('frontend.layout.head')

<body class="innerpages body_bg">
    <!-- Header Start -->
    @include('frontend.layout.header');
    <!-- Header End -->

<!-- innerBanner start -->
		<div class="innerBanner">

{{--            {{dd($testimonial_header_image)}}--}}

            @if($testimonial_header_image == null)
                <img src="{{asset('images/Bannar-3.jpg')}}" class="img-responsive" alt="courses-Banner">
            @endif
            @if($testimonial_header_image != null)
                <img src="{{url('/siham_lms/storage/app/public/'.$testimonial_header_image	)}}"  class="img-responsive" alt="courses-Banner">
            @endif

			<div class="innerBannerOverlay">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 centerCol">
						<h1>Testimonials</h1>
					</div>
				</div>
			</div>
		</div>
<!-- innerBanner end -->

   <div class="clear"></div>

  <!-- Saying-section -->
    <div class="Saying_section padding_both">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-sm-10 col-xs-12 center">
            <div class="startLearning_head">
              <h2 data-aos="fade-down">What Student Are Saying </h2>
            </div>
          </div>
        </div>
        <div class="row">

            @foreach($testimonials as  $testimonial)
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="Saying_box">
                <img src="{{url('/siham_lms/storage/app/public/'.$testimonial->image)}}">
              <h4>{{$testimonial->name}}</h4>
              {{-- <span>Writing</span> --}}
              <p>{{$testimonial->description}}</p>
            </div>
          </div>
          @endforeach

      </div>
    </div>
    <!-- Saying-section -->



    <!--Footer Content Start-->
    @include('frontend.layout.footer')
    <!-- Js Files Start -->
    <script src="{{asset('js/allmix.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
  </body>
</html>
