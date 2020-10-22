$(document).ready(function(){
	//ОПИСАНИЕ ПАРАМЕТРОВ ПРОДУКТОВ ОДНОЙ ВЫСОТЫ (МАКСИМАЛЬНОЙ)
	var height = 0
	$('.card .desc').each(function(){
		if($(this).height()>height)
			height = $(this).height()
	})
	$('.card .desc').height(height)

	getTotalCartPrice()


	//ФИКСАЦИЯ НАВИГАЦИИ ПРИ ПРОКРУТКЕ
	var navbar = $(document).find('.navbar')
	if(navbar.length>0)
	{
		var navbarDefaultY = navbar.offset().top
		var navbarHeight = navbar.outerHeight()
		navbar.parent().height(navbarHeight)
		$(window).on('scroll',function(){
			var currentScroll = $(window).scrollTop()
			if(currentScroll > navbarDefaultY)
			{
				navbar.addClass('fixed-top').addClass('border-bottom')
			}
			else
				navbar.removeClass('fixed-top').removeClass('border-bottom')
		})
	}
})