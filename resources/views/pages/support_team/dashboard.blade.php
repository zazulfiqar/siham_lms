@extends('layouts.master')
@section('page_title', 'My Dashboard')
@section('content')
<style>
.card-block {
    padding: 12px;
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
                <i class="fa fa-clock-o" aria-hidden="true"></i>   Class Schedule
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

<div class="card flex-row flex-wrap">
    <div class="card-footer w-100 text-muted">
        My Registerd Courses
    </div>
<div class="card-body">
    <section class="page-contain">
        <div class="row">
            @foreach ($CourseRegisterd as $courseReg )
            <div class="col-md-4">
                <a href="#" class="data-card">
                    <h3>@if($courseReg->time_slot)
                        <td>{{$courseReg->time_slot}}
                    @else
                        <td>Time Not Allot</td>
                    @endif</h3>
                    <h4>{{$courseReg->name}}</h4>
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
                </a>
            </div>
            @endforeach
        </div>

      </section>
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

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card flex-row flex-wrap">
                <div class="card-footer w-100 text-muted">
                    Assignments
                </div>
                <div id="accordion" role="tablist" class="o-accordion">
                    <div class="card">
                      <div class="card-header" role="tab" id="headingOne">
                        <h5 class="mb-0">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Collapsible Group Item #1
                          </a>
                        </h5>
                      </div>

                      <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-block">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" role="tab" id="headingTwo">
                        <h5 class="mb-0">
                          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Collapsible Group Item #2
                          </a>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="card-block">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" role="tab" id="headingThree">
                        <h5 class="mb-0">
                          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Collapsible Group Item #3
                          </a>
                        </h5>
                      </div>
                      <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="card-block">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                      </div>
                    </div>
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


