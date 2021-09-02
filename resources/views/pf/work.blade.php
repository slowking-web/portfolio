@extends('layouts.sub')

@section('header')
	@include('components.header')
@endsection

@section('menu')
<table>
	@csrf
	<tr><th></th><td><h2>{!! nl2br(e($work->name)) !!}</h2></td></tr>
	<tr><th></th><td><img src="{{asset('storage/files/' . $work->id . '.' . $work->extension)}}" /></td></tr>
	<tr><th></th><td><h3>{!! nl2br(e($work->job_role)) !!}</h3></td></tr>
</table>
@endsection

@section('footer')
	@include('components.footer')
@endsection