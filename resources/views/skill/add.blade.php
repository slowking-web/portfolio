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
	<form class="contact-form" action="add" method="post">
    	@csrf
    	<select name="items" >
    	@foreach ($items as $item)
    		<option  name="item[]" value="{{$item->sort_id}}">{{$item->name}}</option>
    	@endforeach
    	</select>
		<input type="text" name="name" placeholder="スキル項目" value="{{old('name')}}"></input>
		<textarea name="skill" placeholder="スキル詳細">{{old('skill')}}</textarea>
		<input type="submit" value="send">
	</form>
@endsection

@section('footer')
	@include('components.footer')
@endsection