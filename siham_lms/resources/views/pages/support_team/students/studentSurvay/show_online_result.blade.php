@extends('layouts.master')
@section('page_title', 'View Students Feedback')
@section('content')
    <div class="card">

        {{--        {{dd($courses)}}--}}
  
        <div class="card-body">
      
            <div class="tab-content">
                <h1> students Result </h1>
                <div class="tab-pane show active" id="manage-course">
                   

                            @foreach($std_online_papers as $result)

{{-- 
                            @php
                            echo "<pre>";
                                print_r($result );
                            echo "</pre>";

                            @endphp --}}


    <input type="radio" name="stdans" value="1" @php echo ($result->std_online_papers_answer == '1'?'checked':''); @endphp >{{$result->choice1}}<br>
    <input type="radio" name="stdans" value="2" @php echo ($result->std_online_papers_answer == '2'?'checked':''); @endphp>{{$result->choice2}}<br>
    <input type="radio" name="stdans" value="3" @php echo ($result->std_online_papers_answer == '3'?'checked':''); @endphp>{{$result->choice3}}<br>
    <input type="radio" name="stdans" value="4" @php echo ($result->std_online_papers_answer == '4'?'checked':''); @endphp>{{$result->choice4}}<br>

                            
                         

                            @endforeach
                   
               
                </div>
                {{--                @endforeach--}}
            </div>

            <div class="tab-content">
                <h1> Answer :</h1>
                <div class="tab-pane show active" id="manage-course">
                    @foreach($std_online_papers as $result)
                    <input type="radio" name="radio" value="1" @php echo ($result->online_papers_answer == '1'?'checked':''); @endphp >{{$result->choice1}}<br>
                    <input type="radio" name="radio" value="2" @php echo ($result->online_papers_answer == '2'?'checked':''); @endphp>{{$result->choice2}}<br>
                    <input type="radio" name="radio" value="3" @php echo ($result->online_papers_answer == '3'?'checked':''); @endphp>{{$result->choice3}}<br>
                    <input type="radio" name="radio" value="4" @php echo ($result->online_papers_answer == '4'?'checked':''); @endphp>{{$result->choice4}}<br>
                   @endforeach
                </div>
                
            </div>   


        </div>
    </div>



    <!-- Modal -->

    {{--subject List Ends--}}
@endsection
