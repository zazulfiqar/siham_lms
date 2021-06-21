<!DOCTYPE html>
<html lang="zxx">
@include('frontend.layout.head')

  <body class="innerpages body_bg">
    <!-- Header Start -->
    @include('frontend.layout.header');
    <!-- Header End -->

<!-- innerBanner start -->
		<div class="innerBanner">
            @if($faq_header_image == null)
                <img src="{{asset('images/Bannar-4.jpg')}}" class="img-responsive" alt="courses-Banner">
            @endif
            @if($faq_header_image != null)
                <img src="{{url('/siham_lms/storage/app/public/'.$faq_header_image	)}}"  class="img-responsive" alt="courses-Banner">

            @endif

{{--			<img src="{{asset('images/Bannar-4.jpg')}}" class="img-responsive" alt="courses-Banner">--}}
			<div class="innerBannerOverlay">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<h1>FAQ's</h1>
					</div>
				</div>
			</div>
		</div>
<!-- innerBanner end -->

   <div class="clear"></div>

    <!-- faq-section -->
    <div class="faq_section padding_both">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-sm-9 col-xs-12 center">
            <div class="startLearning_head">
              <h2 data-aos="fade-down">Frequently Asked Questions</h2>
              <p data-aos="fade-down">Here are some answers to common questions we get from students about Knowledge Society Learning. If your question is not answered below, contact us to assist.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-9 col-sm-9 col-xs-12 center">
            <div class="faq_text">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                  @foreach($faqs as $index=>$faq)

                <div class="panel panel-default" data-aos="zoom-in" data-aos-delay="300">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{$index+1}}" aria-expanded="true" aria-controls="collapseOne">
                       {{$faq->faq}}?
                    </a>
                  </h4>
                  </div>
                  <div id="{{$index+1}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                      {{$faq->description}}
                    </div>
                  </div>
                </div>
                @endforeach

                <!--<div class="panel panel-default" data-aos="zoom-in" data-aos-delay="400">-->
                <!--  <div class="panel-heading" role="tab" id="headingTwo">-->
                <!--    <h4 class="panel-title">-->
                <!--    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">-->
                <!--      Is lorem ipsum a replacement for college?-->
                <!--    </a>-->
                <!--  </h4>-->
                <!--  </div>-->
                <!--  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">-->
                <!--    <div class="panel-body">-->
                <!--      Knowledge Society focuses on four main pillars of online education: health, wealth, love, and happiness. At this time, we're focusing on wealth - practical skills that you can use to start or grow your career. Because there's multiple courses, you will learn both beginner and advanced concepts.-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->

                <!--<div class="panel panel-default" data-aos="zoom-in" data-aos-delay="500">-->
                <!--  <div class="panel-heading" role="tab" id="headingThree">-->
                <!--    <h4 class="panel-title">-->
                <!--    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">-->
                <!--      Who's teaching lorem ipsum courses?-->
                <!--    </a>-->
                <!--  </h4>-->
                <!--  </div>-->
                <!--  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">-->
                <!--    <div class="panel-body">-->
                <!--      Knowledge Society focuses on four main pillars of online education: health, wealth, love, and happiness. At this time, we're focusing on wealth - practical skills that you can use to start or grow your career. Because there's multiple courses, you will learn both beginner and advanced concepts.-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- faq-section -->



    <!--Footer Content Start-->
    @include('frontend.layout.footer')
    <!-- Js Files Start -->
    <script src="{{asset('js/allmix.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
  </body>
</html>
