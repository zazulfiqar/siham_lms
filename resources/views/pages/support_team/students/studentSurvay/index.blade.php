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


            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-students">

                        <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Questions</th>
                        </tr>
                        </thead>
                        <tbody>

                            <form action="{{ route('students.surveyStore') }} "  method="POST">
                                {{ csrf_field() }}
                            <?php
                             $count=1;
                            ;?>

                               @foreach($survay as $sur)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sur->question }} {{ $loop->iteration }}
                                    <table class="table datatable-button-html5-columns" >
                                        <tr>{{ $loop->iteration }}
                                            <input type="hidden" name="studentId" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="question_id[{{$count}}]" value="{{ $sur->id }}">

                                            <td>
                                                <input required type="radio"  name="answer[{{$count}}]" value="Excellent">Excellent
                                            </td>
                                            <td>
                                                <input required type="radio" name="answer[{{$count}}]" value="Good">Good
                                            </td>
                                            <td>
                                                <input required type="radio" name="answer[{{$count}}]" value="Average">Average
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
                    <input type="submit" class="btn btn-primary" value="Submit form"> <i class="icon-paperplane ml-2"></i>
                </div>
            </form>
        </div>
     </div>
    </div>

    </div>
    </div>

    </form>

</form>
@endsection


