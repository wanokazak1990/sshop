@extends('layouts.app')

@section('breadcrups')
<div class="container">
	<div class="row">
		<div class="col-12">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Главная</a></li>

					@foreach($breadCrumbs as $crumb)
						@if($loop->last)
							<li class="breadcrumb-item active" aria-current="page">{{$crumb->name}}</li>
						@else
							<li class="breadcrumb-item"><a href="{{route('view.catalog',$crumb)}}">{{$crumb->name}}</a></li>
						@endif
					@endforeach

					
				</ol>
			</nav>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="container-fluid {{isset($bg_color) ? $bg_color : '' }}">
	<div class="container" >
		
		<div class="row">
			<div class="col-12">
				<div class="h2 section-title">
					{{$category->name}}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-3">

			</div>

			<div class="col-9">
				<div class="row row-cols-1 row-cols-md-3">
				@if($products->isNotEmpty())
					@foreach($products as $itemProduct)
						@include('front.itemproduct')
					@endforeach
				@endif
				</div>

				<div class="row">
					<div class="col-12">
						{{$products->links()}}
					</div>
				</div>
			</div>
	</div>
</div>

@endsection