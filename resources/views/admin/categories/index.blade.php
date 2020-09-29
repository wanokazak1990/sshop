@extends('layouts.admin')

<?php function write($data,$tab){ ?>

	<?php ++$tab; foreach($data as $item) : ?>

		<div class="remove-row ">
			<div class="row d-flex align-items-center hovered border-bottom py-1">
				<div class="col-1 pl-0">
					<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
						<a class="btn btn-primary fa fa-share" href="{{route('categories.show',$item)}}" title="Открыть"></a>
					
						<a class="btn btn-success fa fa-pencil-square-o" href="{{route('categories.edit',$item)}}" title="Редактировать"></a>
					
						<a class="btn-del btn btn-danger fa fa-remove" data-url="{{route('categories.destroy',$item)}}" title="Удалить"></a>
					</div>
				</div>
				<div class="col-9">
					@for($i=0;$i<=$tab;$i++)
						<i class="pl-4" aria-hidden="true"></i>
					@endfor

					@if($tab==-1)
						<b>
					@endif

						{{$item->name}}

					@if($tab==-1)
						</b>
					@endif

				</div>
				<div class="col-1" >
					{{$item->sort}}
				</div>
				<div class="col-1">
					<span class="{{ ($item->live) ? 'fa fa-check-square-o' : 'fa fa-square-o'}}"></span>
				</div>
			</div>
			<?php write($item->children,$tab);?>
		</div>

	<?php endforeach;?>

<?php } ?>

@section('content')
<div class="row pb-3">
	<div class="col-12 pl-0">
		<a class="btn btn-warning" href="{{route('categories.create')}}">Добавить</a>
	</div>
</div>


		{{write($categories->where('parent_id',0),-2)}}



@endsection