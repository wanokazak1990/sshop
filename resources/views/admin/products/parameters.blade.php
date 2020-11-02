@if($parameters->isNotEmpty())

	@foreach($parameters as $itemParameter)
		<div class="">
			{{Form::label('values[]',$itemParameter->name)}}
			{{Form::select('values[]',$itemParameter->values->pluck('value','id'),'',['class'=>'form-control','placeholder'=>'Укажите значение'])}}
		</div>
	@endforeach

@endif