@extends('layouts.master')
@section('page_title', 'Student Policies')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Student Policies</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">RULES AND REGULATIONS FOR STUDENT
                      </a></li>
{{--                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">RULES REGAURDING ATTENDANCE--}}
{{--                    </a></li>--}}
{{--                <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i>--}}
{{--                        Create New Policy</a></li>--}}
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-classes">

                    @foreach($policies as $policy)
{{--                        {{dd($policy->id)}}--}}

                        <div>
                            {{$policy->policy}}

                        </div>

                    @endforeach

                    {{--                    <table class="table datatable-button-html5-columns">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>S/N</th>--}}
{{--                            <th>Class Type</th>--}}
{{--                            <th>Policy </th>--}}

{{--                            <th>Action</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}

{{--                        @foreach($policy as $p)--}}

{{--                            <tr>--}}
{{--                                <td>{{ $loop->iteration }}</td>--}}
{{--                                <td>{{ $p->role_type }}</td>--}}
{{--                                <td>{{ $p->policy }}</td>--}}

{{--                                <td class="text-center">--}}
{{--                                    <div class="list-icons">--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <a href="#" class="list-icons-item" data-toggle="dropdown">--}}
{{--                                                <i class="icon-menu9"></i>--}}
{{--                                            </a>--}}

{{--                                            <div class="dropdown-menu dropdown-menu-left">--}}
{{--                                                @if(Qs::userIsTeamSA())--}}
{{--                                                    Edit--}}
{{--                                                    <a href="{{ route('policies.edit', $p->id) }}" class="dropdown-item"><i--}}
{{--                                                            class="icon-pencil"></i> Edit</a>--}}
{{--                                                @endif--}}
{{--                                                @if(Qs::userIsSuperAdmin())--}}
{{--                                                    Delete--}}
{{--                                                    <a id="{{ $p->id }}" onclick="confirmDelete(this.id)" href="#"--}}
{{--                                                       class="dropdown-item"><i class="icon-trash"></i> Delete</a>--}}
{{--                                                    <form method="post" id="item-delete-{{ $p->id }}"--}}
{{--                                                          action="{{ route('policies.destroy', $p->id) }}"--}}
{{--                                                          class="hidden">@csrf @method('delete')</form>--}}
{{--                                                @endif--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
                </div>

                <div class="tab-pane fade" id="new-class">
                    <div class="row">
                        <div class="col-md-12">
                            {{--                            <div class="alert alert-info border-0 alert-dismissible">--}}
                            {{--                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>--}}

                            {{--                                <span>When a class is created, a Section will be automatically created for the class, you can edit it or add more sections to the class at <a target="_blank" href="{{ route('sections.index') }}">Student Sections</a></span>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {{--                            <form class="ajax-store" method="post" action="{{ route('policies.store') }}">--}}

                            <form class="" method="post" action="{{ route('policies.store') }}">

                                @csrf
                                <div class="form-group row">
                                    <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">Role
                                        Type</label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Select Class Type"
                                                class="form-control select" name="role_type" id="role_type">
                                            <option value="student">Student</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="staff">Staff</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Policy Description<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        {{--                                        <input name="name" value="{{ old('name') }}" required type="text"--}}
                                        {{--                                               class="form-control" placeholder="Name of Class">--}}
                                        <textarea id="" name="policy" rows="10" cols="120"></textarea>


                                    </div>
                                </div>


                                <div class="text-right">
                                    <button id="ajax-btn" type="submit" class="btn btn-primary">Submit form <i
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
