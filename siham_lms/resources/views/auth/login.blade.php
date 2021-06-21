<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>::: Space e - Learning Service :::</title>
    <!-- All CSS inclueded in one  -->
    <link href="{{asset('css/allmix.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/slicknav.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/aos.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
  </head>
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
            <img alt="img" src="{{asset('images/banner.jpg')}}">
            <div class="carousel-caption">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="slider_text">
                      <div class="banner_text">
                        <img src="{{asset('images/logo_white.png')}}" alt="img" class="wow bounceInLeft" data-wow-delay="0.4s" data-wow-duration="2s">
                        <h2 data-aos="fade-down">Learn Topics That Matters <br>To You.</h2>
                        <ul>
                          <li data-aos="fade-left" data-aos-delay="400"><a href="register.html" >Join Us</a></li>
                          <li data-aos="fade-left" data-aos-delay="400"><a href="javascript:void(0)">Live Online Classes</a></li>
                          <li data-aos="fade-left" data-aos-delay="400"><a href="javascript:void(0)">Find online tutor</a></li>
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
    <div class="video_section">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="video_box" data-aos="fade-up" data-aos-delay="500">
              <div class="video_boxImg">
                <img src="{{asset('images/video_img1.png')}}" alt="img">
                <div class="video_boxImgOverlay">
                  <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4"><img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                </div>
              </div>
              <div class="video_boxText">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros</p>
                <a href="javascript:void(0)" class="btn_pink2">The Best Tutors</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="video_box" data-aos="fade-up" data-aos-delay="400">
              <div class="video_boxImg">
                <img src="{{asset('images/video_img2.png')}}" alt="img">
                <div class="video_boxImgOverlay">
                  <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4"><img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                </div>
              </div>
              <div class="video_boxText">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros</p>
                <a href="javascript:void(0)" class="btn_pink2">Variety of Subjects</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="video_box" data-aos="fade-up" data-aos-delay="300">
              <div class="video_boxImg">
                <img src="{{asset('images/video_img3.png')}}" alt="img">
                <div class="video_boxImgOverlay">
                  <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4"><img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                </div>
              </div>
              <div class="video_boxText">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros</p>
                <a href="javascript:void(0)" class="btn_pink2">Learn Anywhere</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- video-section -->

    <!--startLearning-section -->
    <div class="startLearning_section">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-sm-10 col-xs-12 center">
            <div class="startLearning_head wow bounceInDown" data-wow-delay="0.6s" data-wow-duration="2s">
              <h2 data-aos="fade-down">Start Learning</h2>
              <p data-aos="fade-down">If you decide the courses in Knowledge Society aren't for you - no problem. You can easily cancel at anytime.</p>
              <ul>
                <li class="active" data-aos="fade-down" data-aos-delay="300">
				<a data-toggle="pill" href="#menu1">Engineering</a></li>
                <li data-aos="fade-down" data-aos-delay="400"><a data-toggle="pill" href="#menu2">Math</a></li>
                <li data-aos="fade-down" data-aos-delay="500"><a data-toggle="pill" href="#menu3">Science</a></li>
                <li data-aos="fade-down" data-aos-delay="600"><a data-toggle="pill" href="#menu4">High School</a></li>
                <li data-aos="fade-down" data-aos-delay="700"><a data-toggle="pill" href="#menu5">Humanities</a></li>
                <li data-aos="fade-down" data-aos-delay="800"><a data-toggle="pill" href="#menu6">Test Preparation</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="tab-content">
          <div id="menu1" class="tab-pane fade in active">
            <div class="row">
              <div class="learning_slider">
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="learnBox" data-aos="fade-up" data-aos-delay="800">
                    <div class="learnBoxImg">
                      <img src="{{asset('images/learn_img1.png')}}" alt="img">
                    </div>
                    <div class="learnBoxText">
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Computer Science Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                      <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque </h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="learnBox" data-aos="fade-up" data-aos-delay="700">
                    <div class="learnBoxImg">
                      <img src="{{asset('images/learn_img2.png')}}" alt="img">
                    </div>
                    <div class="learnBoxText">
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Electrical Engineering<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Mathematical Engineering<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Programming<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
                      <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque</h5>
                    </div>
                  </div>
                </div>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Algebra Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Calculus Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Trignometry Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Statistics Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Chemistry<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Physics<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Accounting<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Finacce<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">English<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">History<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Biology<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Zoology<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Writing Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">French Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">Spanish Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">ESL Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">ACT Test Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">SAT Prep Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">GRE Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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
                      <a data-fancybox="gallery" href="https://www.youtube.com/embed/nWwpyclIEu4">GMAT Tutors<img src="{{asset('images/paly-icon.png')}}" alt="img"></a>
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

    <!-- WatchAnyTime-section -->
    <div class="WatchAnyTime_section">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-sm-10 col-xs-12 center">
            <div class="startLearning_head">
              <h2 data-aos="fade-down">Learn Any Where</h2>
              <p data-aos="fade-down">Learn from the comfort of your home or on the go, whenever you want - the choice is yours.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="WatchAnyTime_Box" data-aos="flip-left" data-aos-delay="300">
              <img src="{{asset('images/anyIcon_1.png')}}" alt="img">
              <h4>Log into your private account</h4>
              <p>Watch via any device with internet access.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="WatchAnyTime_Box" data-aos="flip-left" data-aos-delay="400">
              <img src="{{asset('images/anyIcon_2.png')}}" alt="img">
              <h4>Learn on your own schedule</h4>
              <p>Start or stop the videos anytime. Pause and pick up where you left off easily.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="WatchAnyTime_Box" data-aos="flip-left" data-aos-delay="500">
              <img src="{{asset('images/anyIcon_3.png')}}" alt="img">
              <h4>Use any computer</h4>
              <p>Watch right on Knowledgesociety.com.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-12 center">
            <div class="WatchAnyTime_btn" data-aos="flip-right" data-aos-delay="600">
              <a href="register.html" class="btn_pink">Join Us</a>
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
              <p data-aos="fade-down">Get access to specialized video training that teaches practical skills for improving your career and life, every month. Weekly content updates from multiple world's best experts.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 col-sm-10 col-xs-12 center">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12" data-aos="flip-left">
                <div class="Pricing_Box">
                    <h3>Every 3 Months</h3>
                    <span>$139</span>
                    <p>FREE for 3 days, then $139 per every 3 months (Best Deal, 33% Off)</p>
                    <hr>
                    <ul>
                      <li>Watch on your laptop, TV, phone and tablet</li>
                      <li>Unlimited access</li>
                      <li>Cancel at any time</li>
                      <li>Exclusive videos with tips and tricks from every teacher</li>
                    </ul>
                </div>
                <div class="Pricing_Box2">
                   <a href="register.html" class="btn_pink">Join Us</a>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12" data-aos="flip-right">
                <div class="Pricing_Box">
                    <h3>Months</h3>
                    <span>$69</span>
                    <p>FREE for 3 days, then $69 per month</p>
                    <hr>
                    <ul>
                      <li>Watch on your laptop, TV, phone and tablet</li>
                      <li>Unlimited access</li>
                      <li>Cancel at any time</li>
                      <li>Exclusive videos with tips and tricks from every teacher</li>
                    </ul>
                </div>
                <div class="Pricing_Box2">
                   <a href="register.html" class="btn_pink">Join Us</a>
                </div>
              </div>
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
              <h2 data-aos="fade-down">What Student Are Saying </h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="Saying_slider" data-aos="zoom-out-left" data-aos-delay="300">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="Saying_box">
                <img src="{{asset('images/saying_img3.png')}}" alt="img">
                <h4>E. A. Siblu</h4>
                <span>Writing</span>
                <p>These Classes are thing important keys to unloking our written creativity. If you have beliefe, freedom and discipline, then who knows what the future will hold</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="Saying_box">
                <img src="{{asset('images/saying_img2.png')}}" alt="img">
                <h4>Sabbir Hasan</h4>
                <span>cooking</span>
                <p>I loved this class.I leraned to create rather than follow recipes and how to think outside of the box. I have alwayes loved cooking, this class taken meto a new level</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="Saying_box">
                <img src="{{asset('images/saying_img1.png')}}" alt="img">
                <h4>White Smith</h4>
                <span>Retail</span>
                <p>Collaboratively formulate mission-critical innovation without cost effective channels. Competently iterate end-to-end imperatives with effective leadership skills.</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="Saying_box">
                <img src="{{asset('images/saying_img3.png')}}" alt="img">
                <h4>E. A. Siblu</h4>
                <span>Writing</span>
                <p>These Classes are thing important keys to unloking our written creativity. If you have beliefe, freedom and discipline, then who knows what the future will hold</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="Saying_box">
                <img src="{{asset('images/saying_img2.png')}}" alt="img">
                <h4>Sabbir Hasan</h4>
                <span>cooking</span>
                <p>I loved this class.I leraned to create rather than follow recipes and how to think outside of the box. I have alwayes loved cooking, this class taken meto a new level</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="Saying_box">
                <img src="{{asset('images/saying_img1.png')}}" alt="img">
                <h4>White Smith</h4>
                <span>Retail</span>
                <p>Collaboratively formulate mission-critical innovation without cost effective channels. Competently iterate end-to-end imperatives with effective leadership skills.</p>
              </div>
            </div>
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
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="blog_Box wow bounceIn" data-wow-delay="0.2s" data-wow-duration="2s">
                <p>Choosing a career shouldn't cost you a fortune. The problem with college today is that it does. Too many people are spending tens of thousands of dollars on degrees that have little value in the modern world.</p>
                <a href="javascript:void(0)">Read More</a>
                <div class="blog_BoxOverlay">
                  <p>Life's Too Short To Waste Time and Money Learning Things You'll Never Use</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="blog_Box wow bounceIn" data-wow-delay="0.4s" data-wow-duration="2s">
                <p>Choosing a career and improving your life just got easier. Knowledge Society teaches you practical life lessons from recognized experts who have real-world experience and success doing what they show you.</p>
                <a href="javascript:void(0)">Read More</a>
                <div class="blog_BoxOverlay">
                  <p>Unlimited Access To Practical Career Courses!</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="blog_Box wow bounceIn" data-wow-delay="0.6s" data-wow-duration="2s">
                <p>It doesn't matter if you only have 15 minutes spare time on the bus to work. Or an hour before bed. You can log in and learn as long as you're connected to the internet. All your progress through the courses is saved, so you can pick up exactly where you left off.</p>
                <a href="javascript:void(0)">Read More</a>
                <div class="blog_BoxOverlay">
                  <p>Learn From Anywhere, On Your Own Schedule</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="blog_Box">
                <p>Choosing a career shouldn't cost you a fortune. The problem with college today is that it does. Too many people are spending tens of thousands of dollars on degrees that have little value in the modern world.</p>
                <a href="javascript:void(0)">Read More</a>
                <div class="blog_BoxOverlay">
                  <p>Life's Too Short To Waste Time and Money Learning Things You'll Never Use</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="blog_Box">
                <p>Choosing a career and improving your life just got easier. Knowledge Society teaches you practical life lessons from recognized experts who have real-world experience and success doing what they show you.</p>
                <a href="javascript:void(0)">Read More</a>
                <div class="blog_BoxOverlay">
                  <p>Unlimited Access To Practical Career Courses!</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="blog_Box">
                <p>It doesn't matter if you only have 15 minutes spare time on the bus to work. Or an hour before bed. You can log in and learn as long as you're connected to the internet. All your progress through the courses is saved, so you can pick up exactly where you left off.</p>
                <a href="javascript:void(0)">Read More</a>
                <div class="blog_BoxOverlay">
                  <p>Learn From Anywhere, On Your Own Schedule</p>
                </div>
              </div>
            </div>
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
              <h2 data-aos="fade-down">Frequently Asked Questions</h2>
              <p data-aos="fade-down">Here are some answers to common questions we get from students about Knowledge Society Learning. If your question is not answered below, contact us to assist.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-9 col-sm-9 col-xs-12 center">
            <div class="faq_text">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default" data-aos="zoom-in" data-aos-delay="300">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      What will lorem ipsum teach me?
                    </a>
                  </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                      Knowledge Society focuses on four main pillars of online education: health, wealth, love, and happiness. At this time, we're focusing on wealth - practical skills that you can use to start or grow your career. Because there's multiple courses, you will learn both beginner and advanced concepts.
                    </div>
                  </div>
                </div>
                <div class="panel panel-default" data-aos="zoom-in" data-aos-delay="400">
                  <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                      Is lorem ipsum a replacement for college?
                    </a>
                  </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      Knowledge Society focuses on four main pillars of online education: health, wealth, love, and happiness. At this time, we're focusing on wealth - practical skills that you can use to start or grow your career. Because there's multiple courses, you will learn both beginner and advanced concepts.
                    </div>
                  </div>
                </div>
                <div class="panel panel-default" data-aos="zoom-in" data-aos-delay="500">
                  <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                      Who's teaching lorem ipsum courses?
                    </a>
                  </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                      Knowledge Society focuses on four main pillars of online education: health, wealth, love, and happiness. At this time, we're focusing on wealth - practical skills that you can use to start or grow your career. Because there's multiple courses, you will learn both beginner and advanced concepts.
                    </div>
                  </div>
                </div>
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
