@extends('layouts.master')
@section('page_title', 'My Dashboard')
@section('content')

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

{{--    {{dd('in student if')}}--}}

    <style>
        .card1 {
            height: 486px!important;
            min-height: 486px!important;
        }
        .card1 .card-body {
            height: 200px;
            overflow-x: hidden;
        }
        .card2{
            height: 233px;

        }
        .card2 .card-body{
            height: 200px;
            overflow-x: hidden;

        }
        .card .card-header h3 {
            border-bottom: 2px solid #f41043;
            display: block;
            font-size: 20px;
            line-height: 25px;
            padding: 0 0 10px;
            color: #000;
        }
        .card {
            border: 2px solid #f41043!important;
        }
        .card p{
            color: #000;
        }
        .card h5{
            color: #000;
        }

    </style>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="card card1 border-primary mb-3" >
                <div class="card-header"><h3>MY LATEST UPDATES</h3></div>
                <div class="card-body text-primary">
                    @foreach($student_updates as $su)
                    <h5 class="card-title">{{$su->title}}</h5>
                    <p class="card-text"> {{$su->details}}.</p>
                    @endforeach
{{--                    <p class="card-text">NOTE: Your Face 2 Face class of DEEP LEARNING) is scheduled tomorrow (14/11/2020)--}}
{{--                        at 06:30 pm at Main Campus in Room 206.--}}
{{--                        In case students choose not to take class, they can take it online through Blackboard..</p>--}}
{{--                    <p class="card-text">NOTE: Your Face 2 Face class of DEEP LEARNING) is scheduled tomorrow (14/11/2020)--}}
{{--                        at 06:30 pm at Main Campus in Room 206.--}}
{{--                        In case students choose not to take class, they can take it online through Blackboard..</p>--}}
{{--                    <p class="card-text">NOTE: Your Face 2 Face class of DEEP LEARNING) is scheduled tomorrow (14/11/2020)--}}
{{--                        at 06:30 pm at Main Campus in Room 206.--}}
{{--                        In case students choose not to take class, they can take it online through Blackboard..</p>--}}
{{--                    <p class="card-text">NOTE: Your Face 2 Face class of DEEP LEARNING) is scheduled tomorrow (14/11/2020)--}}
{{--                        at 06:30 pm at Main Campus in Room 206.--}}
{{--                        In case students choose not to take class, they can take it online through Blackboard..</p>--}}
{{--                    <p class="card-text">NOTE: Your Face 2 Face class of DEEP LEARNING) is scheduled tomorrow (14/11/2020)--}}
{{--                        at 06:30 pm at Main Campus in Room 206.--}}
{{--                        In case students choose not to take class, they can take it online through Blackboard..</p>--}}
{{--                    <p class="card-text">NOTE: Your Face 2 Face class of DEEP LEARNING) is scheduled tomorrow (14/11/2020)--}}
{{--                        at 06:30 pm at Main Campus in Room 206.--}}
{{--                        In case students choose not to take class, they can take it online through Blackboard..</p>--}}
{{--                    <p class="card-text">NOTE: Your Face 2 Face class of DEEP LEARNING) is scheduled tomorrow (14/11/2020)--}}
{{--                        at 06:30 pm at Main Campus in Room 206.--}}
{{--                        In case students choose not to take class, they can take it online through Blackboard..</p>--}}
{{--                    <p class="card-text">NOTE: Your Face 2 Face class of DEEP LEARNING) is scheduled tomorrow (14/11/2020)--}}
{{--                        at 06:30 pm at Main Campus in Room 206.--}}
{{--                        In case students choose not to take class, they can take it online through Blackboard..</p>--}}
{{--                    <p class="card-text">NOTE: Your Face 2 Face class of DEEP LEARNING) is scheduled tomorrow (14/11/2020)--}}
{{--                        at 06:30 pm at Main Campus in Room 206.--}}
{{--                        In case students choose not to take class, they can take it online through Blackboard..</p>--}}
{{--                    <p class="card-text">NOTE: Your Face 2 Face class of DEEP LEARNING) is scheduled tomorrow (14/11/2020)--}}
{{--                        at 06:30 pm at Main Campus in Room 206.--}}
{{--                        In case students choose not to take class, they can take it online through Blackboard..</p>--}}
{{--                    <p class="card-text">NOTE: Your Face 2 Face class of DEEP LEARNING) is scheduled tomorrow (14/11/2020)--}}
{{--                        at 06:30 pm at Main Campus in Room 206.--}}
{{--                        In case students choose not to take class, they can take it online through Blackboard..</p>--}}
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="">
                <div class="card card2 border-primary mb-3" >
                    <div class="card-header"><h3>INSTRUCTIONS</h3></div>
                    <div class="card-body text-primary">
                        @foreach($student_instructions as $si)
                        <h5 class="card-title">{{$si->title}}</h5>
                        <p class="card-text"> {{$si->details}}.</p>
                        @endforeach
{{--                        <p class="card-text"> This email be used for all university related activity including the--}}
{{--                            Online Class via Blackboard.</p>--}}
{{--                        <p class="card-text"> Don't share your Password with anyone.</p>--}}
{{--                        <p class="card-text"> Use this above credential to activate your email address.</p>--}}
{{--                        <p class="card-text"> This email be used for all university related activity including the--}}
{{--                            Online Class via Blackboard.</p>--}}
{{--                        <p class="card-text"> Don't share your Password with anyone.</p>--}}
{{--                        <p class="card-text"> Use this above credential to activate your email address.</p>--}}
{{--                        <p class="card-text"> This email be used for all university related activity including the--}}
{{--                            Online Class via Blackboard.</p>--}}
{{--                        <p class="card-text"> Don't share your Password with anyone.</p>--}}
{{--                        <p class="card-text"> Use this above credential to activate your email address.</p>--}}
{{--                        <p class="card-text"> This email be used for all university related activity including the--}}
{{--                            Online Class via Blackboard.</p>--}}
{{--                        <p class="card-text"> Don't share your Password with anyone.</p>--}}
                    </div>
                </div>

                <div class="card card2 border-primary mb-3" >
                    <div class="card-header"><h3>NOTIFICATIONS </h3></div>
                    <div class="card-body text-primary">
                        @foreach($student_notifications as $sn)
                        <h5 class="card-title">{{$sn->title}}</h5>
                        <p class="card-text"> {{$sn->details}}.</p>
                        @endforeach
{{--                        <p class="card-text"> This email be used for all university related activity including the--}}
{{--                            Online Class via Blackboard.</p>--}}
{{--                        <p class="card-text"> Don't share your Password with anyone.</p>--}}
{{--                        <p class="card-text"> Use this above credential to activate your email address.</p>--}}
{{--                        <p class="card-text"> This email be used for all university related activity including the--}}
{{--                            Online Class via Blackboard.</p>--}}
{{--                        <p class="card-text"> Don't share your Password with anyone.</p>--}}
{{--                        <p class="card-text"> Use this above credential to activate your email address.</p>--}}
{{--                        <p class="card-text"> This email be used for all university related activity including the--}}
{{--                            Online Class via Blackboard.</p>--}}
{{--                        <p class="card-text"> Don't share your Password with anyone.</p><p class="card-text"> Use this above credential to activate your email address.</p>--}}
{{--                        <p class="card-text"> This email be used for all university related activity including the--}}
{{--                            Online Class via Blackboard.</p>--}}
{{--                        <p class="card-text"> Don't share your Password with anyone.</p>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endif

    @if(Qs::userIsTeacher())
{{--        {{dd('in teacher if')}}--}}
    <style>
        .card1 {
            height: 486px!important;
            min-height: 486px!important;
        }
        .card1 .card-body {
            height: 200px;
            overflow-x: hidden;
        }
        .card2{
            height: 233px;

        }
        .card2 .card-body{
            height: 200px;
            overflow-x: hidden;

        }
        .card .card-header h3 {
            border-bottom: 2px solid #f41043;
            display: block;
            font-size: 20px;
            line-height: 25px;
            padding: 0 0 10px;
            color: #000;
        }
        .card {
            border: 2px solid #f41043!important;
        }
        .card p{
            color: #000;
        }
        .card h5{
            color: #000;
        }

    </style>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="card card1 border-primary mb-3" >
                <div class="card-header"><h3>MY LATEST UPDATES</h3></div>
                <div class="card-body text-primary">
                    @foreach($teacher_updates as $tu)
                        <h5 class="card-title">{{$tu->title}}</h5>
                        <p class="card-text"> {{$tu->details}}.</p>
                    @endforeach
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
    Events Calendar Ends
    @endsection
