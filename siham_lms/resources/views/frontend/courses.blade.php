<!DOCTYPE html>
<html lang="zxx">
@include('frontend.layout.head')

<body class="innerpages body_bg">
    <!-- Header Start -->
    @include('frontend.layout.header');
    <!-- Header End -->
    <!-- innerBanner start -->
    <div class="innerBanner">

        @if($course_header_image == null)
            <img src="{{asset('images/Bannar-3.jpg')}}" class="img-responsive" alt="courses-Banner">
        @endif
        @if($course_header_image != null)
           <img src="{{url('/siham_lms/storage/app/public/'.$course_header_image	)}}"  class="img-responsive" alt="courses-Banner">
        @endif

      <div class="innerBannerOverlay">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12 centerCol">
            <h1>Courses</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- innerBanner end -->
    <div class="clear"></div>
    <!--startLearning-section -->
    <div class="startLearning_section padding_both">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-sm-10 col-xs-12 center">
            <div class="startLearning_head wow bounceInDown" data-wow-delay="0.6s" data-wow-duration="2s">
              <h2 data-aos="fade-down">Courses We Offer </h2>
              <p data-aos="fade-down">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, pulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus..</p>
            </div>
          </div>
        </div>
        <div class="row">
            @foreach($subjects as $subject)
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="subjctListBox body_bg">
              <h2> {{$subject->name}}</h2>
              <div id="scrolWrapper">
                <div class="scrollbar" id="style-2">
                  <ul class="subject-list">

                    @foreach($frontCources->where('course_id', $subject->id) as $cource)
                        <li> {{$cource->content}}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>

          @endforeach

        </div>
      </div>
    </div>
    <!-- startLearning-section -->

    <!--Footer Content Start-->
    @include('frontend.layout.footer')
    <!-- Js Files Start -->
    <script src="{{asset('js/allmix.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
  </body>
</html>
