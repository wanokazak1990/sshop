@extends('layouts.admin')

@section('content')

{!! Form::open($form) !!}
<div class="row">
	<div class="col-6">
		<div class="">
		    {!! Form::label('name', 'Название раздела') !!}
		    {!! Form::text('name', isset($category->name) ? $category->name : '', ['class'=>'form-control']) !!}
		</div>

		<div class="mt-3">
		    {!! Form::label('parent_id', 'Родительская категория') !!}
		    @isset(request()->parent_id)
		    	{!! Form::select(
		    		'parent_id', 
		    		$parents, 
		    		request()->parent_id, 
		    		[
		    			'placeholder' => 'Нет род. категории', 
		    			'class'=>'form-control'
		    		]
		    	); !!}
		    @else
		    	{!! Form::select('parent_id', $parents, isset($category->parent_id) ? $category->parent_id : 0, ['placeholder' => 'Нет род. категории', 'class'=>'form-control']); !!}
		    @endif
		</div>

		<div class="mt-3">
			<div class="row">
				<div class="col"> 
					{!! Form::label('sort', 'Порядок') !!}
					{!! Form::number('sort', isset($category->sort) ? $category->sort : '',['class'=>'form-control']); !!}
				</div>
				<div class="col">
					{!! Form::label('final', 'Финальная') !!}
					<div class="form-control"> 
						{!! Form::checkbox('final', '1', isset($category->final) ? $category->final : '0') !!}
					</div>
				</div>

				<div class="col">
					{!! Form::label('live', 'Актуальность') !!}
					<div class="form-control"> 
						{!! Form::checkbox('live', '1', isset($category->live) ? $category->live : '0') !!}
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-4">
		<div class="mt-3">
			{!! Form::label('img','Изображение раздела') !!}<br/>
			<img class="admin-category" src="{{isset($category->img) ? asset('storage/categories/'.$category->img) : ''}}">			
		</div>
	</div>

	<div class="col-2">
		{!! Form::label('img',' ') !!}<br/>
		<div class="file_wraper">
		  <div class="form-group">
		    <label class="label">
		      <i class="fa fa-file"></i>
		      <span class="title">Выбрать файл(500*500)</span>
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
		<a class="btn btn-danger btn-block" href="{{route('categories.index')}}">Отмена</a>
	</div>
</div>

{!! Form::close() !!}



@endsection
