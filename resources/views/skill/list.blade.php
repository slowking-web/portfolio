@extends('layouts.crud')

@section('header')
	@include('components.header')
@endsection

@section('menu')
	<form class="contact-form" action="judge" method="post" enctype="multipart/form-data">
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
	<div class="buttonwrap">
    	<input type="submit" value="update" name="update">
    	<input type="submit" value="delete" name="delete">
	</div>
	</form>
@endsection

@section('footer')
	@include('components.footer')
@endsection