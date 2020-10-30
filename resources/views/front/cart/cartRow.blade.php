
@if($cart->products->isNotEmpty())
	@foreach($cart->products as $itemProduct)
		<div class="cart-row row product d-flex align-items-center pb-2 mb-2 {{ (!$loop->last)?'border-bottom':''}}" data-id="{{$itemProduct->getId()}}">

			<div class="col-2">
				<img src="{{asset($itemProduct->getImg())}}">
			</div>

			<div class="col-4">
				<div class="h4"><a href="{{ route('view.product',$itemProduct->getProduct()) }}"> {{$itemProduct->getName()}}</a></div>		
				<div class="desc">Артикул: {{$itemProduct->getProduct()->articule}}</div>
			</div>

			<div class="col">
				<div class=""><span class="price"> {{$itemProduct->formatPrice()}}</span>р.</div>
			</div>

			<div class="col text-right">
				
				<div class="btn-group " > 
					@include('front.buttons.cartPlus',[
						'product'=>$itemProduct->getProduct(),
						'title'=>'+'
					])
					<button class="btn btn-count border-top border-bottom">{{$itemProduct->getCount()}}</button> 
					@include('front.buttons.cartMinus',[
						'product'=>$itemProduct->getProduct(),
						'title'=>'-', 
						'route'=>route('cart.del',$itemProduct->getProduct())
					])
				</div>
			</div>

			<div class="col total text-right">
				<span class="itemprice">{{$itemProduct->formatTotal()}}</span>р.
			</div>

			<div class="col-1">
				<button class="btn cart-control" data-url="{{route('cart.clear',$itemProduct->getProduct())}}" data-method="delete">
					<i class="fa fa-close"></i>
				</button>
			</div>

		</div>
	@endforeach
@endif


<div class="row py-3">
	<div class="col-8"></div>
	<div class="col-4 text-right">
		<div class="">
			<div class="">Итого: {{$cart->formatTotal()}}р.</div>		
		</div>
	</div>
</div>
