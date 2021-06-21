@extends('layouts.master')
@section('page_title', 'Questions')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Questions</h6>
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-course" class="nav-link active" data-toggle="tab">Add New Question</a>
                </li>

                <li class="nav-item"><a href="#manage-course" class="nav-link" data-toggle="tab">Manage Questions</a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-course">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="" method="post" action="{{ route('onlinepaper.store') }}"
                                  enctype='multipart/form-data'>
                                @csrf
                                @method('post')
                                <input type="hidden" name="paper_id" value="{{$id}}">
                                <div class="form-group row">
                                    <label for="question" class="col-lg-3 col-form-label font-weight-semibold">Topic
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="question" name="question" value="{{ old('question') }}" required type="text"
                                           class="form-control" placeholder="Write Question here">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="choice1" class="col-lg-3 col-form-label font-weight-semibold">Option 1
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="choice1" name="choice1" value="{{ old('choice1') }}"
                                               required type="text" class="form-control" placeholder="Write Option 1 here">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="choice2" class="col-lg-3 col-form-label font-weight-semibold">Option 2
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="choice2" name="choice2" value="{{ old('choice2') }}"
                                               required type="text" class="form-control" placeholder="Write Option 2 here">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="choice3" class="col-lg-3 col-form-label font-weight-semibold">Option 3
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="choice3" name="choice3" value="{{ old('choice3') }}"
                                               required type="text" class="form-control" placeholder="Write Option 3 here">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="choice4" class="col-lg-3 col-form-label font-weight-semibold">Option 4
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="choice4" name="choice4" value="{{ old('choice4') }}"
                                               required type="text" class="form-control" placeholder="Write Option 4 here">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="answer" class="col-lg-3 col-form-label font-weight-semibold">Correct Option<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Select Correct Option" class="form-control select"
                                                name="answer" id="answer">
                                            <option value="" disabled selected>Select Correct Option</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                            <option value="4">Option 4</option>
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

                <div class="tab-pane fade" id="manage-course">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Question</th>
                            <th>Option 1</th>
                            <th>Option 2</th>
                            <th>Option 3</th>
                            <th>Option 4</th>
                            <td>Corrct<br>Answer</td>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$question->question}}</td>
                                <td>{{$question->choice1}}</td>
                                <td>{{$question->choice2}}</td>
                                <td>{{$question->choice3}}</td>
                                <td>{{$question->choice4}}</td>
                                @if($question->answer == 1 )
                                    <td>Option 1</td>
                                @elseif($question->answer == 2)
                                    <td>Option 2</td>
                                @elseif($question->answer == 3)
                                    <td>Option 3</td>
                                @elseif($question->answer == 4)
                                    <td>Option 4</td>
                                @endif
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a href="{{ route('onlinepaper.edit', Qs::hash($question->id)) }}"
                                                   class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                <a id="{{ $question->id }}" onclick="confirmDelete(this.id)" href="#"
                                                   class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                <form method="post" id="item-delete-{{ $question->id }}"
                                                      action="{{ route('onlinepaper.destroy', Qs::hash($question->id)) }}"
                                                      class="hidden">@csrf @method('delete')</form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{--                @endforeach--}}
            </div>


        </div>
    </div>
    {{--subject List Ends--}}
@endsection
