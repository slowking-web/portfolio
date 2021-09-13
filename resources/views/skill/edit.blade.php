@extends('layouts.crud')

@section('header')
	@include('components.header')
@endsection

@section('menu')
	<form class="contact-form" action="edit" method="post">
		<table align="center">
    	@csrf
    	<input type="hidden" name="id" value="{{$skills->id}}">
    	<select name="items">
    	@foreach ($items as $item)
			<option  name="item[]" value="{{$item->sort_id}}" @if ($item->sort_id == $skills->items_id) selected @endif>{{$item->name}}</option>
    	@endforeach
    	</select>
		<input type="text" name="name" placeholder="SKILL CONTENT" value="{{$skills->name}}"></input>
		<textarea name="skill" placeholder="DETAIL">{{$skills->skill}}</textarea>
		</table>
		<input type="submit" value="send">
	</form>
@endsection

@section('footer')
	@include('components.footer')
@endsection