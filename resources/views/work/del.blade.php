@extends('layouts.crud')

@section('header')
	@include('components.header')
@endsection

@section('menu')
	<form class="contact-form" action="del" method="post" enctype="multipart/form-data">
	<table>
		@csrf
		<tr><th></th><th></th><th>Title</th></tr>
		@foreach ($works as $work)
			<tr>
				<td><input type="checkbox" name="chk[]" value="{{$work->id}}"></td>
				<td>{{$work->name}}</td>
			</tr>
		@endforeach
	</table>
	<input type="submit" value="delete">
	</form>
@endsection

@section('footer')
	@include('components.footer')
@endsection