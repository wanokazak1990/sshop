<button 
	class="btn btn-block btn-to-cart {{(\App\Services\Cart\Cart::checkProduct($product->id)) ? 'btn-dark' : 'btn-push-card'}} " 
	data-url="{{ isset($route) ? $route : route('cart.add',$product)}}"
>
{{isset($title) ? $title : 'В корзину'}}
</button>