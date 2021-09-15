@extends('layouts.crud')

@section('header')
	@include('components.header')
@endsection

@section('menu')
	@if (count($errors) > 0)
	<div>
		<ul style="list-style: none;">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form class="contact-form" action="edit" method="post" enctype="multipart/form-data">
    	@csrf
    	<input type="hidden" name="id" value="{{$works->id}}" />
		<input type="file" name="picture" accept="image/*" />
		<input type="text" name="name" placeholder="業務内容" value="{{old('name', $works->name)}}"></input>
		<textarea name="job_role" placeholder="業務詳細">{{old('work', $works->job_role)}}</textarea>
    	<input type="submit" value="update">
	</form>
@endsection