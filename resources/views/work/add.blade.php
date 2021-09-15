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
	<form class="contact-form" action="" method="post" enctype="multipart/form-data">
	<table align="center">
		@csrf
		<input type="file" id="" name="picture" accept="image/png, image/jpeg">
		<input type="text" name="name" placeholder="業務内容" value="{{old('name')}}"></input>
		<textarea name="job_role" placeholder="業務詳細">{{old('job_role')}}</textarea>
	</table>
	<input type="submit" value="send">
	</form>
@endsection

@section('footer')
	@include('components.footer')
@endsection