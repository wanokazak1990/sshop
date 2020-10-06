<div class="container-fluid {{isset($bg_color) ? $bg_color : '' }}">
<div class="container pt-5" >
	
	<div class="row">
		<div class="col-12">
			<div class="h2 section-title">
				{{$blockTitle}}
			</div>
		</div>
	</div>

	<div class="row row-cols-1 row-cols-md-4">
		@isset($products)
		@foreach($products as $k => $itemProduct)
			@include('front.itemproduct')
		@endforeach
		@endisset
	</div>
</div>
</div>