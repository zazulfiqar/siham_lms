@extends('layouts.master')
@section('page_title', 'Uploaded Assignment Here by Teacher')
@section('content')




    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Uploaded Assignment</h6>
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#manage-course" class="nav-link" data-toggle="tab">All Assignment
                        Material</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="manage-course">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Course Name</th>
                            <th>Class Name</th>
                            <th>Topic</th>
                            <th>Description</th>
                            <th>file</th>
                            <th>Upload File</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($assignments as $assignment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @if(isset($assignment->courses->name))
                                    <td>{{$assignment->courses->name}}</td>
                                @else
                                    <td>{{$assignment->course_id}}</td>

                                @endif
                                @if(isset($assignment->class->name))
                                    <td>{{$assignment->class->name}}</td>
                                @else
                                    <td></td>
                                @endif

                                @if(isset($assignment->topic))
                                    <td>{{$assignment->topic}}</td>
                                @else
                                    <td>no-topic</td>
                                @endif

                                @if(isset($assignment->description))

                                    <td>{{$assignment->description}}</td>
                                @else
                                    <td>no-desc</td>
                                @endif
                                @if(isset($assignment->file))
                                    <td><a href="{{url('/siham_lms/storage/app/public/'.$assignment->file	)}}" target="_blank">Download
                                            file</a></td>
                                @else
                                    <td>No file</td>
                                @endif

                                @php
                                    $stdAssignmentStatus =\App\Models\StudentAssignment::where('assignment_id',$assignment->id)->get();
                                @endphp
                                @if(count($stdAssignmentStatus)>0)
                                    <td > <a href="javascript:void(0)"> Submitted </a></td>
                                @else
                                    <td>
                                        <form class="" method="post" id="form"
                                              action="{{ route('student_assignment.store') }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('post')
                                            <input type="file" name="file" id="file">

                                            <input type="hidden" name="assignment_id" value="{{$assignment->id}}">
                                        </form>
                                    </td>
                                @endif

                               
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>document.getElementById("file").onchange = function () {
            document.getElementById("form").submit();
        };</script>
@endsection
