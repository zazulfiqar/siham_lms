@extends('layouts.master')
@section('page_title', 'My Students')
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
                <div class="tab-pane show active"  id="manage-course">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Time Slot</th>
                            <th>Course Name</th>
                            <th>Student Name</th>
                            <th>Student Email</th>
                            <th>Code</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($courses as $course)
                            <!-- @if($course->courses_id==31)     -->
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$course->time_slot}}</td>
                                    <td>{{$course->id}} {{$course->name}}</td>
                                    <td>{{$course->student_name}}</td>
                                    <td>{{$course->student_email}}</td>


                                    <td>{{$course->code}}</td>
                                    <td>{{$course->description}}</td>
                                </tr>
                            
                            <!-- @endif -->
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{--                @endforeach--}}
            </div>


        </div>
    </div>
    {{--subject List Ends--}}
@endsection
