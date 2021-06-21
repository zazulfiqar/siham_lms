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
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$course->time_slot}}</td>
                                <td>{{$course->name}}</td>
                                <td>{{$course->student_name}}</td>
                                <td>{{$course->student_email}}</td>

{{--                                <td>{{$course->name}}</td>--}}
{{--                                @if(isset($course->classes->name))--}}
{{--                                    <td>{{$course->classes->name}}</td>--}}
{{--                                @else--}}
{{--                                    <td>not assign</td>--}}
{{--                                @endif--}}
                                <td>{{$course->code}}</td>
                                <td>{{$course->description}}</td>
{{--                                <td class="text-center">--}}
{{--                                    <div class="list-icons">--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <a href="#" class="list-icons-item" data-toggle="dropdown">--}}
{{--                                                <i class="icon-menu9"></i>--}}
{{--                                            </a>--}}
{{--                                            <div class="dropdown-menu dropdown-menu-left">--}}
{{--                                                edit--}}
{{--                                                @if(Qs::userIsTeamSA())--}}
{{--                                                    <a href="{{ route('teacher.scheduleAClass.edit', Qs::hash($s->id)) }}"--}}
{{--                                                       class="dropdown-item"><i class="icon-pencil"></i> Edit</a>--}}
{{--                                                @endif--}}
{{--                                                Delete--}}
{{--                                                @if(Qs::userIsSuperAdmin())--}}
{{--                                                    <a id="{{ $s->id }}" onclick="confirmDelete(this.id)" href="#"--}}
{{--                                                       class="dropdown-item"><i class="icon-trash"></i> Delete</a>--}}
{{--                                                    <form method="post" id="item-delete-{{ $s->id }}"--}}
{{--                                                          action="{{ route('teacher.scheduleAClass.destroy', Qs::hash($s->id)) }}"--}}
{{--                                                          class="hidden">@csrf @method('post')</form>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
                            </tr>
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
