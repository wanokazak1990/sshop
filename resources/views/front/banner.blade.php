<div class="container-fluid banner" >
	<div class="row">
		<div class="col-12">
			<div class="container">
				<div class="banner-slider">
					@foreach($banners as $itemBanner)
						<img src="{{asset('storage/banners/'.$itemBanner->img)}}">
					@endforeach
				</div>
			</div>
		</div>
	</div>

</div>