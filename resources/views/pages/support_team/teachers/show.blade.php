@extends('layouts.master')
@section('page_title', 'Student Profile - '.$tech->user->name)
@section('content')
<div class="row">
    <div class="col-md-3 text-center">
        <div class="card">
            <div class="card-body">
{{--                {{dd($data->user)}}--}}
                <img style="width: 90%; height:90%" src="{{url('/siham_lms/storage/app/public/'.$tech->user->photo	)}}" alt="photo" class="rounded-circle">
                <br>
                <h3 class="mt-3">{{ $tech->user->name }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">{{ $tech->user->name }}</a>
                    </li>
                </ul>

                <div class="tab-content">
                    {{--Basic Info--}}
                    <div class="tab-pane fade show active" id="basic-info">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">Name</td>
                                <td>{{ $tech->user->name }}</td>
                            </tr>
                            {{-- <tr>
                                <td class="font-weight-bold">ADM_NO</td>
                                <td>{{ $tech->adm_no }}</td>
                            </tr> --}}

                            {{-- <tr>
                                <td class="font-weight-bold">Class</td>
                                <td>{{ $tech->my_class->name.' '.$tech->section->name }}</td>
                            </tr> --}}
                            {{-- @if($tech->my_parent_id)
                                <tr>
                                    <td class="font-weight-bold">Parent</td>
                                    <td>
                                        <span><a target="_blank" href="{{ route('users.show', Qs::hash($tech->my_parent_id)) }}">{{ $tech->my_parent->name }}</a></span>
                                    </td>
                                </tr>
                            @endif --}}
                            {{-- <tr>
                                <td class="font-weight-bold">Year Admitted</td>
                                <td>{{ $tech->year_admitted }}</td>
                            </tr> --}}
                            <tr>
                                <td class="font-weight-bold">Gender</td>
                                <td>{{ $tech->user->gender }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Address</td>
                                <td>{{ $tech->user->address }}</td>
                            </tr>
                            @if($tech->user->email)
                            <tr>
                                <td class="font-weight-bold">Email</td>
                                <td>{{$tech->user->email }}</td>
                            </tr>
                            @endif
                            @if($tech->user->phone)
                                <tr>
                                    <td class="font-weight-bold">Phone</td>
                                    <td>{{$tech->user->phone.' '.$tech->user->phone2 }}</td>
                                </tr>
                            @endif
{{--                            <tr>--}}
{{--                                <td class="font-weight-bold">Birthday</td>--}}
{{--                                <td>{{$tech->user->dob }}</td>--}}
{{--                            </tr>--}}
                            {{-- @if($tech->user->bg_id)
                            <tr>
                                <td class="font-weight-bold">Blood Group</td>
                                <td>{{$tech->user->blood_group->name }}</td>
                            </tr>
                            @endif --}}
                            @if($tech->user->nal_id)
                            <tr>
                                <td class="font-weight-bold">Nationality</td>
                                <td>{{$tech->user->nationality->name }}</td>
                            </tr>
                            @endif
{{--                            @if($tech->user->state_id)--}}
{{--                            <tr>--}}
{{--                                <td class="font-weight-bold">State</td>--}}
{{--                                <td>{{$tech->user->state->name }}</td>--}}
{{--                            </tr>--}}
{{--                            @endif--}}

                            {{-- @if($tech->user->phone)
                            <tr>
                                <td class="font-weight-bold">Phone</td>
                                <td>{{$tech->user->phone->phone }}</td>
                            </tr>
                            @endif --}}
                            {{-- @if($tech->user->lga_id)
                            <tr>
                                <td class="font-weight-bold">LGA</td>
                                <td>{{$tech->user->lga->name }}</td>
                            </tr>
                            @endif --}}
                            {{-- @if($tech->dorm_id)
                                <tr>
                                    <td class="font-weight-bold">Dormitory</td>
                                    <td>{{$tech->dorm->name.' '.$tech->dorm_room_no }}</td>
                                </tr>
                            @endif --}}

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


    {{--Student Profile Ends--}}

@endsection
