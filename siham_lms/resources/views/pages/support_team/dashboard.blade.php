@extends('layouts.master')
@section('page_title', 'My Dashboard')
@section('content')
<style>
.card-block {
    padding: 12px;
}
div#headingOne {
    padding: 0px;
    background-color: #fafafa;
    color: white !important;
    text-decoration: none;
}

</style>
    @if(Qs::userIsTeamSA())
       <div class="row">
           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-blue-400 has-bg-image cardborderset">
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
               <div class="card card-body bg-danger-400 has-bg-image cardborderset">
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


    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card flex-row flex-wrap" >
            <div class="card-footer w-100 text-muted">
                <i class="fa fa-clock-o" aria-hidden="true"></i>   Privacy Policy
            </div>
            @foreach($policy as $policysingle)
                <div class="card-body cardborderset">
                    <p>{{  $policysingle->policy }}</p>
                </div>
            @endforeach
        </div>
    </div>



    <div class="col-md-8 col-sm-12 col-xs-12">

                        <div class="card flex-row flex-wrap">
                            <div class="card-footer w-100 text-muted">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>   Class Schedule
                            </div>

                                @foreach($schedule as $s)

                                <div class="schedule">
                                    <div class="schedule_inner">@if(isset($s->course_id))
                                        @php
                                            $papersData  = \App\Models\Courses::where('id',$s->course_id)->first();
                                        @endphp
                                    @else
                                        No Course
                                    @endif
                                </div>
                                    <div class="link_zoom"><a target="_blank" href="{{ $s->zoom_link }}">{{ $s->zoom_link }} </a></div>
                                    <div class="time">{{ $s->time }} </div>
                                </div>
                                @endforeach
                        </div>

                <div class="card flex-row flex-wrap">
                    <div class="card-footer w-100 text-muted">
                        My Registerd Courses
                    </div>
                <div class="card-body cardborderset">
                    <section class="page-contain">
                        <div class="row">
                            @foreach ($CourseRegisterd as $courseReg )
                            <div class="col-md-6">
                                <a href="#" class="data-card">

                                    <h3>@if($courseReg->time_slot)
                                        <td>{{$courseReg->time_slot}}
                                    @else
                                        <td>Time Not Allot</td>
                                    @endif</h3>
                                    <h4>{{$courseReg->name}} </h4>
                                    <p>{{$courseReg->code}}</p>
                                    <span class="link-text">
                                        @php
                                        $teacher_name =  \App\Models\Teacher::where('id',$courseReg->teacher_id)->value('name');
                                    @endphp
                                    @if($teacher_name)
                                    {{$teacher_name}}
                                    @else
                                    Teacher Not Showing
                                    @endif


                                    <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z" fill="#753BBD"/>
                                </svg>
                                    </span>
                                    <br>

                                    <form class="" method="post" action="{{ route('students.courcestudentDetails') }}"
                            enctype='multipart/form-data'>
                          @csrf
                          @method('post')
                          <input type="hidden" value="{{$courseReg->id}}" name="course_id">
                            <input type="submit" Value="Details" class="btn DescriptionBtNCourse">
                        </form>
                                </a>
                            </div>

                            {{-- <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    @php $db=DB::table('courses_study_plan')->where('course_id',25)->get();


                                    @endphp
                                @foreach($db as $dbs)

                                    {{ $dbs->study_plan }}
                                    <br>
                                @endforeach
                                </div>
                              </div> --}}
                            @endforeach
                        </div>


                    </section>
                </div>
                </div>


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
                </div>
                <div class="w-100"></div>

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
                </div>
                <div class="w-100"></div>

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

                </div>
                <div class="w-100"></div>

            @endforeach
        </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card flex-row flex-wrap">
                <div class="card-footer w-100 text-muted">
                    Assignments
                </div>
                <div id="accordion">

                @foreach($assignmentsget as $index=>$assignment)

                      <div class="card-header card-footer w-100 text-muted" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#index{{ $index+1 }}" aria-expanded="true" aria-controls="collapseOne">
                            {{$assignment->topic}}
                          </button>
                        </h5>
                      </div>

                      <div id="index{{ $index+1 }}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body cardborderset">
                            {{$assignment->description}}
                        </div>
                      </div>

                  @endforeach

                </div>
        </div>
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

            @endforeach
        </div>
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

            @endforeach
        </div>
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


