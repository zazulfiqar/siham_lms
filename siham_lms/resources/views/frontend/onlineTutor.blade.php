<!DOCTYPE html>
<html lang="zxx">
@include('frontend.layout.head')

<body class="body_bg">
<!-- Header Start -->

<!-- Header End -->
  <body class="innerpages body_bg">
    <!-- Header Start -->
    @include('frontend.layout.header');
    <!-- Header End -->

<!-- innerBanner start -->
		<div class="innerBanner">
			<img src="images/Bannar-3.jpg" class="img-responsive" alt="courses-Banner">
			<div class="innerBannerOverlay">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 centerCol">
						<h1>online tutor</h1>
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
              <h2 data-aos="fade-down">Find online tutor</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="tutor_box">
              <div class="tutor_boxImg"><img src="{{ asset('images/teacher_img1.jpg') }}" alt="img"></div>
              <div class="tutor_boxText">
                <h4>E. A. Siblu</h4>
                <span>Writing</span>
                <p>These Classes are thing important keys to unloking our written creativity. If you have beliefe, freedom and discipline, then who knows what the future will hold</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="tutor_box">
              <div class="tutor_boxImg"><img src="{{ asset('images/teacher_img2.jpg') }}" alt="img"></div>
              <div class="tutor_boxText">
                <h4>E. A. Siblu</h4>
                <span>Writing</span>
                <p>These Classes are thing important keys to unloking our written creativity. If you have beliefe, freedom and discipline, then who knows what the future will hold</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="tutor_box">
              <div class="tutor_boxImg"><img src="{{ asset('images/teacher_img1.jpg') }}" alt="img"></div>
              <div class="tutor_boxText">
                <h4>E. A. Siblu</h4>
                <span>Writing</span>
                <p>These Classes are thing important keys to unloking our written creativity. If you have beliefe, freedom and discipline, then who knows what the future will hold</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="tutor_box">
              <div class="tutor_boxImg"><img src="{{ asset('images/teacher_img2.jpg') }}" alt="img"></div>
              <div class="tutor_boxText">
                <h4>E. A. Siblu</h4>
                <span>Writing</span>
                <p>These Classes are thing important keys to unloking our written creativity. If you have beliefe, freedom and discipline, then who knows what the future will hold</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="tutor_box">
              <div class="tutor_boxImg"><img src="{{ asset('images/teacher_img1.jpg') }}" alt="img"></div>
              <div class="tutor_boxText">
                <h4>E. A. Siblu</h4>
                <span>Writing</span>
                <p>These Classes are thing important keys to unloking our written creativity. If you have beliefe, freedom and discipline, then who knows what the future will hold</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="tutor_box">
              <div class="tutor_boxImg"><img src="{{ asset('images/teacher_img2.jpg') }}" alt="img"></div>
              <div class="tutor_boxText">
                <h4>E. A. Siblu</h4>
                <span>Writing</span>
                <p>These Classes are thing important keys to unloking our written creativity. If you have beliefe, freedom and discipline, then who knows what the future will hold</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Saying-section -->



    <!--Footer Content Start-->

    <!--Footer Content End-->

    <!-- Js Files Start -->
<!--Footer Content Start-->
@include('frontend.layout.footer')

<!-- Js Files Start -->
<script src="{{asset('js/allmix.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
  </body>
</html>
