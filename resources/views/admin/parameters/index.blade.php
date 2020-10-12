@extends('layouts.admin')

@section('content')
		<div class="row py-3">
			<div class="col-12">
				<a class="btn btn-warning" href="{{route('parameters.create')}}">Добавить</a>
			</div>
		</div>
		@foreach($parameters as $param)
		<div class="row pb-1 d-flex align-items-center remove-row">
			<div class="col-1">
				<div class="btn-group">	
					<a class="btn btn-success fa fa-pencil-square-o" href="{{route('parameters.edit',$param)}}" title="Редактировать"></a>

					<a class="btn-del btn btn-danger fa fa-remove" data-url="{{route('parameters.destroy',$param)}}" title="Удалить"></a>
				</div>
			</div>

			<div class="col-3"> 
				{{$param->name}}
			</div>

			<div class="col-3">
				{{$param->category->name}}
			</div>

			<div class="col-5">
				@foreach($param->values as $itemVal)
					{{$itemVal->value}}
					@if(!$loop->last)
						/
					@endif
				@endforeach
			</div>
		</div>
		@endforeach
	
@endsection