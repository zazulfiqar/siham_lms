@extends('layouts.master')
{{--@section('page_title', 'Edit Subject - '.$s->name. ' ('.$s->my_class->name.')')--}}
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
{{--            <h6 class="card-title">Edit Subject - {{$s->my_class->name }}</h6>--}}
            {!! Qs::getPanelOptions() !!}
        </div>

{{--        {{dd($evaluate)}}--}}
@php

// echo "<pre>";
// print_r($data['instructions']->id);
// echo "<pre>";

    
 
    // exit();
@endphp

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form class="" method="post" action="{{ route('std_updates.update', $data['instructions']->id) }}">
                        @csrf @method('PUT')
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Title <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="title" value="{{ $data['instructions']->title }}" required type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Details <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="details" value="{{ $data['instructions']->details }}" required type="text" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Status<span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9 form-control">
                                <select name="status" id="status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">InActive</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


{{--        @endforeach--}}

    </div>

    subject Edit Ends

@endsection
