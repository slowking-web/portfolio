@extends('layouts.crud')

@section('header')
	@include('components.header')
@endsection

@section('menu')
	<form class="contact-form" action="add" method="post">
		<table align="center">
    	@csrf
    	<select name="items">
    	@foreach ($items as $item)
    		<option  name="item[]" value="{{$item->sort_id}}">{{$item->name}}</option>
    	@endforeach
    	</select>
		<input type="text" name="name" placeholder="SKILL CONTENT"></input>
		<textarea name="skill" placeholder="DETAIL"></textarea>
		</table>
		<input type="submit" value="send">
	</form>
@endsection

@section('footer')
	@include('components.footer')
@endsection