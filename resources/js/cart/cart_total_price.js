window.getTotalCartPrice = function(){
	var url = $('meta[name="total-cart-price"]').attr('content')
	var cart = $('.cart')
	var cartIndikator = cart.find('.badge')
	axios.get(url).then(function(response){
		cartIndikator.html(response.data.count+'шт. / '+response.data.total+'руб.')
	})
}