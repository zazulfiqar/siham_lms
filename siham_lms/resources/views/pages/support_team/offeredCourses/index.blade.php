@extends('layouts.master')
@section('page_title', 'Offered Courses')
@section('content')
<style>
.registerNowBtnDiv {
    /* margin: 20px; */
    text-align: center;
    background-color: #f41043;
    margin: 12px;
    color: white;
    text-decoration: none;
    border-radius: 10px;
    /* height: 30px; */
    padding: 12px;
}
a.registerNowBtn {
    color: white;
}
</style>
<div class="card">
    <div class="card-header header-elements-inline">
        {{--            <h6 class="card-title">Current Semester</h6>--}}
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <section class="page-contain">
            <div class="row">
                @foreach($courses as $course)
                <div class="col-md-3">
                    <a href="#" class="data-card">
                        <h3>@if($course->code == null || $course->code == '')
                            Not Assign
                        @else
                            {{$course->code}}
                        @endif</h3>
                        <h4>
                            @if($course->name)
                                 {{$course->name}}{{$course->id}}
                            @else
                                 Course
                            @endif
                        </h4>
                        <p>

                        </p>
                        <span class="link-text">
                            @if(isset($course->teachers->name))
                            <td> {{$course->teachers->name}}</td>
                                    @else
                                    <td>Teacher Not Assign Yet</td>
                                @endif
                        <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z" fill="#753BBD"/>
                    </svg>
                        </span>
                    </a>
                    <div class="registerNowBtnDiv">
                        <a class="registerNowBtn" href="{{route('students.course_register.store',\App\Helpers\Qs::hash($course->id))}}">
                            Register Now
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
          </section>
    </div>
</div>






@endsection
