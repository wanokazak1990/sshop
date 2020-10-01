@extends('layouts.admin')

@section('content')
<div class="row pb-3">
	<div class="col-12 pl-0">
		<a class="btn btn-warning" href="{{route('banners.create')}}">Добавить</a>
		<div class="row banner" >
		@if($banners->isNotEmpty())
			@foreach($banners as $itemBanner)
				<div class="col-4 remove-row" >
					<div class="h3">
						{{$itemBanner->title}}
					</div>
					<div class="">
						{{$itemBanner->description}}
					</div>
					<img src="{{asset('storage/banners/'.$itemBanner->img)}}">
					<a class="" href="{{route('banners.edit',$itemBanner)}}">Редактировать</a>
					<a class="btn-del" data-url="{{route('banners.destroy',$itemBanner)}}">Удалить</a>
				</div>
			@endforeach
		@endif
		</div>
	</div>
</div>
@endsection