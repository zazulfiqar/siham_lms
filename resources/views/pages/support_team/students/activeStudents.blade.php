@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Inactive Students List</h6>
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-students">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activeStudents as $students)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img class="rounded-circle" style="height: 40px; width: 40px;"
                                         src="{{url('/siham_lms/storage/app/public/'.$students->photo	)}}" alt="photo"></td>
                                <td>{{ $students->name }}</td>
                                <td>{{ $students->username }}</td>
                                <td>{{ $students->email }}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            {{--                                                {{dd($students->student_record->id)}}--}}
                                            <div class="dropdown-menu dropdown-menu-left">
                                                @if(isset($students->student_record->id))
                                                <a href="{{ route('students.show',
                                                Qs::hash($students->student_record->id)) }}"
                                                   class="dropdown-item"><i class="icon-eye"></i> View Profile</a>
                                                @endif
                                                <a href="{{ route('students.inactive', Qs::hash($students->id)) }}"
                                                   class="dropdown-item"><i class="icon-blocked"></i>Deactivate</a>
                                                {{--                                                    @if(Qs::userIsTeamSA())--}}
                                                {{--                                                        <a href="{{ route('students.edit', Qs::hash($students->student_record->id)) }}"--}}
                                                {{--                                                           class="dropdown-item"><i class="icon-pencil"></i> Edit</a>--}}
                                                {{--                                                        <a href="{{ route('st.reset_pass', Qs::hash($students->id)) }}"--}}
                                                {{--                                                           class="dropdown-item"><i class="icon-lock"></i> Reset--}}
                                                {{--                                                            password</a>--}}
                                                {{--                                                    @endif--}}
                                                {{--                                                    @if(Qs::userIsSuperAdmin())--}}
                                                {{--                                                        <a id="{{ Qs::hash($students->id) }}"--}}
                                                {{--                                                           onclick="confirmDelete(this.id)" href="#"--}}
                                                {{--                                                           class="dropdown-item"><i class="icon-trash"></i> Delete</a>--}}
                                                {{--                                                        <form method="post" id="item-delete-{{ Qs::hash($students->id) }}"--}}
                                                {{--                                                              action="{{ route('students.destroy', Qs::hash($students->id)) }}"--}}
                                                {{--                                                              class="hidden">@csrf @method('delete')</form>--}}
                                                {{--                                                    @endif--}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
