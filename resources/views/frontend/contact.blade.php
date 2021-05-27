<!DOCTYPE html>
<html lang="zxx">
@include('frontend.layout.head')

<body class="innerpages body_bg">
    <!-- Header Start -->
    @include('frontend.layout.header');
    <!-- Header End -->
    <!-- innerBanner start -->
    <div class="innerBanner">
        @if($contact_header_image == null)
            <img src="{{asset('images/Bannar-4.jpg')}}" class="img-responsive" alt="courses-Banner">
        @endif
        @if($contact_header_image != null)
          <img src="{{url('/siham_lms/storage/app/public/'.$contact_header_image	)}}"  class="img-responsive" alt="courses-Banner">

        @endif
{{--        {{dd($contact_header_image)}}--}}
{{--      <img src="{{asset('images/Bannar-1.jpg')}}" class="img-responsive" alt="courses-Banner">--}}
      <div class="innerBannerOverlay">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12 centerCol">
            <h1>Contact Us</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- innerBanner end -->
    <div class="clear"></div>
    <!--startLearning-section -->
    <div class="contact_map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26360909.888257876!2d-113.74875964478716!3d36.242299409623534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2s!4v1613574161212!5m2!1sen!2s"></iframe>
    </div>
    <div class="contact_page">
      <div class="container">
        <div class="row">
          <div class="contact_inner">
            <div class="col-md-8 col-sm-8 col-xs-12">
              <div class="contact_pageForm">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label><span>*</span> Name</label>
                    <input type="text">
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label><span>*</span> Email</label>
                    <input type="email">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label>Company Name</label>
                    <input type="text">
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label> Website</label>
                    <input type="url">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <label><span>*</span> Your Messsage</label>
                    <textarea></textarea>
                    <input type="submit" value="Send messsage">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="contact_info">
                <div class="contact_head">
                  <h2>Contact Info</h2>
                </div>



                <div class="contact_infoBox">
                  <div class="contact_infoBoxIcon">
                    <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                  </div>
                  <div class="contact_infoBoxText">
                    @foreach($contactsAddress as $contactsAddres)
                    <h4>{{$contactsAddres->type}}</h4>
                     <p>{{$contactsAddres->description}}</p>
                     @endforeach
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="contact_infoBox">
                  <div class="contact_infoBoxIcon">
                    <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                  </div>
                  <div class="contact_infoBoxText">
                    @foreach($contactsPhone as $contactsPhon)
                    <h4>{{$contactsPhon->type}}</h4>
                     <p>{{$contactsPhon->description}}</p>
                     @endforeach
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="contact_infoBox">
                  <div class="contact_infoBoxIcon">
                    <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                  </div>
                  <div class="contact_infoBoxText">
                    @foreach($contactsEmail as $contactsEmail)
                    <h4>{{$contactsEmail->type}}</h4>
                     <p>{{$contactsEmail->description}}</p>
                     @endforeach
                  </div>
                </div>
                  <div class="clearfix"></div>
                  <div class="contact_infoBox">
                      <div class="contact_infoBoxIcon">
                          <span><i class="fa fa-dribbble" aria-hidden="true"></i></span>
                      </div>
                      <div class="contact_infoBoxText">
                          <h4>website</h4>
                          <p>.com</p>
                      </div>
                  </div>

              </div>
            </div>
          </div>
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
