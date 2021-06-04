@extends('layouts.master')
@section('page_title', 'Class Schedule')
@section('content')

<style>
.data-card:hover {
background: #f41043 !important;
transform: scale(1.02) !important;
color: #ffffff !important;
}

.h4Class:hover{
color: #ffffff !important;
border-bottom-color: #b3b3b3;
}
</style>


<div class="card flex-row flex-wrap">
<div class="card-footer w-100 text-muted">
<i class="fa fa-clock-o" aria-hidden="true"></i> Class Schedule
</div>


<section class="page-contain">
<div class="row">
@foreach($schedule as $s)
<div class="col-md-6">
<a href="#" class="data-card">
<h4 class="h4Class">

@if(isset($s->course_id))


@php
$papersData = \App\Models\Courses::where('id',$s->course_id)->first();

@endphp
{{ $papersData->name }}


@else
<td>No Course </td>
@endif
</h4>
<h4>{{ $s->time }} </h4>


<svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z" fill="#753BBD"/>
</svg>
</span>
</a>
<p> Zoom Link : <a target="_blank" href="{{ $s->zoom_link }}">{{ $s->zoom_link }} </a></p>
</div>
@endforeach
</div>

</section>









</div>


@endsection