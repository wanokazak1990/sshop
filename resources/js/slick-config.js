$(document).ready(function(){
  	$('.action-slider').slick({
	  infinite: true,
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  dots: true,
	});

	$('.blog-slider').slick({
	  infinite: true,
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  dots: true,
	});

	$('.sale-slider').slick({
	  infinite: true,
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  dots: true,
    });

    var height = 0
    $('.blog-slider .wrap').each(function(){
        if($(this).height() > height)
        {
            height = $(this).height()
        }
        console.log($(this).height())
    })
    $('.blog-slider .wrap').height(height)
});
