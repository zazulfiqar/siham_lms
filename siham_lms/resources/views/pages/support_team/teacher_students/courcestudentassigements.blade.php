@extends('layouts.master')
@section('page_title', 'My Students')
@section('content')

<style>
    h6.card-title {
    background-color: #f41043;
    color: azure;
    text-align: center;
}
</style>
    <div class="card">

        {{--        {{dd($courses)}}--}}
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Course Details</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        
        <div class="card-body">
            <!-- <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#manage-course" class="nav-link" data-toggle="tab">Manage Students click
                        here</a>
                </li>

            </ul> -->
            <div class="tab-content">

               
                   

                <div class="tab-pane show active"  id="manage-course">
              
                
                    <h6 class="card-title">Assignment</h6>
                    <table class="table datatable-button-html5-columns">
                        <thead>
                            <tr>
                                <th style="width: 10%">S/N</th>
                                <th>Topic</th>
                                <th>Course</th>
                                <th>Class</th>
                                <th>Term</th>
                                <th>File</th>
                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                
                            @foreach($assignments as $assignment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                
                                <td> @if(isset($assignment->topic))
                                        {{$assignment->topic}}
                                    @else
                                        not assign
                                    @endif</td>
                
                                <td>
                                    @if(isset($assignment->courses->name))
                                        {{$assignment->courses->name}}
                                    @else not assign
                                    @endif</td>
                                <td>
                                    @if(isset($assignment->class->name))
                                        {{$assignment->class->name}}
                                    @else
                                        not assign
                                    @endif
                                </td>
                
                                <td>  @if(isset($assignment->term)) {{$assignment->term}} @else not assign @endif</td>
                
                                <td>  @if(isset($assignment->file))
                                        <a href="{{asset('siham_lms/storage/app/public/'.$assignment->file)}}" target="_blank">Download
                                            file</a>
                                    @else
                                        No file
                                    @endif
                                </td>
                
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                {{--                                                edit--}}
                                                @if(Qs::userIsTeamSAT())
                                                    <a href="{{ route('teacher_assignment.edit', Qs::hash($assignment->id)) }}"
                                                       class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                @endif
                                                {{--                                                Delete--}}
                                                @if(Qs::userIsTeamSAT())
                                                    <a id="{{ $assignment->id }}"
                                                       href="{{ route('teacher_assignment.show', Qs::hash($assignment->id)) }}"
                                                       class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <h6 class="card-title">Assign Students</h6> --}}
           


                {{--                @endforeach--}}
            </div>


        </div>
    </div>


    
    {{--subject List Ends--}}
@endsection
