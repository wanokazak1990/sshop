$(document).ready(function(){
	var modal = $('#modal-window')
	var modalContent = modal.find('.modal-content')

	/*$(document).on('click','.cart',function(){
		var me = $(this)
		var url = me.attr('data-url')
		axios.get(url).then(function (response) {
			modalContent.html(response.data.content)
	        modal.modal('show')
	    }).catch(function (error) {
	        console.log(error)
	    })
	})*/

	$(document).on('click','.btn-to-cart',function(){
		var me = $(this)
		var url = me.attr('data-url')
		console.log(url)
		axios.post(url).then(function(response){
			me.removeClass('btn-push-card').addClass('btn-dark')
			window.ballToCart(me,$('.cart'),1)
			window.getTotalCartPrice()
		}).catch(function(error){
			console.log(error)
		})
	})

	$(document).on('click','.cart-control',function(){
		var me = $(this)
		var url = me.attr('data-url')
		var line = me.closest('.cart-row')
		axios.post(url).then(function(response){
			window.getTotalCartPrice()
			window.getItemProductPrice()
		}).catch(function(error){
			console.log(error)
		})
	})
})