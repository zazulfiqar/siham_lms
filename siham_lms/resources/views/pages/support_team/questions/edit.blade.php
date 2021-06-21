@extends('layouts.master')
@section('page_title', 'Questions Edit')
@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Manage Questions Edit</h6>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#new-course" class="nav-link active" data-toggle="tab">Add New Question</a>
            </li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane show  active fade" id="new-course">
                <div class="row">
                    <div class="col-md-6">
                        <form class="" method="post" action="{{ route('onlinepaper.update',Qs::hash($questionDetail->id)) }}"
                              enctype='multipart/form-data'>
                            @csrf
                            @method('put')
                            <input type="hidden" name="paper_id" value="{{$questionDetail->paper_id}}">
                            <div class="form-group row">
                                <label for="question" class="col-lg-3 col-form-label font-weight-semibold">Question
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input id="question" name="question" value="{{ $questionDetail->question }}" required type="text"
                                           class="form-control" placeholder="Write Question here">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="choice1" class="col-lg-3 col-form-label font-weight-semibold">Option 1
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input id="choice1" name="choice1" value="{{  $questionDetail->choice1  }}"
                                           required type="text" class="form-control" placeholder="Write Option 1 here">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="choice2" class="col-lg-3 col-form-label font-weight-semibold">Option 2
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input id="choice2" name="choice2" value="{{  $questionDetail->choice2  }}"
                                           required type="text" class="form-control" placeholder="Write Option 2 here">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="choice3" class="col-lg-3 col-form-label font-weight-semibold">Option 3
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input id="choice3" name="choice3" value="{{  $questionDetail->choice3  }}"
                                           required type="text" class="form-control" placeholder="Write Option 3 here">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="choice4" class="col-lg-3 col-form-label font-weight-semibold">Option 4
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input id="choice4" name="choice4" value="{{  $questionDetail->choice4  }}"
                                           required type="text" class="form-control" placeholder="Write Option 4 here">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="answer" class="col-lg-3 col-form-label font-weight-semibold">
                                    Correct Option <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select class="form-control select" name="answer" id="answer">
                                        <option @if($questionDetail->answer == 1) selected @endif value="1">Option 1</option>
                                        <option @if($questionDetail->answer == 2) selected @endif value="2">Option 2</option>
                                        <option @if($questionDetail->answer == 3) selected @endif value="3">Option 3</option>
                                        <option @if($questionDetail->answer == 4) selected @endif value="4">Option 4</option>
{{--                                        <option value="4">Option 4</option>--}}
                                    </select>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit form <i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
