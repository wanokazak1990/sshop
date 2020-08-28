@extends('layouts.admin')

@section('content')
<div class="row pb-3">
	<div class="col-12 pl-0">
		<a class="btn btn-warning" href="{{route('sections.create')}}">Добавить</a>
	</div>
</div>
@foreach($sections as $itemSection)
	<div class="remove-row py-1 border-bottom ">
		<div class="row d-flex align-items-center hovered">
			<div class="col-1 pl-0">
				<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
					<a class="btn btn-primary fa fa-share" href="{{route('sections.show',$itemSection)}}"></a>
				
					<a class="btn btn-success fa fa-pencil-square-o" href="{{route('sections.edit',$itemSection)}}"></a>
				
					<a class="btn-del btn btn-danger fa fa-remove" data-url="{{route('sections.destroy',$itemSection)}}"></a>
				</div>
			</div>
			<div class="col-9">
				<b>{{$itemSection->name}}</b>
			</div>
			<div class="col-1" >
				{{$itemSection->sort}}
			</div>
			<div class="col-1">
				<span class="{{ ($itemSection->live) ? 'fa fa-check-square-o' : 'fa fa-square-o'}}"></span>
			</div>
		</div>

		@isset($itemSection->children)
			@foreach($itemSection->children as $itemChild)
				<div class="remove-row pt-1 ">
					<div class="row d-flex align-items-center hovered">
					<div class="col-1 pl-0">
						<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
							<a class="btn btn-primary fa fa-share" href="{{route('sections.show',$itemChild->id)}}"></a>
			
							<a class="btn btn-success fa fa-pencil-square-o"  href="{{route('sections.edit',$itemChild->id)}}"></a>
						
							<a class="btn-del btn btn-danger fa fa-remove" data-url="{{route('sections.destroy',$itemChild)}}"></a>
						</div>
					</div>
					<div class="col-9">
						<span class="mr-3 fa fa-caret-right"></span> 
						{{$itemChild->name}}
					</div>
					<div class="col-1">
						{{$itemChild->sort}}
					</div>
					<div class="col-1">
						<span class="{{ ($itemChild->live) ? 'fa fa-check-square-o' : 'fa fa-square-o'}}"></span>
					</div>
					</div>
				</div>
			@endforeach
		@endisset
		
	</div>
@endforeach

@endsection