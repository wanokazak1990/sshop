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
	</div>
</div>

<div class="mt-3 row">
	<div class="col-2">
		{!! Form::submit('Создать',['class'=>'btn btn-success btn-block']) !!}
	</div>

	<div class="col-2">
		<a class="btn btn-danger btn-block" href="{{route('parameters.index')}}">Отмена</a>
	</div>
</div>

{{ Form::close()  }}
@endsection
