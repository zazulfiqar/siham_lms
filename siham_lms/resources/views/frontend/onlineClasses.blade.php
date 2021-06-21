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
                        <h1>Online Classes</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- innerBanner end -->

        <div class="clear"></div>

        <!-- Saying-section -->
        <div class="Saying_section online_classes">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-sm-10 col-xs-12 center">
                        <div class="startLearning_head">
                            <h2 data-aos="fade-down">Online Classes</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        @foreach($home_page_videos as $videosfront)
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="video_box" data-aos="fade-up" data-aos-delay="300">
                                <div class="video_boxImg">
                                    <img src="{{ URL::asset('uploadsVideoImage/'.$videosfront->photo) }}" alt="img">
                                    <div class="video_boxImgOverlay">
                                        <a data-fancybox="gallery" href="{{$videosfront->youtubeurl }}"><img src="images/paly-icon.png" alt="img"></a>
                                    </div>
                                </div>
                                <div class="video_boxText">
                                    <p>{{$videosfront->content }}</p>
                                    <a class="btn_pink2">{{$videosfront->name }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>


                </div>
            </div>
        </div>
        <!-- Saying-section -->



        <!--Footer Content Start-->
        <!--Footer Content Start-->
        @include('frontend.layout.footer')

        <!-- Js Files Start -->
        <script src="{{asset('js/allmix.js')}}"></script>
        <script src="{{asset('js/jquery.slicknav.js')}}"></script>
        <script src="{{asset('js/aos.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>
    </body>

</html>