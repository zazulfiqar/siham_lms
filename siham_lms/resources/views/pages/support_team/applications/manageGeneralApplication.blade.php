@extends('layouts.master')
@section('page_title', 'Manage General Applications')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Details of Application</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">View
                        Applications </a></li>
                <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i>
                        Add Response</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-classes">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Complain</th>
                            <th>Response</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fetchapplication as $fetch)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $fetch->application }}</td>
                                <td>{{ $fetch->response }}</td>
                                @if($fetch->status == 1)
                                    <td>Responded</td>
                                @else
                                    <td>Not Responded Yet</td>
                                @endif

                                {{--                                <td class="text-center">--}}
                                {{--                                    <div class="list-icons">--}}
                                {{--                                        <div class="dropdown">--}}
                                {{--                                            <a href="#" class="list-icons-item" data-toggle="dropdown">--}}
                                {{--                                                <i class="icon-menu9"></i>--}}
                                {{--                                            </a>--}}

                                {{--                                            <div class="dropdown-menu dropdown-menu-left">--}}
                                {{--                                                @if(Qs::userIsTeamSA())--}}
                                {{--                                                                                                        Edit--}}
                                {{--                                                    <a href="{{ route('student_evaluation.edit', $fetch->id) }}"--}}
                                {{--                                                       class="dropdown-item"><i class="icon-pencil"></i> Edit</a>--}}
                                {{--                                                @endif--}}
                                {{--                                                @if(Qs::userIsSuperAdmin())--}}
                                {{--                                                                                                        Delete--}}
                                {{--                                                    <a id="{{ $fetch->id }}" onclick="confirmDelete(this.id)" href="#"--}}
                                {{--                                                       class="dropdown-item"><i class="icon-trash"></i> Delete</a>--}}
                                {{--                                                    <form method="post" id="item-delete-{{ $fetch->id }}"--}}
                                {{--                                                          action="{{ route('student_evaluation.destroy', $fetch->id) }}"--}}
                                {{--                                                          class="hidden">@csrf @method('delete')</form>--}}
                                {{--                                                @endif--}}

                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </td>--}}
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="new-class">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info border-0 alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <span>Complain: {{$fetch->application}} </span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="row">
                        <div class="col-md-6">
                            <form class="" method="post" action="{{ route('application.store_general_application' , Qs::hash($fetch->id)) }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Response <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea rows="3" cols="46" name="response" value="{{ old('response') }}" required ></textarea>
                                        {{--                                        <input name="response" value="{{ old('response') }}" required type="text"--}}
                                        {{--                                       class="form-control" placeholder="Enter Response here">--}}
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button id="ajax-btn" type="submit" class="btn btn-primary">Submit Response <i
                                            class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
