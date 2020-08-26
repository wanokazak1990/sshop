@extends('layouts.admin')

@section('content')

{!! Form::open($form) !!}

<div class="">
    {!! Form::label('name', 'Название раздела') !!}
    {!! Form::text('name', isset($section->name) ? $section->name : '') !!}
</div>

<div class="">
    {!! Form::label('parent_id', 'Родительская категория') !!}
    {!! Form::select('parent_id', $parents, isset($section->parent_id) ? $section->parent_id : 0, ['placeholder' => 'Нет род. категории']); !!}
</div>

<div class="">
	{!! Form::label('sort', 'Порядок сортировки') !!}
	{!! Form::number('sort', isset($section->sort) ? $section->sort : ''); !!}
</div>

<div class="">
	{!! Form::label('live', 'Актуальность') !!}
	{!! Form::checkbox('live', '1', isset($section->name) ? $section->name : '0') !!}
</div>

<div class="">
	{!! Form::label('img','Изображение раздела') !!}
	{!! Form::file('img') !!}
</div>

<div class="">
	{!! Form::submit('Создать') !!}
</div>

{!! Form::close() !!}

@endsection