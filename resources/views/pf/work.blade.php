@extends('layouts.sub')

@section('header')
	@include('components.header')
@endsection

@section('menu')
<form class="contact-form" method="" enctype="multipart/form-data">
<table  align="center" class="worktb">
	@csrf
	<tr><th></th><td><img src="{{asset('storage/files/' . $work->id . '.' . $work->extension)}}" /></td></tr>
	<tr><th></th><td><h2>{!! nl2br(e($work->name)) !!}</h2></td></tr>
	<tr><th></th><td><h4>{!! nl2br(e($work->job_role)) !!}</h4></td></tr>
</table>
</form>
@endsection

@section('footer')
	@include('components.footer')
@endsection