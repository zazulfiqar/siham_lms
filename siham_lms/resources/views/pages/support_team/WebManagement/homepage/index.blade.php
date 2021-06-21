@extends('layouts.master')
{{--@section('page_title', 'Student Information - '.$my_class->name)--}}
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Home Page Front</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                {{--                <li class="nav-item"><a href="#all-students" class="nav-link active" data-toggle="tab">All {{ $my_class->name }} Students</a></li>--}}
                {{--                <li class="nav-item dropdown">--}}
                {{--                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sections</a>--}}
                {{--                    <div class="dropdown-menu dropdown-menu-right">--}}
                {{--                        @foreach($sections as $s)--}}
                {{--                            <a href="#s{{ $s->id }}" class="dropdown-item" data-toggle="tab">{{ $my_class->name.' '.$s->name }}</a>--}}
                {{--                        @endforeach--}}
                {{--                    </div>--}}
                {{--                </li>--}}
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-students">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Baner Text</th>
                            <th>Subject topic</th>
                            {{--                            <th>ADM_No</th>--}}
                            {{--                            <th>Section</th>--}}
                            <th>Subject Text</th>
                            <th>Faq Topic</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--                        {{dd($teachers)}}--}}
                        @foreach($getRecordFrontHome as $getRecordFront)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{--                                <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="{{url('/siham_lms/storage/app/public/'.$teach->user->photo	)}}" alt="photo"></td>--}}

                                <td>{{ $getRecordFront->banner_text }}</td>
                                <td>{{ $getRecordFront->subjects_topic }}</td>
                                {{--                                <td>{{ $teach->adm_no }}</td>--}}
                                {{--                                <td>{{ $my_class->name.' '.$teach->section->name }}</td>--}}
                                <td>{{ $getRecordFront->subjects_text }}</td>
                                <td>{{ $getRecordFront->faq_topic }}</td>
                                <td> <a href="{{ route('homepage.edit',  $getRecordFront->id) }}"
                                    class="dropdown-item"><i class="icon-pencil"></i> Edit</a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


                {{--                @foreach($sections as $se)--}}
                {{--                    <div class="tab-pane fade" id="s{{$se->id}}">                         <table class="table datatable-button-html5-columns">--}}
                {{--                            <thead>--}}
                {{--                            <tr>--}}
                {{--                                <th>S/N</th>--}}
                {{--                                <th>Photo</th>--}}
                {{--                                <th>Name</th>--}}
                {{--                                <th>ADM_No</th>--}}
                {{--                                <th>Email</th>--}}
                {{--                                <th>Action</th>--}}
                {{--                            </tr>--}}
                {{--                            </thead>--}}
                {{--                            <tbody>--}}
                {{--                            @foreach($students->where('section_id', $se->id) as $sr)--}}
                {{--                                <tr>--}}
                {{--                                    <td>{{ $loop->iteration }}</td>--}}
                {{--                                    <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="{{url('/siham_lms/storage/app/public/'.$teach->user->phot	)}}" alt="photo"></td>--}}
                {{--                                    <td>{{ $sr->user->name }}</td>--}}
                {{--                                    <td>{{ $sr->adm_no }}</td>--}}
                {{--                                    <td>{{ $sr->user->email }}</td>--}}
                {{--                                    <td class="text-center">--}}
                {{--                                        <div class="list-icons">--}}
                {{--                                            <div class="dropdown">--}}
                {{--                                                <a href="#" class="list-icons-item" data-toggle="dropdown">--}}
                {{--                                                    <i class="icon-menu9"></i>--}}
                {{--                                                </a>--}}

                {{--                                                <div class="dropdown-menu dropdown-menu-right">--}}
                {{--                                                    <a href="{{ route('students.show', Qs::hash($sr->id)) }}" class="dropdown-item"><i class="icon-eye"></i> View Info</a>--}}
                {{--                                                    @if(Qs::userIsTeamSA())--}}
                {{--                                                        <a href="{{ route('students.edit', Qs::hash($sr->id)) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>--}}
                {{--                                                        <a href="{{ route('st.reset_pass', Qs::hash($sr->user->id)) }}" class="dropdown-item"><i class="icon-lock"></i> Reset password</a>--}}
                {{--                                                    @endif--}}
                {{--                                                    <a href="#" class="dropdown-item"><i class="icon-check"></i> Marksheet</a>--}}

                {{--                                                    --}}{{--Delete--}}
                {{--                                                    @if(Qs::userIsSuperAdmin())--}}
                {{--                                                        <a id="{{ Qs::hash($sr->user->id) }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>--}}
                {{--                                                        <form method="post" id="item-delete-{{ Qs::hash($sr->user->id) }}" action="{{ route('students.destroy', Qs::hash($sr->user->id)) }}" class="hidden">@csrf @method('delete')</form>--}}
                {{--                                                    @endif--}}

                {{--                                                </div>--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                    </td>--}}
                {{--                                </tr>--}}
                {{--                            @endforeach--}}

                {{--                            </tbody>--}}
                {{--                        </table>--}}
                {{--                    </div>--}}
                {{--                @endforeach--}}

            </div>
        </div>
    </div>

    {{--Student List Ends--}}

@endsection
