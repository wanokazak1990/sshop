$(document).ready(function(){
	var modal = $('#modal-window')
	var modalContent = modal.find('.modal-content')

	$(document).on('click','.cart',function(){
		var me = $(this)
		var url = me.attr('data-url')
		axios.get(url).then(function (response) {
			modalContent.html(response.data.content)
	        modal.modal('show')
	    }).catch(function (error) {
	        console.log(error)
	    })
	})

	$(document).on('click','.btn-push-card',function(){
		var me = $(this)
		var url = me.attr('data-url')
		axios.post(url).then(function(response){
			window.ballToCart(me,$('.cart'),1)
			window.getTotalCartPrice()
		}).catch(function(error){
			console.log(error)
		})
	})
})