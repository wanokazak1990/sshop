<div class="col-8"> 
@if($cart->products->isNotEmpty())
	@foreach($cart->products as $itemProduct)
		<div class="cart-row row product d-flex align-items-center pb-2 mb-2 {{ (!$loop->last)?'border-bottom':''}}" data-id="{{$itemProduct->getId()}}">

			<div class="col-2">
				<img src="{{asset($itemProduct->getImg())}}">
			</div>

			<div class="col-5">
				<div class="h4"><a href="{{ route('view.product',$itemProduct->getProduct()) }}"> {{$itemProduct->getName()}}</a></div>
				<div class="desc">В корзине: <span class="count">{{$itemProduct->getCount()}}</span>шт.</div>
				<div class="desc">Цена: <span class="price"> {{$itemProduct->formatPrice()}}</span>руб.</div>
			</div>

			<div class="col-3 total text-right">
				<span class="itemprice">{{$itemProduct->formatTotal()}}</span>руб.
			</div>

			<div class="col-2 text-right">
				
				<div class="btn-group " > 
					@include('front.buttons.cartPlus',[
						'product'=>$itemProduct->getProduct(),
						'title'=>'+'
					])
					<!-- <button class="btn btn-count">{{$itemProduct->getCount()}}</button>  -->
					@include('front.buttons.cartMinus',[
						'product'=>$itemProduct->getProduct(),
						'title'=>'-', 
						'route'=>route('cart.del',$itemProduct->getProduct())
					])
				</div>
			</div>

		</div>
	@endforeach
@endif
</div>

<div class="col-4">
	<div class="h4">Почему Мы?</div>
	<ul>
	<li>Более 15 лет успешной работы</li>
	<li>Более 15 000 товаров в наличии</li>
	<li>Доставка товаров по всей России</li>
	<li>Короткие сроки доставки</li>
	<li>Оплата товара при получении</li>
	</ul>
</div>