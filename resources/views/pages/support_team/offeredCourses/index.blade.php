@extends('layouts.master')
@section('page_title', 'Offered Courses')
@section('content')


    <div class="card">
        <div class="card-header header-elements-inline">
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <h3>These Courses are offered for this semester Click To Register</h3>
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">CURRENT SEMESTER
                    </a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-classes">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>Time</th>
                            <th>Course Name</th>
                            <th>Faculty Name</th>
                            <th>Register</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Sample Wed 8:30 - 13</td>
                            <td>Sample Data Science</td>
                            <td>Sample Faculty name</td>
                            <td>
                                <a href="#">
                                    Sample register now </a>
                            </td>
                        </tr>
                        @foreach($courses as $course)
                            <tr>

                                @if($course->time_slot == null || $course->time_slot == '')
                                    <td>Not Assign</td>
                                @else
                                    <td>{{$course->time_slot}}</td>
                                @endif
                                @if($course->name)
                                <td> {{$course->name}}{{$course->id}}</td>
                                    @else
                                        <td> Course </td>

                                    @endif
                                    @if(isset($course->teachers->name))
                                <td> {{$course->teachers->name}}</td>
                                        @else
                                        <td>Teacher Not Assign Yet</td>
                                    @endif
                                    <td>
                                        <a href="{{route('students.course_register.store',\App\Helpers\Qs::hash($course->id))}}">
                                            register now </a>
                                    </td>
{{--                                @endif--}}


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="new-class">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
