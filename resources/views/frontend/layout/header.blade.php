

<header>
    <div class="main_header">

        @php
            $tabname=Request::path();
        @endphp

      <div class="container">
        <div class="row flexRow">
          <div class="col-md-7 hidden-sm hidden-xs">
            <div class="menuSec">
              <ul id="menu">
                <li><a href="{{asset('/')}}" @if($tabname == '/') class="active" @endif>Home</a></li>
                <li><a href="{{asset('course')}}"@if($tabname == 'course') class="active" @endif>Course</a></li>
                <li><a href="{{asset('pricing')}}" @if($tabname == 'pricing') class="active" @endif>Pricing </a></li>
                <li><a href="{{asset('testimonials')}}" @if($tabname == 'testimonials') class="active" @endif>TESTIMOTIONAL </a></li>
                <li><a href="{{asset('blog')}}"@if($tabname == 'blog') class="active" @endif>Blogs</a></li>
                <li><a href="{{asset('faq')}}"@if($tabname == 'faq') class="active" @endif>FAQ</a></li>
                <li><a href="{{asset('contact')}}"@if($tabname == 'contact') class="active" @endif>Contact Us</a></li>
                {{-- <li><a href="{{asset('blogdetails')}}"@if($tabname == 'blogdetails') class="active" @endif>Blog Detail</a></li> --}}
              </ul>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 flexCol">
           <div class="nav_search">
            <input type="text" placeholder="search here">
            <button type="button"><img src="{{asset('images/search_icon.png')}}"></button>
           </div>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
           <div class="nav_login">
            <a href="Javascript:void(0)" class="btn_pink" data-toggle="modal" data-target="#modal1">login</a>
           </div>
          </div>
        </div>
      </div>
    </div>
  </header>
