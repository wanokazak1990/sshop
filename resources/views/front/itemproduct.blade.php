@isset($itemProduct)
@if($itemProduct instanceof App\Models\Product)
<div class="col mb-4">
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
            <div class="row border-bottom">
              <div class="col-6">Бренд:</div>
              <div class="col-6">Shell</div>
            </div>
            <div class="row border-bottom">
              <div class="col-6">Страна:</div>
              <div class="col-6">Чехия</div>
            </div>
          </div>

          <div class="price">
            {{$itemProduct->format_price}} руб.
          </div>

          <div class="articule">
            Артикул: {{$itemProduct->articule}}
          </div>
        </div>

        <div class="card-footer">
          <button class="btn btn-block btn-push-card">В корзину</button>
        </div>
    </div>
</div>
@endif
@endisset