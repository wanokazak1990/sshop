<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	@if($cart->products->isNotEmpty())
		@foreach($cart->products as $itemProduct)
			<div class="row">
				<div class="col-4">
					<img src="{{asset($itemProduct->getImg())}}">
				</div>

				<div class="col-6">
					{{$itemProduct->getName()}}
				</div>
			</div>
		@endforeach
	@endif
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	<button type="button" class="btn btn-primary">Save changes</button>
</div>