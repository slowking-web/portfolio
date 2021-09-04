@extends('layouts.crud')

@section('header')
	@include('components.header')
@endsection

@section('menu')
	<form class="contact-form" action="del" method="post" enctype="multipart/form-data">
	<table>
		@csrf
		<tr><th></th><th></th><th>Title</th></tr>
		@foreach ($skills as $skill)
			<tr>
				<td><input type="checkbox" name="chk[]" value="{{$skill->id}}"></td>
				<td>{{$skill->iname}}</td>
				<td>{{$skill->sname}}</td>
			</tr>
		@endforeach
	</table>
	<input type="submit" value="delete">
	</form>
@endsection

@section('footer')
	@include('components.footer')
@endsection