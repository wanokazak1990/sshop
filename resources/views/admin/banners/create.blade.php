@extends('layouts.admin')

@section('content')

{!! Form::open($form) !!}
<div class="row">
	<div class="col-6">
		<div class="">
		    {!! Form::label('title', 'Заголовок') !!}
		    {!! Form::text('title', isset($banner->title) ? $banner->title : '', ['class'=>'form-control']) !!}
		</div>

		<div class="mt-3">
		    {!! Form::label('description', 'Текст') !!}
		    {!! Form::textarea('description', isset($banner->description) ? $banner->description : '', ['placeholder' => 'Текст', 'class'=>'form-control', 'style'=>'height: 150px;']); !!}
		</div>

		<div class="">
		    {!! Form::label('title', 'Ссылка') !!}
		    {!! Form::text('link', isset($banner->link) ? $banner->link : '', ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-4">
		<div class="mt-3">
			{!! Form::label('img','Изображение') !!}<br/>
			<img class="admin-category" src="{{isset($banner->img) ? asset('storage/'.$banner->getTable().'/'.$banner->img) : ''}}">			
		</div>
	</div>

	<div class="col-2">
		{!! Form::label('img',' ') !!}<br/>
		<div class="file_wraper">
		  <div class="form-group">
		    <label class="label">
		      <i class="fa fa-file"></i>
		      <span class="title">Выбрать файл (1000*400)</span>
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
		<a class="btn btn-danger btn-block" href="{{route('banners.index')}}">Отмена</a>
	</div>
</div>

{!! Form::close() !!}



@endsection
