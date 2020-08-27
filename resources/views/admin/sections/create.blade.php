@extends('layouts.admin')

@section('content')

{!! Form::open($form) !!}

<div class="">
    {!! Form::label('name', 'Название раздела') !!}
    {!! Form::text('name', isset($section->name) ? $section->name : '', ['class'=>'form-control']) !!}
</div>

<div class="mt-3">
    {!! Form::label('parent_id', 'Родительская категория') !!}
    {!! Form::select('parent_id', $parents, isset($section->parent_id) ? $section->parent_id : 0, ['placeholder' => 'Нет род. категории', 'class'=>'form-control']); !!}
</div>

<div class="mt-3">
	{!! Form::label('sort', 'Порядок сортировки') !!}
	{!! Form::number('sort', isset($section->sort) ? $section->sort : '',['class'=>'form-control']); !!}
</div>

<div class="mt-3">
	{!! Form::label('live', 'Актуальность') !!}
	{!! Form::checkbox('live', '1', isset($section->live) ? $section->live : '0') !!}
</div>

<div class="mt-3">
	{!! Form::label('img','Изображение раздела') !!}<br/>
	{!! Form::file('img' ) !!}
</div>

<div class="mt-3">
	{!! Form::submit('Создать') !!}
</div>

{!! Form::close() !!}

@endsection