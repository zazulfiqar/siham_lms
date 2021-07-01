@extends('layouts.master')
@section('page_title', 'My Courses')
@section('content')

<style>
    a.btn.DescriptionBtNCourse {
    position: absolute;
    bottom: 27px;
    left: 40px;
    background-color: #f41043;
    color: white;
}
</style>
<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Courses assigned to you</h6>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            {{-- <li class="nav-item"><a href="#new-course" class="nav-link active" data-toggle="tab">Add New
                    Class</a>--}}
                {{-- </li>--}}

            <li class="nav-item"><a href="#manage-course" class="nav-link" data-toggle="tab">Manage Courses click
                    here</a>
            </li>

        </ul>
        <div class="tab-content">

            <div class="tab-pane show active" id="manage-course">
                <table class="table datatable-button-html5-columns">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Time Slot</th>
                            <th>Course Name</th>
                            <th>Class Name</th>

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
                            @if(isset($course->classes->name))
                            <td>{{$course->classes->name}}</td>
                            @else
                            <td>not assign</td>
                            @endif
                            <td>{{$course->code}}</td>
                            <td>{{$course->description}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>


    </div>


    <div class="card-body cardborderset">
        <section class="page-contain">
            <div class="row">
                @foreach($courses as $course)
                <div class="col-md-6">
                    <a href="#" class="data-card">

                        <h3> {{$course->time_slot}}
                        </h3>
                        <h4>{{$course->name}}</h4>
                        <p>{{$course->code}}</p>
                        <span class="link-text">
                            Teacher Not Showing


                            <svg width="25" height="16" viewBox="0 0 25 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z"
                                    fill="#753BBD"></path>
                            </svg>
                        </span>
                        <br>


                        {{-- <form class="" method="get" action="{{route('teacher.courcestudentDetails')}}"
                            enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="W0ioJRAR5nayAZoJnh4WKI6MXCxHFl0SspY8BdPs"> <input
                                type="hidden" name="_method" value="post"> <input type="hidden" value="31"
                                name="course_id">
                            <input type="submit" value="Details" class="btn DescriptionBtNCourse">
                        </form> --}}
                        <a href="{{asset('teacher/courcestudentDetails?id='.$course->id)}}" class="btn DescriptionBtNCourse">Details</a>

                    </a>
                </div>

        @endforeach
            </div>


        </section>
    </div>



</div>

@endsection