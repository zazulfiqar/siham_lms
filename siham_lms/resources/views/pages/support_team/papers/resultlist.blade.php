@extends('layouts.master')
@section('page_title', 'Manage Paper')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Result </h6>
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">

            <div class="tab-content">


                <div class="" id="">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Course</th>
                            <th>Topic</th>

                            <th>Description</th>
                            <th>Paper Id</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($papers as $paper)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                @if(isset($paper->courses->name))
                                <td>{{$paper->courses->name}}</td>
                                @else
                                    <td>Not Assign</td>
                                @endif
                                <td>{{$paper->topic}}</td>
                                <td>{{$paper->description}}</td>

                                <td>{{$paper->unique_id}}</td>


                                <td class="text-center">
                                    <div class="list-icons">
                                        <a href="{{'resultbypaper?id='.$paper->id}}" class="btn btn-primary">Result</a>
                                        {{-- <a href="{{ route('teacher.resultbypaper',$paper->id) }}" class="btn btn-primary">Result</a> --}}
                                        {{-- <form method="post" id="item-delete-{{ $paper->id }}"
                                            action="{{ route('teacher.resultbypaper', Qs::hash($paper->id)) }}"
                                            class="hidden">
                                            @csrf
                                            @method('HEAD')
                                            <input type="hidden" class="btn btn-primary" name="paperid" value="{{$paper->id}}">
                                        <input type="submit" class="btn btn-primary" value="Result">
                                        </form> --}}

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{--                @endforeach--}}
            </div>


        </div>
    </div>
    {{--subject List Ends--}}
@endsection
