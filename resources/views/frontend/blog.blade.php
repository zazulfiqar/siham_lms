<!DOCTYPE html>
<html lang="zxx">
@include('frontend.layout.head')
<body class="innerpages body_bg">
<!-- Header Start -->
@include('frontend.layout.header')
<!-- Header End -->
<!-- innerBanner start -->
<div class="innerBanner">
    @if($blog_header_image == null)
        <img src="{{asset('images/Bannar-2.jpg')}}" class="img-responsive" alt="courses-Banner">
    @endif
    @if($blog_header_image != null)
        <img src="{{url('/siham_lms/storage/app/public/'.$blog_header_image	)}}"  class="img-responsive" alt="courses-Banner">
    @endif
    <div class="innerBannerOverlay">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1>Blogs</h1>
            </div>
        </div>
    </div>
</div>
<!-- innerBanner end -->
<!-- Blog-section -->
<div class="Blog_section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-12 center">
                <div class="startLearning_head">
                    <h2 data-aos="fade-down">Our Blogs</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="blog_Box wow bounceIn" data-wow-delay="0.2s" data-wow-duration="2s">
                        <p> {{ \Illuminate\Support\Str::limit($blog->description, 300, $end='...')}} </p>
                    <!--<p>{{$blog->description}}</p>-->
{{--                        <a href="{{route('blogdetail',Qs::hash($blog->id)}}">{{$blog->id}}Read More</a>--}}



                        <a href="{{ route('blogdetail', Qs::hash($blog->id)) }}"
                           class="dropdown-item"><i class="icon-checkbox-checked2"></i> Read more</a>


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
<!-- Blog-section -->
<!--Footer Content Start-->
@include('frontend.layout.footer')
<!--Footer Content End-->
<!-- Js Files Start -->
<script src="{{asset('js/allmix.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>
