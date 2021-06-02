@extends('layouts.master')
@section('page_title', 'My Dashboard')
@section('content')
<style>

@media(max-width:992px){
 .wrapper{
  width:100%;
}
}
.panel-heading {
  padding: 0;
	border:0;
}
.panel-title>a, .panel-title>a:active{
	display:block;
	padding:15px;
  color:#555;
  font-size:16px;
  font-weight:bold;
	text-transform:uppercase;
	letter-spacing:1px;
  word-spacing:3px;
	text-decoration:none;
}
.panel-heading  a:before {
   font-family: 'Glyphicons Halflings';
   content: "\e114";
   float: right;
   transition: all 0.5s;
}
.panel-heading.active a:before {
	-webkit-transform: rotate(180deg);
	-moz-transform: rotate(180deg);
	transform: rotate(180deg);
}



.schedule {
    width: 649px;
    background-color: #eee;
    padding: 11px;
    margin: 3px auto;
    font-size: 18px;
    position: relative;
    border-left-width: 5px;
    border-left-style: solid;
    border-left-color: #e91e63;
}



.schedule::before {
  content: "";
  position: absolute;
  top: 50%;
  left: -25px;
  margin-top: -10px;
  border-color: transparent #e91e63 transparent transparent;
  border-width: 10px;
  border-style: solid;
}
.schedule_inner {
    font-size: 14px;
}
.link_zoom {
    font-size: 10px;
    color: #1d58ff;
}

.time {
    font-weight: 500;
    font-size: 14px;
}
</style>
    @if(Qs::userIsTeamSA())
       <div class="row">
           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-blue-400 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0">{{ $users->where('user_type', 'student')->count() }}</h3>
                           <span class="text-uppercase font-size-xs font-weight-bold">Total Students</span>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users4 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-danger-400 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0">{{ $users->where('user_type', 'teacher')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Teachers</span>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users2 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-success-400 has-bg-image">
                   <div class="media">
                       <div class="mr-3 align-self-center">
                           <i class="icon-pointer icon-3x opacity-75"></i>
                       </div>

                       <div class="media-body text-right">
                           <h3 class="mb-0">{{ $users->where('user_type', 'admin')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Administrators</span>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-indigo-400 has-bg-image">
                   <div class="media">
                       <div class="mr-3 align-self-center">
                           <i class="icon-user icon-3x opacity-75"></i>
                       </div>

                       <div class="media-body text-right">
                           <h3 class="mb-0">{{ $users->where('user_type', 'parent')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Parents</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       @endif

@if(Qs::userIsStudent())

<div class="row">

    <div class="col-md-8 col-sm-12 col-xs-12">

        <div class="card flex-row flex-wrap">
            <div class="card-footer w-100 text-muted">
                Class Schedule
            </div>

                @foreach($schedule as $s)

                <div class="schedule">
                    <div class="schedule_inner">@if(isset($s->course_id))
                        @php
                            $papersData  = \App\Models\Courses::where('id',$s->course_id)->first();
                        @endphp
                            {{ $papersData->name }}
                    @else
                        No Course
                    @endif
                </div>
                    <div class="link_zoom"><a target="_blank" href="{{ $s->zoom_link }}">{{ $s->zoom_link }} </a></div>
                    <div class="time">{{ $s->time }} </div>
                </div>
                @endforeach
        </div>



{{-- Schedule Work Start --}}




{{-- Schedule Work Over --}}


        <div class="wrapper center-block">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @foreach ($CourseRegisterd as $courseReg )
            <div class="panel panel-default">
              <div class="panel-heading active card-footer w-100 text-muted" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#idhere{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapseOne">
                    {{$courseReg->name}}
                  </a>
                </h4>
              </div>
              <div id="idhere{{ $loop->iteration }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    Topic
                    Course Name: {{$courseReg->name}}
                    <br>
                    Course Code: {{$courseReg->code}}
                    <br>
                     @php
                        $teacher_name =  \App\Models\Teacher::where('id',$courseReg->teacher_id)->value('name');
                    @endphp
                    Faculty:{{$teacher_name}}
                </div>
              </div>
            </div>
@endforeach


          </div>
          </div>



        {{-- <div class="tab-content">
            <div class="tab-pane fade show active" id="all-classes">
                <table class="table datatable-button-html5-columns">
                    <thead>
                    <tr>
                        <th>Time</th>
                        <th>Course Name</th>
                        <th>Code</th>
                        <th>Faculty Name</th>

                    </tr>
                    @foreach ($CourseRegisterd as $courseReg )
                        <tr>
                            @if($courseReg->time_slot)
                                <td>{{$courseReg->time_slot}}
                            @else
                                <td>Time not allot</td>
                            @endif
                            <td>{{$courseReg->name}}</td>

                                <td>{{$courseReg->code}}</td>
                            @php
                                $teacher_name =  \App\Models\Teacher::where('id',$courseReg->teacher_id)->value('name');
                            @endphp
                            <td>{{$teacher_name}}</td>


                            <td></td>

                        </tr>
                    @endforeach

                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div> --}}
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card flex-row flex-wrap">
                <div class="card-footer w-100 text-muted">
                    Instructions
                </div>
                @foreach($student_instructions as $si)
                <br>
                <div class="card-block px-2">
                    <h5 class="card-title">{{$si->title}}</h5>
                    <p class="card-text">{{$si->details}}</p>
                    <br>
                </div>
                <div class="w-100"></div>
            </div>
            @endforeach
        </div>
    </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card flex-row flex-wrap">
                <div class="card-footer w-100 text-muted">
                    Updates
                </div>
            @foreach($student_updates as $key =>$su)
                <br>
                <div class="card-block px-2">
                    <h5 class="card-title">{{$su->title}}</h5>
                    <p class="card-text">{{$su->details}}</p>
                    <br>
                </div>
                <div class="w-100"></div>
            </div>
            @endforeach
        </div>
    </div>



        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card flex-row flex-wrap">
                <div class="card-footer w-100 text-muted">
                    Notifications
                </div>
            @foreach($student_notifications as $key =>$sn)
                <br>
                <div class="card-block px-2">
                    <h5 class="card-title">{{$sn->title}}</h5>
                    <p class="card-text">{{$sn->details}}</p>
                    <br>
                </div>
                <div class="w-100"></div>
            </div>
            @endforeach
        </div>

    </div>





</div>

@endif

    @if(Qs::userIsTeacher())
{{--        {{dd('in teacher if')}}--}}
    <style>

    </style>

<div class="row">

    <div class="col-md-8 col-sm-12 col-xs-12">
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card flex-row flex-wrap">
                <div class="card-footer w-100 text-muted">
                    Instructions
                </div>
                @foreach($teacher_instructions as $ti)
                <br>
                <div class="card-block px-2">
                    <h5 class="card-title">{{$ti->title}}</h5>
                    <p class="card-text">{{$ti->details}}</p>
                    <br>
                </div>
                <div class="w-100"></div>
            </div>
            @endforeach
        </div>


        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card flex-row flex-wrap">
                <div class="card-footer w-100 text-muted">
                    Updates
                </div>
            @foreach($teacher_updates as $key =>$tu)
                <br>
                <div class="card-block px-2">
                    <h5 class="card-title">{{$tu->title}}</h5>
                    <p class="card-text">{{$tu->details}}</p>
                    <br>
                </div>
                <div class="w-100"></div>
            </div>
            @endforeach
        </div>



        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card flex-row flex-wrap">
                <div class="card-footer w-100 text-muted">
                    Notifications
                </div>
            @foreach($teacher_notifications as $key =>$tn)
                <br>
                <div class="card-block px-2">
                    <h5 class="card-title">{{$tn->title}}</h5>
                    <p class="card-text">{{$tn->details}}</p>
                    <br>
                </div>
                <div class="w-100"></div>
            </div>
            @endforeach
        </div>
    </div>





</div>


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="mb-3" >
                <div class="card-header"><h4>MY LATEST UPDATES</h4></div>
                <div class="card-body text-primary">
                    <div id="accordion">
                    @foreach($teacher_updates as $key =>$tu)
                        <div class="card">
                          <div class="card-header" id="{{$tu->title}}">
                            <h5 class="mb-0">
                              <label class="btn" data-toggle="collapse" data-target="#{{$key + 1}}" aria-expanded="true" aria-controls="collapseOne">

                                <h5 class="card-title">{{$tu->title}}</h5>
                              </label>
                            </h5>
                          </div>

                          <div id="{{$key + 1}}" class="collapse show" aria-labelledby="{{$tu->title}}" data-parent="#accordion">
                            <div class="card-body">
                                <p class="card-text"> {{$tu->details}}.</p>
                            </div>
                          </div>
                        </div>
                        @endforeach

                      </div>




                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="">
                <div class="card card2 border-primary mb-3" >
                    <div class="card-header"><h3>INSTRUCTIONS</h3></div>
                    <div class="card-body text-primary">
                        @foreach($teacher_instructions as $ti)
                            <h5 class="card-title">{{$ti->title}}</h5>
                            <p class="card-text"> {{$ti->details}}.</p>
                        @endforeach
                    </div>
                </div>

                <div class="card card2 border-primary mb-3" >
                    <div class="card-header"><h3>NOTIFICATIONS </h3></div>
                    <div class="card-body text-primary">
                        @foreach($teacher_notifications as $tn)
                            <h5 class="card-title">{{$tn->title}}</h5>
                            <p class="card-text"> {{$tn->details}}.</p>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>





    </div>


@endif

{{--
    Events Calendar Begins
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">School Events Calendar</h5>
         {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="fullcalendar-basic"></div>
        </div>
    </div>
    Events Calendar Ends --}}

    <script>
        $('.panel-collapse').on('show.bs.collapse', function () {
            $(this).siblings('.panel-heading').addClass('active');
          });

          $('.panel-collapse').on('hide.bs.collapse', function () {
            $(this).siblings('.panel-heading').removeClass('active');
          });
    </script>
    @endsection


