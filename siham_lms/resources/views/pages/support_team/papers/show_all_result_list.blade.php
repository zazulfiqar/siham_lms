
@php

$id = $_GET['id'];

@endphp

@php
  // $get_std_online_papers=DB::table('std_online_papers')->select('std_id')->distinct()->where('paper_id', $request->paperid)->get();
  $get_std_online_papers  = \App\Models\StdOnlinePaper::select('std_id')->distinct()->where('paper_id', $id )->get();
@endphp








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

                            <th>Paper Name</th>
                            <th>Student Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>


                            @foreach($get_std_online_papers as $get_std_online_paper)

                                    @php
                                    // $get_std_online_papers=DB::table('std_online_papers')->select('std_id')->distinct()->where('paper_id', $request->paperid)->get();
                                    $get_std_online_papers  = \App\Models\StdOnlinePaper::select('std_id')->distinct()->where('paper_id', $id )->get();
                                    @endphp

                                    @php
                                    $users  = \App\Models\User::where('id',$get_std_online_paper->std_id)->get();
                                    @endphp
                            @foreach($users as $paper)
                            <tr>
                                    <td>
                                        @php
                                        $papersData  = \App\Models\Paper::where('id',$id)->first();
                                        echo $papersData->topic;
                                      @endphp
                                       </td>
                                <td>{{$paper->name}}</td>
                                <td>
                                    {{-- <a href="{{ route('teacher.resultbypaper',$paper->id) }}" class="btn btn-primary">Result</a> --}}
                                        <form method="post" action="{{ route('teacher.resultbypaperAnswer') }}">
                                            @csrf
                                            @method('GET')
                                            <input type="hidden" class="btn btn-primary" name="std_id" value="{{$paper->id}}">
                                            <input type="hidden" class="btn btn-primary" name="paper_id" value="{{$papersData->id}}">

                                        <input type="submit" class="btn btn-primary" value="Result">
                                        </form>
                                </td>

                                <td></td>


                                <td class="text-center">
                                    {{-- <div class="list-icons">
                                        <a href="{{'resultbypaper?id='.$paper->id}}" class="btn btn-primary">Result</a> --}}
                                        {{-- <a href="{{ route('teacher.resultbypaper',$paper->id) }}" class="btn btn-primary">Result</a> --}}
                                        {{-- <form method="post" id="item-delete-{{ $paper->id }}"
                                            action="{{ route('teacher.resultbypaper', Qs::hash($paper->id)) }}"
                                            class="hidden">
                                            @csrf
                                            @method('HEAD')
                                            <input type="hidden" class="btn btn-primary" name="paperid" value="{{$paper->id}}">
                                        <input type="submit" class="btn btn-primary" value="Result">
                                        </form> --}}

                                    {{-- </div> --}}
                                </td>
                            </tr>
                        @endforeach
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
