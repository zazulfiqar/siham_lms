@extends('layouts.master')
@section('page_title', 'Online Examination')
@section('content')


    <div class="card">
        <div class="card-header header-elements-inline">
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <h3>Enter yout examination code here to start</h3>
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">Exam Code
                    </a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-classes">


                    <form action="{{route('std_paper.paper.openPaper')}}" method="GET">
                        <div class="form-control">
                            <label>Exam code </label>
                            <input type="text" class="" name="exam_code">

                            <input type="submit" class="btn btn-primary" value="start">
                        </div>


                    </form>
                </div>

                <div class="tab-pane fade" id="new-class">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
