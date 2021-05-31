








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

                            <th>Question</th>
                            <th>Answer</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>


                            @foreach($getQuestion_answer as $getQuestions)


                                <td>

                                    @php
                                        $papersData  = \App\Models\OnlinePaper::where('id',$getQuestions->question_id)->first();
                                        echo $papersData->question;
                                      @endphp

                                </td>
                                <td>{{ $getQuestions->answer }}</td>

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

                        </tbody>
                    </table>
                </div>
                {{--                @endforeach--}}
            </div>


        </div>
    </div>
    {{--subject List Ends--}}
@endsection
