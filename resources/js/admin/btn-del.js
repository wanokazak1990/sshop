$(document).ready(function(){
	$('.btn-del').on('click',function(){
		var button = $(this)
		var url = $(this).attr('data-url')
		var status = confirm('Удалить эту запись?')
		if(status)
		{
			axios.delete(url).then(function (response) {
		        button.closest('.remove-row').remove()
		    }).catch(function (error) {
		        console.log(error)
		    })
		}
	})
})