@extends('layouts.master')
@section('page_title', 'Registerated Courses ')
@section('content')







    <div class="card">
        <div class="card-header header-elements-inline">
            {{--            <h6 class="card-title">Current Semester</h6>--}}
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <section class="page-contain">
                <div class="row">
                    @foreach ($CourseRegisterd as $courseReg )
                    <div class="col-md-4">
                        <a href="#" class="data-card">
                            <h3>@if($courseReg->code)
                                <td>{{$courseReg->code}}
                            @else
                                <td>Code Not Allot</td>
                            @endif</h3>
                            <h4>{{$courseReg->name}}</h4>
                            <p>{{$courseReg->code}}</p>
                            <span class="link-text">
                                @php
                                $teacher_name =  \App\Models\Teacher::where('id',$courseReg->teacher_id)->value('name');
                            @endphp
                            @if($teacher_name)
                            {{$teacher_name}}
                            @else
                            Teacher Not Showing
                            @endif

                            <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z" fill="#753BBD"/>
                        </svg>
                            </span>
                            <br>


                            <form class="" method="post" action="{{ route('students.courcestudentDetails') }}"
                            enctype='multipart/form-data'>
                          @csrf
                          @method('post')
                          <input type="hidden" value="{{$courseReg->id}}" name="course_id">
                            <input type="submit" Value="Details" class="btn DescriptionBtNCourse">
                        </form>
                        </a>

                    </div>
                    @endforeach
                </div>
              </section>
        </div>
    </div>


@endsection
