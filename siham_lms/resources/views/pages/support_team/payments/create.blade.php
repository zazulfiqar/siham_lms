@extends('layouts.master')
@section('page_title', 'Create Payment')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Create Payment</h6>

            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form class="ajax-store" method="post" action="{{ route('payments.store') }}">
                    <form class="ajax-store" method="post" action="{{ route('payments.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Title <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="title" value="{{ old('title') }}" required type="text" class="form-control" placeholder="Eg. School Fees">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Expense Type </label>
                            <div class="col-lg-6">
                                <select class="form-control select-search" name="my_class_id" id="my_class_id">
                                    <option selected disabled >--- Select Type ---</option>
                                    @foreach($my_classes as $c)
                                        <option {{ old('my_class_id') == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-sucess" href="{{ route('expense_type.create') }}">Add Expensive</a>
                                <a href="{{ route('expense_type.index') }}">Edit Expensive</a>

                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-lg-3 col-form-label font-weight-semibold">Amount ($) <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input class="form-control" value="{{ old('amount') }}" required name="amount" id="amount" type="number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-lg-3 col-form-label font-weight-semibold">Description</label>
                            <div class="col-lg-9">
                                <input class="form-control" value="{{ old('description') }}" name="description" id="description" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="method" class="col-lg-3 col-form-label font-weight-semibold">Payment Method</label>
                            <div class="col-lg-9">
                                <select class="form-control select" name="method" id="my_class_id">
                                    <option  value="Cash">Cash</option>
                                    <option  value="Online">Online</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="method" class="col-lg-3 col-form-label font-weight-semibold">Status</label>
                            <div class="col-lg-9">
                                <select class="form-control select" name="status" id="status">
                                    <option  value="Cash">Paid</option>
                                    <option  value="Online">Unpaid</option>
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
    </div>

    {{--Payment Create Ends--}}

@endsection