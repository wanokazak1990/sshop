window.getTotalCartPrice = function(){
	var url = $('meta[name="total-cart-price"]').attr('content')
	var cart = $('.cart')
	var cartIndikator = cart.find('.badge')
	
	axios.get(url).then(function(response){
		cartIndikator.html(response.data.count+'шт. / '+response.data.total+'руб.')
	}).catch(function(error){
		console.log('getTotalCartPrice не корректно работает')
	})
}

window.getItemProductPrice = function(){
	var cart = $('.cart')
	var url = cart.attr('href')
	var content = $('#cart-content')
	console.log(url)
	axios.post(url).then(function (response) {
		content.html(response.data.content)
    }).catch(function (error) {
        console.log(error)
    })
}