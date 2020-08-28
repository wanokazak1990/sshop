<div class="container-fluid section-gallery"  >
	<div class="container py-5">
		<div class="row">
			<div id="mygallery" >

				@foreach($sections as $itemSection)
			    <a href="">
			        <img alt="" src="{{asset($itemSection->url_image)}}"/>
			    </a>
			    @endforeach

			</div>
		</div>
	</div> 
</div>
