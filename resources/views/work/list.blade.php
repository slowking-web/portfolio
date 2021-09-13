@extends('layouts.crud')

@section('header')
	@include('components.header')
@endsection

@section('menu')
	<form class="contact-form" action="judge" method="post" enctype="multipart/form-data">
	<table align="center">
		@csrf
		<tr><th></th><th></th><th>Title</th></tr>
		@foreach ($works as $work)
			<tr>
				<td><input type="checkbox" name="chk[]" value="{{$work->id}}"></td>
				<td>{{$work->name}}</td>
			</tr>
		@endforeach
	</table>
	<div class="buttonwrap">
    	<input type="submit" value="update" name="update">
    	<input type="submit" value="delete" name="delete">
	</div>
	</form>
@endsection

@section('footer')
	@include('components.footer')
@endsection