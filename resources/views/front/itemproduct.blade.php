@isset($itemProduct)
@if($itemProduct instanceof App\Models\Product)
<div class="col mb-4 product">
    <div class="card h-100">
        <div class="product-img">
          <a href="{{route('view.product',$itemProduct)}}">
            <img src="{{asset('storage/products/'.$itemProduct->id.'/'.$itemProduct->img)}}" class="card-img-top" alt="...">
            <div class="product-viewer">
              Подробнее
            </div>
          </a>
        </div>
        <div class="card-body">
          <h5 class="card-title">{{$itemProduct->name}}</h5>



          <div class="desc">
            @if($itemProduct->properties->isNotEmpty())
              @foreach($itemProduct->properties as $itemProperty)
                <div class="row">
                  <div class="col-5">
                    {{$itemProperty->value->parameter->name}}
                  </div>

                  <div class="col-7">
                    {{$itemProperty->value->value}}
                  </div>
                </div>
              @endforeach
            @endif
          </div>

          <div class="price">
            {{$itemProduct->format_price}} руб.
          </div>

          <div class="articule">
            Артикул: {{$itemProduct->articule}}
          </div>
        </div>

        <div class="card-footer">
          <button class="btn btn-block btn-push-card" data-url="{{route('cart.add',$itemProduct)}}">В корзину</button>
        </div>
    </div>
</div>
@endif
@endisset