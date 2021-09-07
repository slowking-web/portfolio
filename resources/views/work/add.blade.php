@extends('layouts.crud')

@section('header')
	@include('components.header')
@endsection

@section('menu')
	<form class="contact-form" action="" method="post" enctype="multipart/form-data">
	<table align="center">
		@csrf
		<input type="file" id="" name="picture" accept="image/png, image/jpeg">
		<input type="text" name="name" placeholder="JOB DESCRIPTION"></input>
		<textarea name="job_role" placeholder="DETAIL"></textarea>
	</table>
	<input type="submit" value="send">
	</form>
@endsection

@section('footer')
	@include('components.footer')
@endsection