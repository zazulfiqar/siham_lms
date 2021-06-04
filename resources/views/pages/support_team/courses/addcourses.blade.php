@extends('layouts.master')
@section('page_title', 'Manage Courses')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Add Topic</h6>
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
    
            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-course">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="post" action="{{ route('addtopicsub') }}">
                                @csrf 

                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Topic Name
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="name" name="name"  required="" type="text" class="form-control" placeholder="Name of Topic">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="content" class="col-lg-3 col-form-label font-weight-semibold">Content
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea name="content" id="content" class="form-control"></textarea>
                                    </div>
                                </div>
                                
                                
                                <input type="hidden" name="courseid" value="{{$id}}">
 

                                <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>

                                
                                
                                </form>

                                
                       
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show active" id="all-students">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Topic Name</th>
                            <th>Content</th>
                        
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($topics as $topic)
                                <tr>
                                    <td>{{ $topic->id }}</td>
                                    <td>{{ $topic->name }}</td>
                                    <td>{{ $topic->study_plan }}</td>
                                  
                                  
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{--subject List Ends--}}
@endsection
