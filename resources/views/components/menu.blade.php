<style>
</style>
<div class="menu">
    <section class="about">
    	<h2 class="heading">ABOUT ME</h2>
    	<p>{!! nl2br(e($aboutme)) !!}</p>
    </section>
    <section class="works">
    	<h2 class="heading">WORKS</h2>
    	<div id="work"></div>
    	<script src="{{asset('js/app.js')}}"></script>
    </section>
    <section class="skills">
    	<h2 class="heading">MY SKILLS</h2>
    	<div class="skills-wrapper">
    	<table align="center">
    		@foreach ($items as $item)
    		<thead>
			<tr><th colspan="2" class="skill-title">{{$item->name}}</th></tr>
			</thead>
			<tbody>
    			@foreach ($skills as $skill)
    			@if ($item->sort_id == $skill->items_id)
        		<tr>
        			<td class="skill-text">{!! nl2br(e($skill->name)) !!}</td>
        			<td class="skill-text">{!! nl2br(e($skill->skill)) !!}</td>
        		</tr>
        		@endif
        		@endforeach
        	</tbody>
    		@endforeach
    	</table>
    	</div>
    </section>
</div>