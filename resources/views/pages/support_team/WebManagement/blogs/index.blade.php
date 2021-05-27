@extends('layouts.master')
@section('page_title', 'Manage Web Blog')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Web Blog</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-section" class="nav-link active" data-toggle="tab">Create New Blog
                    </a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Manage Blog Details</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach($front_blogs as $s)
                            <a href="#c{{ $s->id }}" class="dropdown-item" data-toggle="tab">{{ $s->title }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-section">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="" method="post" action="{{ route('frontblog.store') }}">
                                @csrf


                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Blog Title
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">

                                        <textarea id=""   name="title" rows="4" cols="120"></textarea>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Blog Description <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="description" rows="4" cols="120"></textarea>
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

                @foreach($front_blogs as $d)
                    <div class="tab-pane fade" id="c{{ $d->id }}">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            {{--                            @foreach($front_courses->where('course_id.id', $d->id) as $s)--}}

{{--                            @foreach($front_courses->where('course_id','=',$d->id) as $s)--}}
                                {{--->where('course_id','=','6')--}}
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->title }}
{{--                                        @if($s->active)<i class='icon-check'> </i>@endif--}}
                                    </td>
                                    <td>{{ $d->description }}</td>

                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">

                                                    @if(Qs::userIsTeamSA())
                                                        <a href="{{ route('frontblog.edit', $d->id) }}"
                                                           class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                           <a id="{{ $s->id }}" onclick="confirmDelete(this.id)" href="#"
                                                           class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                        <form method="post" id="item-delete-{{ $d->id }}"
                                                              action="{{ route('frontblog.destroy', $d->id) }}"
                                                              class="hidden">@csrf @method('delete')</form>
                                                    @endif

                                                    <!--@if(Qs::userIsSuperAdmin())-->
                                                    <!--    <a id="{{ $s->id }}" onclick="confirmDelete(this.id)" href="#"-->
                                                    <!--       class="dropdown-item"><i class="icon-trash"></i> Delete</a>-->
                                                    <!--    <form method="post" id="item-delete-{{ $d->id }}"-->
                                                    <!--          action="{{ route('frontblog.destroy', $d->id) }}"-->
                                                    <!--          class="hidden">@csrf @method('delete')</form>-->
                                                    <!--@endif-->

                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
{{--                            @endforeach--}}
                            </tbody>
                        </table>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    {{--Section List Ends--}}

@endsection
