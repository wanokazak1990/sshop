@extends('layouts.admin')

@section('content')

{!! Form::open($form) !!}
<div class="row">
	<div class="col-6">
        <div>
            {{ Form::label('name', 'Название параметра') }}
            {{ Form::text('name', (isset($parameter->name))?$parameter->name: '', ['class'=>'form-control']) }}
        </div>

        <div>
            {{ Form::label('category_id', 'Категория') }}
            {{ Form::select('category_id', $categories, (isset($parameter->category_id))?$parameter->category_id: '0', ['placeholder' => 'Укажите категорию','class'=>'form-control']) }}
        </div>

        <div class="mt-3 row">
			<div class="col-6">
				{!! Form::submit('Создать',['class'=>'btn btn-success btn-block']) !!}
			</div>

			<div class="col-6">
				<a class="btn btn-danger btn-block" href="{{route('parameters.index')}}">Отмена</a>
			</div>
		</div>
	</div>

	<div class="col-6">
		<div class="row">
			<div class="col-12">
				<label>Значения параметра</label>
			</div>
		</div>
		<div class="values-content">
			
			@if( isset($parameter) && $parameter->id)
				@foreach($parameter->values as $itemVal)
					<div class="row pb-1">
						<div class="col-10">
							{{Form::text('value['.$itemVal->id.']',$itemVal->value,['class'=>'form-control'])}}
						</div>
						<div class="col-2">
							<a data-url="{{route('value.destroy')}}" class="btn-del btn btn-block btn-danger fa fa-close"></a>
						</div>
					</div>

				@endforeach
			@endif
			<div class="row pb-1 default-val">
				<div class="col-10">
					{{Form::text('value[]','',['class'=>'form-control'])}}
				</div>
				<div class="col-2">
					<a data-url="" class="btn-clear btn btn-block btn-danger fa fa-close"></a>
				</div>
			</div>
		</div>

		<div class="row pt-4">
			<div class="col-12">
				<button type="button" class="btn btn-block btn-primary fa fa-plus append-val"></button>
			</div>
		</div>
	</div>
</div>





{{ Form::close()  }}
@endsection
