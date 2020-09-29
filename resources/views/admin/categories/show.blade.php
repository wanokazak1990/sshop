@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-8">
		<div class="">
		    {!! Form::label('name', 'Название раздела') !!}
		    <div class="form-control">
		    	{!!$category->name!!}
		    </div>
		</div>

		<div class="">
		    {!! Form::label('parent_id', 'Родительская категория') !!}
		    <div class="form-control">
		    	{!! ($category->parent_id) ? $parents[$category->parent_id] : 'Главная категория' !!}
		    </div>
		</div>

		<div class="">
			{!! Form::label('sort', 'Порядок сортировки') !!}
			<div class="form-control">
				{!!$category->sort!!}
			</div>
		</div>

		<div class="">
			{!! Form::label('live', 'Актуальность') !!}
			<div class="form-control">
				<span class="{{ ($category->live) ? 'fa fa-check-square-o' : 'fa fa-square-o'}}"></span>
			</div>
		</div>
	</div>

	<div class="col-4">

		<div class="">
			{!! Form::label('img','Изображение раздела') !!}
			<img class="admin-category" src="{{isset($category->img) ? asset('storage/categories/'.$category->img) : ''}}">
		</div>

	</div>
</div>

<div class="row mt-3">
	<div class="col-2">
		<a href="{{route('categories.edit',$category)}}" class="btn-block btn btn-primary">Изменить</a>
	</div>
	<div class="col-2">
		<a href="{{route('categories.index')}}" class="btn-block btn btn-danger">Назад</a>
	</div>
</div>

{!! Form::close() !!}

@endsection