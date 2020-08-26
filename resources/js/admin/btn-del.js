$(document).ready(function(){
	$('.btn-del').on('click',function(){
		var url = $(this).attr('data-url')
		var status = confirm('Удалить эту запись?')
		if(status)
		{
			axios.delete(url).then(function (response) {
		        alert('del')
		    }).catch(function (error) {
		        alert(error)
		    })
		}
	})
})