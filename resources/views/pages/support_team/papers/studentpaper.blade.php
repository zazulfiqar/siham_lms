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
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="all-students">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th width="5%">S/N</th>
                                <th>Questions</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            <form action="{{ route('std_paper.paper.store') }} " method="POST">--}}
                                {{ csrf_field() }}
                                <?php
                                $count = 1;
                                ;?>
                                @foreach($paperQuestions as $paperQues)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $paperQues->question }} {{ $loop->iteration }}
                                            <table class="table datatable-button-html5-columns" >
                                                <tr>{{ $loop->iteration }}
                                                    <input type="hidden" name="studentId" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="question_id[{{$count}}]" value="{{ $paperQues->id }}">
<input type="hidden" name="paper_id" value="{{$paperQues->paper_id}}">
                                                    <td>
                                                        <input required type="radio"  name="answer[{{$count}}]" value="1"> {{ $paperQues->choice1 }}
                                                    </td>
                                                    <td>
                                                        <input required type="radio" name="answer[{{$count}}]" value="2">{{ $paperQues->choice2 }}
                                                    </td>
                                                    <td>
                                                        <input required type="radio" name="answer[{{$count}}]" value="3">{{ $paperQues->choice3 }}
                                                    </td>
                                                    <td>
                                                        <input required type="radio" name="answer[{{$count}}]" value="4">{{ $paperQues->choice4 }}
                                                    </td>
                                                    <?php $count++; ?>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>


                        <div class="text-right">
                            <input type="submit" class="btn btn-primary" value="Submit form"> <i
                                class="icon-paperplane ml-2"></i>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection


