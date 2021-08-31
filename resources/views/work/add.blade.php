@extends('layouts.sub')

@section('header')
	@include('components.header')
@endsection

@section('menu')
	<form class="contact-form" action="" method="post">
	<table>
		@csrf
		<tr><th></th><td><input type="text" name="name"></input></td></tr>
		<tr><th></th><td><input type="file" id="" name="picture" accept="image/png, image/jpeg"></td></tr>
		<tr><th></th><td><textarea name="job_role"></textarea></td></tr>
		<tr><th></th><td><input type="submit" value="send"></td></tr>
	</table>
	</form>
@endsection

@section('footer')
	@include('components.footer')
@endsection