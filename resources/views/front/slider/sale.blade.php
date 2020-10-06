<div class="container-fluid" style="background: #ffb6c1">
<div class="container pt-5">
	<div class="row">
		<div class="col-12">
			<div class="section-title ">
				{{isset($blockTitle) ? $blockTitle : 'Скидки'}}
			</div>
		</div>

		<div class="col-12">
			<div class="sale-slider">
				@isset($products)
				@foreach($products as $k => $itemProduct)
					@include('front.itemproduct')
				@endforeach
				@endisset
			</div>
		</div>
	</div>
</div>
</div>