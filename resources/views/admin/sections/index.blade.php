@extends('layouts.admin')

@section('content')
<table class="table">
@foreach($sections as $itemSection)
	<tr>
		<td>
			<a href="{{route('sections.show',$itemSection)}}">Открыть</a>
		</td>
		<td>
			<a href="{{route('sections.edit',$itemSection)}}">Изменить</a>
		</td>
		<td>
			<a class="btn-del" data-url="{{route('sections.destroy',$itemSection)}}">Удалить</a>
		</td>
		<td>
			{{$itemSection->name}}
		</td>
		<td>
			
		</td>
	</tr>

	@isset($itemSection->children)
		@foreach($itemSection->children as $itemChild)
			<tr>
				<td>
					<a href="{{route('sections.show',$itemChild->id)}}">Открыть</a>
				</td>
				<td>
					<a href="{{route('sections.edit',$itemChild->id)}}">Изменить</a>
				</td>
				<td>
					<a class="btn-del" data-url="{{route('sections.destroy',$itemChild)}}">Удалить</a>
				</td>
				<td></td>
				<td>{{$itemChild->name}}</td>
			</tr>
		@endforeach
	@endisset

@endforeach

@endsection