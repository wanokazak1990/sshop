@extends('layouts.app')

@section('breadcrups')
<div class="container">
	<div class="row">
		<div class="col-12">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Главная</a></li>

					@foreach($categoryChain as $crumb)
						<li class="breadcrumb-item"><a href="{{route('view.catalog',$crumb)}}">{{$crumb->name}}</a></li>				
					@endforeach
					<li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
					
				</ol>
			</nav>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="container product">
	<div class="row">
		<div class="col-12">
			<div class="h2 section-title">
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
				@foreach($categoryChain as $item) 
					{{$item->name}}
				@endforeach
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