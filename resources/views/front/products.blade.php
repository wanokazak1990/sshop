<div class="container-fluid" style="background: #efefef;">
<div class="container pt-5" >
	
	<div class="row">
		<div class="col-12">
			<div class="h2 section-title">
				{{$blockTitle}}
			</div>
		</div>
	</div>

	<div class="row row-cols-1 row-cols-md-4">
		@for($i=1;$i<=$count;$i++)
			@include('front.itemproduct')
		@endfor

	</div>
</div>
</div>