$(document).ready(function(){
	var drop = $(document).find('.my-menu-drop')//это обёртка меню

	drop.find('.my-menu-back').each(function(i,item){
		$(this).attr('data-id',i)
		var head = $(this).closest('ul').parent().find('a')
		cloneHead = head.clone()
		cloneHead.find('.fa').removeClass('fa-angle-right').addClass('fa-angle-down')
		$(this).closest('ul').prepend('<li><span class="my-menu-head">Каталог '+cloneHead.html()+'</span></li>')
	})

	var defaultList = drop.find('.my-menu-list').first().html()//это список всех меню, и их подменю
	var list = '';

	function showFirst()
	{
		drop.html('')
		drop.append('<ul class="my-menu-list">'+defaultList+'</ul>')
		list = drop.find('.my-menu-list')
		list.addClass('d-none')
		list.first().removeClass('d-none')
	}

	$(document).on('click','.my-action, .my-menu-close',function(){//клик по кнопке открыть каталог
		if(drop.parent().hasClass('d-none'))//если у обёртки есть класс
		{
			drop.parent().removeClass('d-none')//удаляем класс
			showFirst()
			$(this).find('.fa').removeClass('fa-bars').addClass('fa-close')
			drop.removeClass('my-menu-animation-out')
			drop.addClass('my-menu-animation-in')
		}
		else //иначе
		{
			drop.removeClass('my-menu-animation-in')
			drop.addClass('my-menu-animation-out')
			setTimeout(() => {
				drop.parent().addClass('d-none')//добавляем класс
			}, 300);
			showFirst()
			$(this).find('.fa').removeClass('fa-close').addClass('fa-bars')
		}
	})

	$(document).on('click','.my-menu-list a',function(e){
		
		var subMenu = $(this).closest('li').find('.my-menu-list').first()
		var dataId = $(this).attr('data-id')
		
		if($(this).hasClass('my-menu-back'))
		{
			showFirst()
			drop.find('[data-id="'+dataId+'"]').parent().parent().addClass('d-none')
			drop.find('[data-id="'+dataId+'"]').parent().parent().parent().parent().removeClass('d-none')
			drop.html(drop.find('[data-id="'+dataId+'"]').parent().parent().parent().parent())
		}	
		else
		{
			if(subMenu.length)
			{	
				drop.html('')
				subMenu.removeClass('d-none')
				drop.append(subMenu)
			}
			else{
				
			}
		}
		
	})
})