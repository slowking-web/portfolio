@extends('layouts.crud')

@section('header')
	@include('components.header')
@endsection

@section('menu')
	<form class="contact-form" action="edit" method="post" enctype="multipart/form-data">
    	@csrf
    	<input type="hidden" name="id" value="{{$works->id}}" />
		<input type="file" name="picture" accept="image/*" />
		<input type="text" name="name" placeholder="JOB DESCRIPTION" value="{{$works->name}}"></input>
		<textarea name="job_role" placeholder="DETAIL">{{$works->job_role}}</textarea>
    	<input type="submit" value="update">
	</form>
@endsection