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
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#manage-course" class="nav-link" data-toggle="tab">Manage Students click
                        here</a>
                </li>

            </ul>
            <div class="tab-content">

                <a href="{{asset('teacher/courcestudentStudents?id='.$id)}}" class="form-control">Assign Students </a>
                <a href="{{asset('teacher/courcestudentassigements?id='.$id)}}" class="form-control">Assign Assignment </a>

                {{-- <h6 class="card-title">Assign Students</h6> --}}
           


                {{--                @endforeach--}}
            </div>


        </div>
    </div>


    
    {{--subject List Ends--}}
@endsection
