<style>
</style>
<div class="header_menu" style="display:inline-flex">
	<form>
		<div id="menu"></div>
	</form>
		<form  class="contact-logout" method="post" action="{{ url('logout') }}">
    @csrf 
    <input type="submit" value="ログアウト" />
    </form>
</div>
<div class="header">
    <p class="site-title-sub">Programmer's portfolio</p>
    <h1 class="site-title">PORTFOLIO</h1>
</div>