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
	<form class="contact-form" action="list" method="post" enctype="multipart/form-data">
	<table  align="center" class="tbskill">
		@csrf
		<tr><th></th><th></th><th>Title</th></tr>
		@foreach ($skills as $skill)
			<tr>
				<td class="btn"><input type="checkbox" name="chk[]" value="{{$skill->id}}"></td>
				<td class="iname">{{$skill->iname}}</td>
				<td class="sname">{{$skill->sname}}</td>
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