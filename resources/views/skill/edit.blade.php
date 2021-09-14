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
	<form class="contact-form" action="edit" method="post">
    	@csrf
    	<input type="hidden" name="id" value="{{$skills->id}}">
    	<select name="items">
    	@foreach ($items as $item)
			<option  name="item[]" value="{{$item->sort_id}}" @if ($item->sort_id == $skills->items_id) selected @endif>{{$item->name}}</option>
    	@endforeach
    	</select>
		<input type="text" name="name" placeholder="スキル項目" value="{{old('name', $skills->name)}}"></input>
		<textarea name="skill" placeholder="スキル詳細">{{old('skill', $skills->skill)}}</textarea>
		<input type="submit" value="send">
	</form>
@endsection

@section('footer')
	@include('components.footer')
@endsection