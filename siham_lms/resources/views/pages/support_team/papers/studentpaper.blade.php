@extends('layouts.master')
{{--@section('page_title', 'Student Information - '.$my_class->name)--}}
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Online Exam</h6>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
        </ul>
        <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation"
                  action="{{ route('std_paper.paper.store') }} " data-fouc>
                @csrf
                @method('post')
                <?php $count = 1; ?>
                {{ csrf_field() }}
            <div class="wrapper bg-white rounded">
                <div class="content">
                    @foreach($paperQuestions as $paperQues)
                    <input type="hidden" name="studentId" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="question_id[{{$count}}]" value="{{ $paperQues->id }}">
                    <input type="hidden" name="paper_id" value="{{$paperQues->paper_id}}">

                    <p class="text-justify h5 pb-2 font-weight-bold"> {{ $loop->iteration }} {{ $paperQues->question }} </p>
                    <div class="options py-3">
                        <label class="rounded p-2 option">
                            <input required type="radio"  name="answer[{{$count}}]" value="1"> {{ $paperQues->choice1 }}
                            <span class="crossmark"></span>
                        </label>

                        <label class="rounded p-2 option">
                            <input required type="radio" name="answer[{{$count}}]" value="2"> {{ $paperQues->choice2 }}
                            <span class="checkmark"></span>
                        </label>

                        <label class="rounded p-2 option">
                            <input required type="radio" name="answer[{{$count}}]" value="3"> {{ $paperQues->choice3 }}
                        </label>

                        <label class="rounded p-2 option">
                            <input required type="radio" name="answer[{{$count}}]" value="4"> {{ $paperQues->choice4 }}
                        </label>
                        <?php $count++; ?>
                    </div>
                    @endforeach
                </div>
                @if(!$paperQuestions->isEmpty())
                <input type="submit" class="btn btn-primary" value="Submit form">
                @else
                Empty Table
                @endif

            </div>
        </form>
    </div>
</div>


@endsection


