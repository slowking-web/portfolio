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
    			@foreach ($skills as $skill)
    			@if ($item->sort_id == $skill->items_id)
    			<tbody>
        		<tr>
        			<td><p class="skill-text">{{$skill->name}}</p></td>
        			<td><p class="skill-text">{{$skill->skill}}</p></td>
        		</tr>
        		</tbody>
        		@endif
        		@endforeach
    		@endforeach
    	</table>
    	</div>
    </section>
</div>