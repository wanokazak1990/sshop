@extends('layouts.app')


@section('breadcrups')
<div class="container">
	<div class="row">
		<div class="col-12">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Главная</a></li>

					<li class="breadcrumb-item active" aria-current="page">Корзина</li>					
				</ol>
			</nav>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="h2 section-title">
				Корзина
			</div>
		</div>
	</div>

	<div class="row " id="cart-content">	
		@include('front.cart.cartRow')
	</div>

	<div class="col-4">
	<div class="check">
		<div class=" bold">Итого: {{$cart->fullCount()}} товар(а) на {{$cart->formatTotal()}} руб.</div>
		<button class="btn btn-block btn-danger mt-4" href="{{route('order.create')}}">Оформить заказ</button>
	</div>
</div>

@endsection