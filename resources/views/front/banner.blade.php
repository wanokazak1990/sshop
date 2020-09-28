<div class="container-fluid banner" >


			<div class="banner-slider">
				@for($i=1;$i<=3;$i++)
					<div class="container-fluid">
						<div class="container p-0">
							<img src="{{asset('storage/banners/'.$i.'.jpg')}}">
						</div>
					</div>
				@endfor	
			</div>


</div>