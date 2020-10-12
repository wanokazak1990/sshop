@extends('layouts.admin')

@section('content')
	
		@foreach($parameters as $param)
		<div class="row">
			<div class="">
				{{$param->name}}
			</div>
		</div>
		@endforeach
	
@endsection