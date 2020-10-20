$(document).ready(function(){
	var height = 0
	$('.card .desc').each(function(){
		if($(this).height()>height)
			height = $(this).height()
	})
	$('.card .desc').height(height)
})