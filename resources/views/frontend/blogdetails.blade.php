<!DOCTYPE html>
<html lang="zxx">
@include('frontend.layout.head')

<body class="innerpages body_bg">
    <!-- Header Start -->
    @include('frontend.layout.header');
    <!-- Header End -->

<!-- innerBanner start -->
<div class="innerBanner">
    <img src="{{ asset('images/Bannar-2.jpg') }}" class="img-responsive" alt="courses-Banner">
    <div class="innerBannerOverlay">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1>Blog Detail</h1>
            </div>
        </div>
    </div>
</div>
<!-- innerBanner end -->

<!-- Blog-section -->
<div class="BlogDetail_page">
<div class="container">
<div class="row">
  <div class="col-md-10 col-sm-10 col-xs-12 center">
   <div class="BlogDetail_text">
      <img src="{{ asset('images/BlogDetail_img1.jpg') }}" alt="img">
      <h2>{{$frontblog->title}}</h2>
      {{-- <ul>
        <li><a href="javascript:void(0)"><i class="fa fa-calendar" aria-hidden="true"></i> 19, Jun 2021</a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-eye" aria-hidden="true"></i> 1564</a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-heart-o" aria-hidden="true"></i> Like</a></li>
      </ul> --}}
{{--       {{dd($frontblog)}}--}}
   <p>{{$frontblog->description}}</p>
   </div>
   {{-- <div class="commentBoxMain">
     <h3>COMMENTS (3)</h3>
     <div class="commentBox">
        <img src="images/img30.jpg" alt="img">
        <i class="fa fa-reply" aria-hidden="true"></i>
        <div class="commentInner">
          wwwebinvader <span class="badge badge-success">Admin</span> 18, October 2015 at <i>9:35 am</i>
        </div>
        <p>Maecenas vestibulum mollis diam. Pellentesque ut neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. In ac felis quis tortor malesuada pretium.</p>
    </div>
    <div class="commentBox">
      <img src="images/img30.jpg" alt="img">
      <i class="fa fa-reply" aria-hidden="true"></i>
      <div class="commentInner">
        wwwebinvader <span class="badge badge-success">Admin</span> 18, October 2015 at <i>9:35 am</i>
      </div>
      <p>Maecenas vestibulum mollis diam. Pellentesque ut neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. In ac felis quis tortor malesuada pretium.</p>
    </div>
    <div class="commentBox">
      <img src="images/img30.jpg" alt="img">
      <i class="fa fa-reply" aria-hidden="true"></i>
      <div class="commentInner">
        wwwebinvader <span class="badge badge-success">Admin</span> 18, October 2015 at <i>9:35 am</i>
      </div>
      <p>Maecenas vestibulum mollis diam. Pellentesque ut neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. In ac felis quis tortor malesuada pretium.</p>
    </div>
   </div> --}}
   {{-- <div class="leave_formMian">
     <h3>LEAVE A REPLY</h3>
     <div class="leave_formBox">
       <form>
         <div class="row">
           <div class="col-md-6 col-sm-6 col-xs-12">
             <input type="text" placeholder="Name">
           </div>
           <div class="col-md-6 col-sm-6 col-xs-12">
             <input type="email" placeholder="Email">
           </div>
         </div>
         <div class="row">
           <div class="col-md-12 col-sm-12 col-xs-12">
             <textarea placeholder="Your Message"></textarea>
           </div>
         </div>
         <div class="row">
           <div class="col-md-12 col-sm-12 col-xs-12">
             <button type="button">Leave a reply</button>
           </div>
         </div>
       </form>
     </div>
   </div> --}}
  </div>
</div>
</div>
</div>
<!-- Blog-section -->



<!--Footer Content Start-->

<!--Footer Content End-->

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
