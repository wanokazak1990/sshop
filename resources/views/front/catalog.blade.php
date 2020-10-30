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
<div class="pb-5 container-fluid {{isset($bg_color) ? $bg_color : '' }}">
	<div class="container" >
		
		<div class="row">
			<div class="col-12">
				<div class="h2 section-title">
					{{$category->name}}
				</div>
			</div>
		</div>

		@if(!empty($products))
		<div class="row">
			<div class="col-3">
				<div class=""> 
				@if($parameters)
					{{Form::open(['method'=>'GET','route'=>['view.catalog',$category]])}}
					@foreach($parameters as $itemParam)
						<div class="selectus">
							{{Form::label($itemParam->slug,$itemParam->name)}}
							{{Form::select($itemParam->slug,$itemParam->values->pluck('value','id'),Request::get($itemParam->slug),['class'=>' mb-3 ','placeholder'=>'Укажите значение'])}}

						</div>
					@endforeach

					{{Form::submit('Найти',['class'=>'btn btn-block btn-dark mt-3'])}}

					{{Form::close()}}
				@endif
				</div>
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
						{{$products->appends(Request::input())->links()}}
					</div>
				</div>
			</div>
		</div>
		@endif

		@if(!empty($categories))
			<div class="row row-cols-1 row-cols-md-5 category-menu">
				@foreach($categories as $cat)
				<div class="col ">
					<a href="{{route('view.catalog',$cat)}}">
						{{$cat->name}}
						<img src="{{asset('storage/categories/'.$cat->img)}}">
					</a>
				</div>
				@endforeach
			</div>
		@endif
	</div>
</div>

@endsection