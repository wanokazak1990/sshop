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
	});

	$('.append-val').on('click',function(){
		var added = $('.default-val').clone().removeClass('default-val')
		added.find('input').val('')
		$('.values-content').prepend(added)
	});

	$(document).on('click','.btn-clear',function(){
		var row = $(this).closest('.row')
		if(row.hasClass('default-val'))
			row.find('input').val('')
		else
			row.remove()
	})
})