@extends('layouts.crud')

@section('header')
	@include('components.header')
@endsection

@section('menu')
	<form class="contact-form" action="add" method="post">
		<table>
    	@csrf
    	<select name="items">
    	@foreach ($items as $item)
    		<option  name="item[]" value="{{$item->sort_id}}">{{$item->name}}</option>
    	@endforeach
    	</select>
		<input type="text" name="name"></input>
		<textarea name="skill"></textarea>
		</table>
		<input type="submit" value="send">
	</form>
@endsection

@section('footer')
	@include('components.footer')
@endsection