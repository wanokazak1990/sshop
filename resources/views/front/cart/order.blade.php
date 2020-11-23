@extends('layouts.app')

@section('breadcrubs')
<div class="container">
	<div class="row">
		<div class="col-12">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					@foreach($breadCrumbs as $crumb)
						@if($loop->last)
							<li class="breadcrumb-item active" aria-current="page">{{$crumb->getName()}}</li>
						@else
							<li class="breadcrumb-item"><a href="{{$crumb->getLink()}}">{{$crumb->getName()}}</a></li>
						@endif
					@endforeach				
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
				Данные заказа
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-8">
			<div class="row">
				<div class="col" >
					<div class="pb-3">Имя<span>*</span></div>
					<div class="form-control">{{$order->firstname}}</div>

					<div class="py-3">Фамилия<span>*</span></div>
					<div class="form-control">{{$order->lastname}}</div>

				</div>

				<div class="col">
					<div class="pb-3">E-mail<span>*</span></div>
					<div class="form-control">{{$order->email}}</div>

					<div class="py-3">Телефон<span>*</span></div>
					<div class="form-control">{{$order->phone}}</div>
				</div>
			</div>
			@if(!empty($order->comment))
			<div class="row">
				<div class="col">
					<div class="py-3">Комментарий<span>*</span></div>
					<div class="form-control">{{$order->comment}}</div>
				</div>
			</div>
			@endif
		</div>

		<div class="col-4">
			<div class="pb-3">Цена<span>*</span></div>
			<div class="form-control">{{$order->formatOrderPrice()}}р.</div>

			<div class="py-3">Статус<span>*</span></div>
			<div class="form-control" style="color: {{$order->status->color}}">{{$order->status->name}}</div>
		</div>
	</div>
</div>

<div class="container pt-5">
	<div class="row">
		<div class="col-12">
			<div class="h2 section-title">
				Товары заказа
			</div>
		</div>
	</div>
</div>

<div class="container" id="cart-content">

@if($order->purchases->isNotEmpty())
	@foreach($order->purchases as $itemPurchase)
		<div class="cart-row row product d-flex align-items-center pb-2 mb-2 {{ (!$loop->last)?'border-bottom':''}}">

			<div class="col-2">
				<img src="{{
					asset('storage/products/'.$itemPurchase->product->id.'/'.$itemPurchase->product->img)
				}}">
			</div>

			<div class="col-4">
				<div class="h4"><a href="{{ route('view.product',$itemPurchase->product) }}"> {{$itemPurchase->product->name}}</a></div>		
				<div class="desc">Артикул: {{ $itemPurchase->product->articule }}</div>
			</div>

			<div class="col">
				<div class=""><span class="price"> {{ $itemPurchase->format_price }}</span>р.</div>
			</div>

			<div class="col text-right">
				
				
			</div>

			<div class="col text-right">
				<span class="itemprice">{{ number_format(($itemPurchase->price*$itemPurchase->count),0,'',' ') }}</span>р.
			</div>

			<div class="col-1">
				
			</div>

		</div>
	@endforeach
@endif

</div>



@endsection