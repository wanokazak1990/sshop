@extends('layouts.admin')

@section('content')

{!! Form::open($form) !!}
<div class="row">
	<div class="col-6">
		<div class="">
			{{Form::label('articule','Артикул')}}
			{{Form::text('articule',isset($product->articule)?$product->articule:'',['class'=>'form-control', 'placeholder'=>'Артикул'])}}
		</div>
		<div class="">
			{{Form::label('name','Название')}}
			{{Form::text('name',isset($product->name)?$product->name:'',['class'=>'form-control', 'placeholder'=>'Название продукта'])}}
		</div>
		<div class="">
			{{Form::label('name','Описание')}}
			{{Form::textarea('desc',isset($product->desc)?$product->desc:'',['class'=>'form-control', 'placeholder'=>'Описание продукта'])}}
		</div>
		<div class="">
			{{Form::label('price','Цена')}}
			{{Form::number('price',isset($product->price)?$product->price:'', ['class'=>'form-control','step'=>'0.01', 'min'=>'0', 'placeholder'=>'0.00'])}}
		</div>
		<div class="">
			{{Form::label('category_id','Категория')}}
					{{Form::select('category_id', $categories,isset($product->category_id)?$product->category_id:'',['class'=>'form-control ', 'placeholder'=>'Название продукта'])}}
		</div>
	</div>

	<div class="col-4">
		<div class="mt-3">
			{!! Form::label('img','Изображение') !!}<br/>
			<img class="admin-category" src="{{isset($product->img) ? asset('storage/'.$product->getTable().'/'.$product->id.'/'.$product->img) : ''}}">			
		</div>
	</div>

	<div class="col-2">
		{!! Form::label('img',' ') !!}<br/>
		<div class="file_wraper">
		  <div class="form-group">
		    <label class="label">
		      <i class="fa fa-file"></i>
		      <span class="title">Выбрать файл (500*500)</span>
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
		<a class="btn btn-danger btn-block" href="{{route('products.index')}}">Отмена</a>
	</div>
</div>

{!! Form::close() !!}

@endsection