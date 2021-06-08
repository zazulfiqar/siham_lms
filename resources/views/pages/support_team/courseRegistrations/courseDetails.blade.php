@extends('layouts.master')
@section('page_title', 'Registerated Courses ')
@section('content')







    <div class="card">
        <div class="container">
            <div class="card-header header-elements-inline">
                {{--            <h6 class="card-title">Current Semester</h6>--}}
                {!! Qs::getPanelOptions() !!}
            </div>

            @php $topics=DB::table('courses_study_plan')->where('course_id',$details->course_id)->get();
            @endphp

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card flex-row flex-wrap">
                    <div class="card-footer w-100 text-muted">
                        Course Topics
                    </div>
                    @foreach($topics as $dbs)
                        <br>
                            <div class="card-block px-2">
                                <h5 class="card-title">{{ $dbs->name }}</h5>
                                <p class="card-text">{{ $dbs->study_plan }}</p>
                            </div>
                        <div class="w-100"></div>
                    @endforeach
                </div>
            </div>
            @php $assignments=DB::table('teacher_assignments')->where('course_id',$details->course_id)->get();
            @endphp
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card flex-row flex-wrap">
                    <div class="card-footer w-100 text-muted">
                        Assignments
                    </div>
                    @foreach($assignments as $assign)
                        <br>
                            <div class="card-block px-2">
                                <h5 class="card-title">{{ $assign->topic }}</h5>
                                <p class="card-text">{{ $assign->description }}</p>

                                <p class="card-text"><a href="{{asset('siham_lms/storage/app/public/'.$assign->file )}}" target="_blank">Download
                                    file</a></p>
                            </div>
                        <div class="w-100"></div>
                    @endforeach
                </div>
            </div>
            @php $lactures=DB::table('lectures')->where('course_id',$details->course_id)->get();
            @endphp

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card flex-row flex-wrap">
                    <div class="card-footer w-100 text-muted">
                        Lactures
                    </div>
                    @foreach($lactures as $lac)
                        <br>
                            <div class="card-block px-2">
                                <h5 class="card-title">{{ $lac->topic }}</h5>
                                <p class="card-text">{{ $lac->description }}</p>
                                <p class="card-text">
                                    <a href="{{asset('siham_lms/storage/app/public/'.$lac->file )}}" target="_blank">Download
                                        file</a>
                                    </p>
                                {{-- <p class="card-text">{{ $lac->file }}</p> --}}
                            </div>
                        <div class="w-100"></div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>

@endsection
