@extends('layouts.admin')

@section('content')


<div class="">
    {!! Form::label('name', 'Название раздела') !!}
    <div class="form-control">
    	{!!$section->name!!}
    </div>
</div>

<div class="">
    {!! Form::label('parent_id', 'Родительская категория') !!}
    <div class="form-control">
    	{!! ($section->parent_id) ? $parents[$section->parent_id] : 'Главная категория' !!}
    </div>
</div>

<div class="">
	{!! Form::label('sort', 'Порядок сортировки') !!}
	<div class="form-control">
		{!!$section->sort!!}
	</div>
</div>

<div class="">
	{!! Form::label('live', 'Актуальность') !!}
	<div class="form-control">
		<span class="{{ ($section->live) ? 'fa fa-check-square-o' : 'fa fa-square-o'}}"></span>
	</div>
</div>

<div class="">
	{!! Form::label('img','Изображение раздела') !!}
	{!! Form::file('img') !!}
</div>

<div class="row mt-3">
	<div class="col-2">
		<a href="{{route('sections.edit',$section)}}" class="btn-block btn btn-primary">Изменить</a>
	</div>
	<div class="col-2">
		<a href="{{route('sections.index')}}" class="btn-block btn btn-danger">Назад</a>
	</div>
</div>

{!! Form::close() !!}

@endsection