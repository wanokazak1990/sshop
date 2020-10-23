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
@endsection