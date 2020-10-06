@extends('layouts.app')

@section('content')

<div class="container product py-3">
	<div class="row">
		<div class="col-12">
			<div class="h2">
				{{$product->name}}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-4">
			<img src="{{asset('storage/products/'.$product->id.'/'.$product->img)}}">
		</div>
		<div class="col-4">
			<div class="h3">
				Цена: {{$product->format_price}} руб.
			</div>
			<div class="">
				<b>Артикул:</b>
				{{$product->articule}}
			</div>
			<button class="btn btn-block btn-push-card">В корзину</button>
			<p>{{$product->desc}}</p>

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
	</div>
</div>

@endsection