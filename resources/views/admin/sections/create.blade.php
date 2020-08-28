@extends('layouts.admin')

@section('content')

{!! Form::open($form) !!}
<div class="row">
	<div class="col-6">
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
	</div>

	<div class="col-4">
		<div class="mt-3">
			{!! Form::label('img','Изображение раздела') !!}<br/>
			<img class="admin-section" src="{{isset($section->img) ? asset('storage/sections/'.$section->img) : ''}}">			
		</div>
	</div>

	<div class="col-2">
		{!! Form::label('img',' ') !!}<br/>
		<div class="file_wraper">
		  <div class="form-group">
		    <label class="label">
		      <i class="fa fa-file"></i>
		      <span class="title">Выбрать файл</span>
		      {!! Form::file('img' ) !!}
		    </label>
		  </div>
		</div>
	</div>
</div>

<div class="mt-3 row">
	<div class="col-2"> 
		{!! Form::submit('Создать',['class'=>'btn btn-success btn-block']) !!}
	</div>

	<div class="col-2"> 
		<a class="btn btn-danger btn-block" href="{{route('sections.index')}}">Отмена</a>
	</div>
</div>

{!! Form::close() !!}



@endsection
