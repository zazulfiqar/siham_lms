@extends('layouts.master')
@section('page_title', 'Edit Course Content')
@section('content')
{{--{{dd($blog)}}--}}
    <div class="card">
{{--        <div class="card-header header-elements-inline">--}}
{{--            <h6 class="card-title">Edit Section of {{ $s->my_class->name }}</h6>--}}
{{--            {!! Qs::getPanelOptions() !!}--}}
{{--        </div>--}}

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
{{--                    {{$blog->id}}--}}
                    <form class="" method="post" action="{{ route('frontblog.update', $blog->id) }}">
                        @csrf @method('PUT')
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Course Name <span class="text-danger">*</span></label>

{{--                             course name  --}}
                            <div class="col-lg-9">
                                <textarea id=""  name="title" required rows="4" cols="120">{{ $blog->title }}</textarea>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Content </label>
                            <div class="col-lg-9">
                                <textarea id=""   name="description" rows="4" cols="120">{{ $blog->description }}</textarea>

                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--Section Edit Ends--}}

@endsection