<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../portfolio/public/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../../portfolio/public/css/style.css">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="header">
	@yield('header')
</div>
<div class="menu">
	@yield('menu')
</div>
<div class="footer">
	@yield('footer')
</div>
<script src="{{asset('/js/app.js')}}"></script>
</body>
</html>