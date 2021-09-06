@extends('layouts.main')

@section('header')
	@include('components.header')
@endsection

@section('menu')
<p>{{$message}}</p>
<form  class="contact-form" action="auth" method="post">
    <table>
    	@csrf
        <tr><th>user: </th><td><input type="text" name="name"></td></tr>
        <tr><th>pass: </th><td><input type="password" name="password"></td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
</form>
@endsection

@section('footer')
	@include('components.footer')
@endsection