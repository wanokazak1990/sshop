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

	<div id="cart-content">	
		@include('front.cart.cartRow')
	</div>
</div>

<div class="container-fluid py-5" style="">
	<div class="container">
		<div  class="row">
			<div class="col-12">
				<div class="h2 section-title ">
					Оформление заказа
				</div>
			</div>
		</div>

		
		{{Form::open([
			'route'=>'order.store',
            'method' => 'POST'
        ])}}

		
		<div class="row order-data">
			
			<div class="col-8">
				<div style="background-color: #dce0e0;padding: 30px;border-radius: 10px;">
					<div class="row">
						<div class="col" >
							<div class="py-3">Имя<span>*</span></div>
							{{Form::text('firstname','',['class'=>'form-control','placeholder'=>'Имя'])}}

							<div class="py-3">Фамилия<span>*</span></div>
							{{Form::text('lastname','',['class'=>'form-control','placeholder'=>'Фамилия'])}}

						</div>

						<div class="col">
							<div class="py-3">E-mail<span>*</span></div>
							{{Form::text('email','',['class'=>'form-control','placeholder'=>'E-mail'])}}

							<div class="py-3">Телефон<span>*</span></div>
							{{Form::text('phone','',['class'=>'form-control','placeholder'=>'Телефон'])}}
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="py-3">Комментарий к заказу</div>
							{{Form::textarea('comment','',['class'=>'form-control','placeholder'=>'Комментарий к заказу'])}}
						</div>
					</div>

					<div class="row pt-3 d-flex align-items-center consent">
						<div class="col-11">
							<label for='consent'>
								Оформляя заказ на сайте я даю свое <a href="">согласие на обработку персональных данных</a>
							</label>
						</div>

						<div class="col-1">
							{{Form::checkbox('consent','1','',['class'=>''])}}
						</div>
					</div>
				</div>
			</div>

			<div class="col-4">
				<div class="">
					{{Form::submit('Оформить заказ',['class'=>'btn btn-danger btn-block btn-lg'])}}
				</div>
				
			</div>
		</div>
		{{Form::close()}}
	</div>
</div>

@endsection