@extends('layouts.master')
@section('page_title', 'Manage Web Pricing')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Web Pricing</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-section" class="nav-link active" data-toggle="tab">Create New Pricing
                    </a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Manage Pricing Details</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach($front_pricings as $s)
                            <a href="#c{{ $s->id }}" class="dropdown-item" data-toggle="tab">{{ $s->title }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-section">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="" method="post" action="{{ route('frontpricing.store') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Title
                                        <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Course
                                        Duration
                                        <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" name="course_duration" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">price
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="price" class="form-control">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">description
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="description" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">feature_One
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="feature_one" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">feature_Two
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="feature_two" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">feature_Three
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="feature_three" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">feature_Four
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="feature_four" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">feature_Five
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="feature_five" class="form-control">

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

                @foreach($front_pricings as $d)
                    <div class="tab-pane fade" id="c{{ $d->id }}">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Title</th>
                                <th>Duration</th>

                                <th>Description</th>
                                <th>Features</th>

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->title }}</td>
                                <td>{{ $d->course_duration }}</td>
                                <td>                                    {{ \Illuminate\Support\Str::limit($d->description, 30, $end='...') }}</td>

                                <td>{{ \Illuminate\Support\Str::limit($d->feature_one, 10, $end='...') }}/
                                    {{ \Illuminate\Support\Str::limit($d->feature_two, 10, $end='...') }}/
                                    {{ \Illuminate\Support\Str::limit($d->feature_three, 10, $end='...') }}/
                                    {{ \Illuminate\Support\Str::limit($d->feature_four, 10, $end='...') }}/
                                    {{ \Illuminate\Support\Str::limit($d->feature_five, 10, $end='...') }}</td>

                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-left">

                                                @if(Qs::userIsTeamSA())
                                                    <a href="{{ route('frontpricing.edit', $d->id) }}"
                                                       class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                       <a id="{{ $d->id }}" onclick="confirmDelete(this.id)" href="#"
                                                       class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                    <form method="post" id="item-delete-{{ $d->id }}"
                                                          action="{{ route('frontpricing.destroy', $d->id) }}"
                                                          class="hidden">@csrf @method('delete')</form>
                                                @endif

                                                <!--@if(Qs::userIsSuperAdmin())-->
                                                <!--    <a id="{{ $s->id }}" onclick="confirmDelete(this.id)" href="#"-->
                                                <!--       class="dropdown-item"><i class="icon-trash"></i> Delete</a>-->
                                                <!--    <form method="post" id="item-delete-{{ $d->id }}"-->
                                                <!--          action="{{ route('frontpricing.destroy', $d->id) }}"-->
                                                <!--          class="hidden">@csrf @method('delete')</form>-->
                                                <!--@endif-->

                                            </div>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    {{--Section List Ends--}}

@endsection
