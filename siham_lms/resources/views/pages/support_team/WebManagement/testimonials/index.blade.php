@extends('layouts.master')
@section('page_title', 'Manage Web Testimonial')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Web testimonial </h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-section" class="nav-link active" data-toggle="tab">Create New
                        testimonial
                    </a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Manage testimonial Details</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach($front_testimonials as $s)
                            <a href="#c{{ $s->id }}" class="dropdown-item" data-toggle="tab">{{ $s->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-section">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="" method="post" action="{{ route('fronttestimonial.store') }}"
                                  enctype="multipart/form-data">
                                @csrf


                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">testimonial
                                        Title
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">
                                        User Image
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo"
                                               class="form-input-styled" data-fouc>
                                        <span
                                            class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">testimonial Description
                                        <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id="" name="description" rows="4" cols="98"></textarea>
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

                @foreach($front_testimonials as $d)
                    <div class="tab-pane fade" id="c{{ $d->id }}">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                     <img src="{{url('/siham_lms/storage/app/public/'.$d->image	)}}">
                                </td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->description }}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                @if(Qs::userIsTeamSA())
                                                    <a href="{{ route('fronttestimonial.edit', $d->id) }}"
                                                       class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                       <a id="{{ $s->id }}" onclick="confirmDelete(this.id)" href="#"
                                                       class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                    <form method="post" id="item-delete-{{ $d->id }}"
                                                          action="{{ route('fronttestimonial.destroy', $d->id) }}"
                                                          class="hidden">@csrf @method('delete')</form>
                                                @endif
                                                <!--@if(Qs::userIsSuperAdmin())-->
                                                <!--    <a id="{{ $s->id }}" onclick="confirmDelete(this.id)" href="#"-->
                                                <!--       class="dropdown-item"><i class="icon-trash"></i> Delete</a>-->
                                                <!--    <form method="post" id="item-delete-{{ $d->id }}"-->
                                                <!--          action="{{ route('fronttestimonial.destroy', $d->id) }}"-->
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
