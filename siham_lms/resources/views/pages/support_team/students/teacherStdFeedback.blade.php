@extends('layouts.master')
@section('page_title', 'View Students Feedback')
@section('content')
    <div class="card">

        {{--        {{dd($courses)}}--}}
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Students Opted Your Course</h6>
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#manage-course" class="nav-link" data-toggle="tab">Manage Students click
                        here</a>
                </li>

            </ul>
            <div class="tab-content">
                <h1>List of students </h1>
                <div class="tab-pane show active" id="manage-course">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Course Name</th>
                            <th>Student Name</th>
                            <th>Feedback</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--                        {{dd($courseReg)}}--}}

                        @foreach($courseReg as $courReg)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @if(isset($courReg->courses->id))
                                    <td>{{$courReg->courses->name}}</td>
                                @else
                                    <td>no name</td>
                                @endif

                                @if($courReg->users->name)
                                    <td>{{$courReg->users->name}}</td>
                                @else
                                    <td>{{$courReg->user_id}}</td>
                                @endif
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal{{$courReg->id}}">
                                        view Feedback
                                    </button>
                                    <a href="{{'students/show_online_paper_result?id='.$courReg->user_id}}" class="btn btn-primary">Result</a>
                                </td>

                                <div class="modal fade" id="exampleModal{{$courReg->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        {{--                                            $std_surveys  = DB::table('student_surveys')->where('std_id',$courReg->user_id)->get();
                                        --}}
                                        @php
                                            $std_surveys  = \App\Models\StudentSurvey::where('std_id',$courReg->user_id)->get();
                                        @endphp
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{--                                                <table>--}}
                                                {{--                                                    <tr>--}}
                                                {{--                                                        <th>--}}
                                                {{--                                                        <td>question</td>--}}
                                                {{--                                                        <td>answer</td>--}}
                                                {{--                                                        </th>--}}
                                                {{--                                                    </tr>--}}
                                                @foreach($std_surveys as $std_survey)
                                                    <ul>
{{--                                                        @if(isset($std_survey->std_evalutaions->question))--}}
{{--                                                            <li>{{dd($std_survey->std_evalutaions)}}</li>--}}
{{--                                                        @else--}}



                                                            @php
                                                             $std_surveys_ques  = \App\Models\StudentEvaluation::where('id',$std_survey->question_id)->get();
                                                            @endphp


                                                            <li>
                                                                @foreach($std_surveys_ques as $std_surveys_que)
                                                                Question No:{{$std_survey->question_id}} :- {{ $std_surveys_que->question }}

                                                                <br>
                                                                Answer:-  {{$std_survey->answer}}
                                                                 <br><br>
                                                                 @endforeach
                                                            </li>






{{--                                                        @endif--}}

                                                    </ul>
                                                @endforeach
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{--                @endforeach--}}
            </div>


        </div>
    </div>



    <!-- Modal -->

    {{--subject List Ends--}}
@endsection
