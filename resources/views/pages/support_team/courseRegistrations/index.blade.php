@extends('layouts.master')
@section('page_title', 'Registerated Courses ')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            {{--            <h6 class="card-title">Current Semester</h6>--}}
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <h3>These are the registered courses for this semester</h3>
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

                                {{-- <td>{{ $courseReg->course->name }}</td> --}}
                                <td></td>

                            </tr>
                        @endforeach

                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


@endsection
