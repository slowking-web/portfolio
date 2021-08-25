<html>
<head>
</head>
<body>
<div class="header">
	@yield('header')
</div>
@section('menu')
<section class="about" id="about">
	<h2 class="heading">ABOUT ME</h2>
</section>
<section class="works">
	<h2 class="heading">WORKS</h2>
</section>
<section class="skills">
	<h2 class="heading">MY SKILLS</h2>
</section>
@show
<div class="footer">
	@yield('footer')
</div>
</body>
</html>