@extends('layouts.master')
@section('page_title', 'Uploaded Lectures Here by Teacher')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Uploaded Lectures</h6>
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#manage-course" class="nav-link" data-toggle="tab">All Learnng Material</a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="manage-course">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Course Name</th>
                            <th>Topic</th>
                            <th>Description</th>
                            <th>file</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lectures as $lecture)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{$lecture->course_id}}</td>
                                <td>{{$lecture->topic}}</td>
                                <td>{{$lecture->description}}</td>
                                @if($lecture->file)
                                <td><a href="{{asset('siham_lms/storage/app/public/'.$lecture->file)}}" target="_blank">Download
                                        file</a></td>
                                @else
                                    <td>No file</td>
                                @endif


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
@endsection
