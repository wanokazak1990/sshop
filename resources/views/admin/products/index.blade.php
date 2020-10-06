@extends('layouts.admin')

@section('content')

	<div class="row pb-3">
		<div class="col-12">
			<a href="{{route('products.create')}}" class="btn btn-warning">Добавить</a>
		</div>
	</div>

	@foreach($products as $itemProduct)
	<div class="row d-flex align-items-center remove-row pb-1">
		<div class="col-1">
			<div class="btn-group">
				<a class="btn btn-success fa fa-pencil-square-o" href="{{route('products.edit',$itemProduct)}}"></a>
				<a class="btn btn-danger fa fa-close btn-del" data-url="{{route('products.destroy',$itemProduct)}}"></a>
			</div>
		</div>

		<div class="col-2">
			{{$itemProduct->name}}
		</div>

		<div class="col-2">
			{{$itemProduct->format_price}}
		</div>
	</div>
	@endforeach
@endsection
