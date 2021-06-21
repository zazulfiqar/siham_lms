<footer>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12 center">
          <div class="footerText">
            @php $frontDynamic = App\Models\homepagefront::all(); @endphp
            <h4 >
                @foreach($frontDynamic as $frontDynami )
                        {{ $frontDynami->contact_topic }}
                        @endforeach
            </h4>
            <p >
                @foreach($frontDynamic as $frontDynami )
                        {{ $frontDynami->contact_content }}
                        @endforeach
                <a href="{{asset('register')}}">Online Contact Form</a></p>
            @php $contactsPhone = App\Models\Setting::where('id','6')->get() @endphp
            <span><a class="fa fa-phone" aria-hidden="true"></a></span> &nbsp;
            @foreach($contactsPhone as $contactsPhon)
                <a href="{{$contactsPhon->description}}" >{{$contactsPhon->description}}</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="copyRight">
      <div class="container">
        <div class="row flexRow">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <p>Designed by designnortex © 2021. All rights reserved.</p>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <ul class="list-inline pull-right socialIcons">
                <li><a href="https://www.facebook.com/spacElearn.gp"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCcJ9LINQa7yXsAWjw0DkIPQ"><i class="fa fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--Footer Content End-->
  <div class="login_popup">
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="login_popupForm">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="popup_logo">
                <img src="{{asset('images/logo.png')}}" alt="img">
              </div>
              <h2>Log In Now</h2>
              <P>Choose from 130,000 online video courses with new additions published every month</P>
              <form class="login-form " method="post" action="{{ route('login') }}">
                @csrf
                @if ($errors->any())
                                <div class="alert alert-danger alert-styled-left alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                    <span class="font-weight-semibold">Oops!</span> {{ implode('<br>', $errors->all()) }}
                                </div>
                                @endif
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input type="email" placeholder="Enter your Email" name="identity" value="{{ old('identity') }}" >
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input type="password" name="password" placeholder="Enter your Password">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="Remeber_div">
                      <label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remeber Me
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="forget_div">
                      <a href="{{ route('password.request') }}">Forgot Password</a>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input type="submit" value="Log In">
                  </div>
                </div>
                <div class="already_text">
                  <span>Do You Already Have An Account? <br>

                    <a href="{{asset('register')}}">Register now as a Student</a>
<br>
                    <a href="{{asset('teacherRegister')}}">Register now as a Teacher</a></span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
