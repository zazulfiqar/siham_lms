@extends('layouts.master')
{{--@section('page_title', 'Student Information - '.$my_class->name)--}}
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Survey List</h6>
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
            </ul>
            <form  method="post" enctype="multipart/form-data" class="wizard-form steps-validation" action="{{ route('students.surveyStore') }} "  data-fouc>
                @csrf
                @method('post')
                <?php $count=1; ?>
                <form action="{{ route('students.surveyStore') }} "  method="POST">
                    {{ csrf_field() }}
                <?php
                 $count=1;
                ;?>

                <div class="wrapper bg-white rounded">
                    <div class="content">
                        @foreach($survay as $sur)
                        <input type="hidden" name="studentId" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="question_id[{{$count}}]" value="{{ $sur->id }}">

                        <p class="text-justify h5 pb-2 font-weight-bold"> {{ $loop->iteration }} {{ $sur->question }} </p>
                        <div class="options py-3">
                            <label class="rounded p-2 option"> Excellent
                                 <input required type="radio"  name="answer[{{$count}}]" value="Excellent">
                                <span class="crossmark"></span>
                            </label>

                            <label class="rounded p-2 option"> Good
                                <input required type="radio" name="answer[{{$count}}]" value="Good">
                                <span class="checkmark"></span>
                            </label>

                            <label class="rounded p-2 option"> Average
                                <input required type="radio" name="answer[{{$count}}]" value="Average">
                            </label>
                            <?php $count++; ?>
                        </div>
                        @endforeach
                    </div>
                    @if(!$survay->isEmpty())
                    <input type="submit" class="btn btn-primary" value="Submit form">
                    @else
                    Empty Survey List
                    @endif

                </div>
            </form>
        </div>
    </div>
@endsection


