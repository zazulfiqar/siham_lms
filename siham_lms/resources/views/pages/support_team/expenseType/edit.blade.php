@extends('layouts.master')
@section('page_title', 'Edit Expense Type')
@section('content')

{{--    {{dd($expenseRecord)}}--}}
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Expense Type</h6>

            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form class="" method="post" action="{{route('expense_type.update',$expenseRecord->id) }}">
                         @csrf @method('PUT')
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Title <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="title"  required type="text" class="form-control" value="{{$expenseRecord->title}}">
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
