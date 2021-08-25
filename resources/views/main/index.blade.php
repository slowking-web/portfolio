@extends('layouts.main')

@section('header')
	@include('components.header')
@endsection

@section('menu')
	@parent
@endsection

@section('footer')
	@include('components.footer')
@endsection