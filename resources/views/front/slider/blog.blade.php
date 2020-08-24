<div class="container-fluid" style="background: #777">
<div class="container pt-5">
	<div class="row">
		<div class="col-12">
			<div class="section-title section-white">
				Блог
			</div>
		</div>

		<div class="col-12">
			<div class="blog-slider">
				@for($i=1;$i<=5;$i++)
					<div>
						<div class="m-1 wrap ">
							<img src="{{asset('storage/blog/'.$i.'.jpg')}}">
							<div class="p-2">
					  		<div class="date">
					  			27 Марта 2020
					  		</div>
					  		<div class="title">
					  			Изменения в связи с коронавирусом. Мы работаем
					  		</div>
					  		<div class="desc">
						  		Наш интернет-магазин продолжает работать в штатном режиме и отправлять заказы всеми способами, однако мы вынуждены внести некоторые изменения в работу в целях безопасности наших покупателей и работник...
					  		</div>
							</div>
						</div>
					</div>
				@endfor		

			</div>
		</div>
	</div>
</div>
</div>