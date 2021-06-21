<!DOCTYPE html>
<html lang="zxx">
@include('frontend.layout.head')

<body class="body_bg">
    <!-- Header Start -->
    @include('frontend.layout.header');
    <!-- Header End -->

    <!-- Slider  Sectiion Start -->
    <div class="main_slider banner_section">
        <div class="carousel slide" data-ride="carousel" id="myCarousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    @if($home_header_image == null)
                    <img alt="img" src="{{asset('images/banner.jpg')}}"> @endif @if($home_header_image != null)
                    <img alt="img" src="{{url('/siham_lms/storage/app/public/'.$home_header_image	)}}"> @endif

                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="slider_text">
                                        <div class="banner_text">

                                            <img src="{{asset('images/logo_white.png')}}" alt="img" class="wow bounceInLeft" data-wow-delay="0.4s" data-wow-duration="2s">
                                            <h2 data-aos="fade-down">
                                                @foreach($frontDynamic as $frontDynami ) {{ $frontDynami->banner_text }} @endforeach
                                                <ul>

                                                    <li data-aos="fade-left" data-aos-delay="400">
                                                        <a href="{{asset('/onlineClasses')}}">Live
                                                    Online Classes</a></li>
                                                    <li data-aos="fade-left" data-aos-delay="400"> <a href="{{asset('/onlineTutor')}}">Find
                                                    Online Tutor</a></li>
                                                    <li data-aos="fade-left" data-aos-delay="400"><a href="{{asset('course')}}">Join Us</a></li>
                                                </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Sectiion End -->

    <!-- video-section -->
    <!-- video-section -->

    <!--startLearning-section -->
    <div class="startLearning_section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 col-xs-12 center">
                    <div class="startLearning_head wow bounceInDown" data-wow-delay="0.6s" data-wow-duration="2s">
                        <h2 data-aos="fade-down">
                            @foreach($frontDynamic as $frontDynami ) {{ $frontDynami->subjects_topic }} @endforeach
                        </h2>
                        <p data-aos="fade-down">
                            @foreach($frontDynamic as $frontDynami ) {{ $frontDynami->subjects_text }} @endforeach
                        </p>

                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="menu1" class="tab-pane fade in active">
                    <div class="row">
                        <div class="learning_slider">
                            @foreach ($getRecordFrontHomeGallery as $getRecordFrontHome )
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="fronttutor_box ">
                                    <div class="tutor_boxImg"><img src="{{ URL::asset('uploadsGalleryImage/'.$getRecordFrontHome->photo) }}" alt="img"></div>
                                    <div class="tutor_boxText">
                                        <h4> {{ $getRecordFrontHome->name }}</h4>

                                        <p>{{ $getRecordFrontHome->content }} </p>
                                    </div>
                                </div>
                            </div>
                            <!--
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="800">
                                    <div class="learnBoxImg">
                                        <img src="{{ URL::asset('uploadsGalleryImage/'.$getRecordFrontHome->photo) }}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="">
                                             {{ $getRecordFrontHome->name }}
                                        </a>
                                        <h5>{{ $getRecordFrontHome->content }} </h5>
                                    </div>
                                </div>
                            </div> -->
                            @endforeach

                        </div>
                    </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <div class="row">
                        <div class="learning_slider">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="800">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img2.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Algebra
                                        Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="700">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img1.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Calculus
                                        Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="600">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img4.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Trignometry
                                        Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="500">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img3.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Statistics
                                        Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <div class="row">
                        <div class="learning_slider">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="800">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img1.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Chemistry<img
                                            src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="700">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img2.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Physics<img
                                            src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="600">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img3.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Accounting<img
                                            src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="500">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img4.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Finacce<img
                                            src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <div class="row">
                        <div class="learning_slider">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="800">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img2.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">English<img
                                            src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="700">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img1.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">History<img
                                            src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="600">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img4.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Biology<img
                                            src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="500">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img3.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Zoology<img
                                            src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu5" class="tab-pane fade">
                    <div class="row">
                        <div class="learning_slider">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="800">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img1.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Writing
                                        Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="700">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img2.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">French
                                        Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="600">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img3.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Spanish
                                        Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="500">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img4.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">ESL
                                        Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu6" class="tab-pane fade">
                    <div class="row">
                        <div class="learning_slider">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="800">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img2.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">ACT Test
                                        Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="700">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img1.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">SAT Prep
                                        Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="600">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img4.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">GRE
                                        Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="learnBox" data-aos="fade-up" data-aos-delay="500">
                                    <div class="learnBoxImg">
                                        <img src="{{asset('images/learn_img3.png')}}" alt="img">
                                    </div>
                                    <div class="learnBoxText">
                                        <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">GMAT
                                        Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- startLearning-section -->


    <div class="clear"></div>


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

                @foreach($home_page_videos as $videosfront)
                <div class="col-md-4 col-sm-4 col-xs-12 videPicsImg">
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



    <!-- WatchAnyTime-section -->

    <div class="WatchAnyTime_section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 col-xs-12 center">
                    <div class="startLearning_head">
                        <h2 data-aos="fade-down">
                            @foreach($frontDynamic as $frontDynami ) {{ $frontDynami->learn_anywhere_topic }} @endforeach
                        </h2>
                        <p data-aos="fade-down">
                            @foreach($frontDynamic as $frontDynami ) {{ $frontDynami->learn_anywhere_text }} @endforeach
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="WatchAnyTime_Box" data-aos="flip-left" data-aos-delay="300">
                        <img src="{{asset('images/anyIcon_1.png')}}" alt="img">
                        <h4>
                            @foreach($frontDynamic as $frontDynami ) {{ $frontDynami->learn_anywhere_card_topic1 }} @endforeach
                        </h4>
                        <p>
                            @foreach($frontDynamic as $frontDynami ) {{ $frontDynami->learn_anywhere_card_text1 }} @endforeach
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="WatchAnyTime_Box" data-aos="flip-left" data-aos-delay="400">
                        <img src="{{asset('images/anyIcon_2.png')}}" alt="img">
                        <h4>
                            @foreach($frontDynamic as $frontDynami ) {{ $frontDynami->learn_anywhere_card_topic2 }} @endforeach
                        </h4>
                        <p>
                            @foreach($frontDynamic as $frontDynami ) {{ $frontDynami->learn_anywhere_card_text2 }} @endforeach
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="WatchAnyTime_Box" data-aos="flip-left" data-aos-delay="500">
                        <img src="{{asset('images/anyIcon_3.png')}}" alt="img">
                        <h4>
                            @foreach($frontDynamic as $frontDynami ) {{ $frontDynami->learn_anywhere_card_topic3 }} @endforeach
                        </h4>
                        <p>
                            @foreach($frontDynamic as $frontDynami ) {{ $frontDynami->learn_anywhere_card_text3 }} @endforeach
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 center">
                    <div class="WatchAnyTime_btn" data-aos="flip-right" data-aos-delay="600">
                        <a href="{{asset('register')}}" class="btn_pink">Join Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- WatchAnyTime-section -->

    <!-- Pricing-section -->
    <div class="Pricing_section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 col-xs-12 center">
                    <div class="startLearning_head">
                        <h2 data-aos="fade-down">Pricing</h2>
                        <p data-aos="fade-down">
                            @foreach($frontDynamic as $frontDynami ) {{ $frontDynami->pricing_content }} @endforeach
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-10 col-sm-10 col-xs-12 center">
                    <div class="row">

                        @foreach($pricing as $price)
                        <div class="col-md-6 col-sm-6 col-xs-12 priceDiv" data-aos="flip-left">
                            <div class="Pricing_Box">
                                <h3>{{$price->course_duration}}</h3>
                                <span>{{$price->price}}</span>
                                <p> {{$price->description}}</p>
                                <hr>
                                <ul>
                                    @if($price->feature_one)
                                    <li>{{$price->feature_one}}</li>
                                    @else @endif @if($price->feature_two)
                                    <li>{{$price->feature_two}}</li>
                                    @else @endif @if($price->feature_three)
                                    <li>{{$price->feature_three}}</li>
                                    @else @endif @if($price->feature_four)
                                    <li>{{$price->feature_four}}</li>
                                    @else @endif @if($price->feature_five)
                                    <li>{{$price->feature_five}}</li>
                                    @else @endif
                                </ul>
                            </div>
                            <div class="Pricing_Box2">
                                <a href="{{asset('register')}}" class="btn_pink">Join Us</a>
                            </div>
                        </div>

                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing-section -->

    <!-- Saying-section -->
    <div class="Saying_section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 col-xs-12 center">
                    <div class="startLearning_head">
                        <h2 data-aos="fade-down">
                            @foreach($frontDynamic as $frontDynami ) {{ $frontDynami->testimonials }} @endforeach
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="Saying_slider" data-aos="zoom-out-left" data-aos-delay="300">

                    @foreach($testimonials as $testimonial)
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="Saying_box">
                            <img src="{{url('/siham_lms/storage/app/public/'.$testimonial->image)}}">
                            <!--<img src="{{url(''.$testimonial->image)}}">-->
                            {{-- <img src="{{url('images/saying_img3.png')}}" alt="img"> --}}
                            <h4>{{$testimonial->name}}</h4>
                            {{-- <span>Writing</span> --}}
                            <p>{{$testimonial->description}}</p>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
    <!-- Saying-section -->

    <!-- Blog-section -->
    <div class="Blog_section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 col-xs-12 center">
                    <div class="startLearning_head">
                        <h2 data-aos="fade-down">Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="Blog_slider" data-aos="zoom-out-right" data-aos-delay="300">
                    @foreach($blogs as $blog)
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="blog_Box wow bounceIn" data-wow-delay="0.2s" data-wow-duration="2s">
                            <p> {{ \Illuminate\Support\Str::limit($blog->description, 300, $end='...')}} </p>
                            <!--<p>{{$blog->description}}</p>-->
                            <a href="{{ route('blogdetail', Qs::hash($blog->id)) }}" class="dropdown-item"><i class="icon-checkbox-checked2"></i> Read more</a>
                            <div class="blog_BoxOverlay">
                                <p>
                                    {{ \Illuminate\Support\Str::limit($blog->title, 70, $end='...')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- Blog-section -->

    <!-- faq-section -->
    <div class="faq_section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12 center">
                    <div class="startLearning_head">
                        <h2 data-aos="fade-down">
                            @foreach($frontDynamic as $frontDynami ) {{ $frontDynami->faq_topic }} @endforeach
                        </h2>
                        <p data-aos="fade-down">
                            @foreach($frontDynamic as $frontDynami ) {{ $frontDynami->faq_content }} @endforeach
                            </h2>
                        </p>
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