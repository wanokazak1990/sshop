//FLYING TO THE CART111
window.ballToCart = function ballToCart(ball,cart,status=1){

    var w = ball.width()+25;
    ball.clone()
    .css({
    	'width':w+'px',
        'position' : 'absolute',
        'z-index' : '9999',
        top: ball.offset().top,
        left:ball.offset().left
    })
    .appendTo("body")
    .animate({
            width: '50px',
            opacity: 0.05,
            left: cart.offset().left,
            top: cart.offset().top
        }, 1000, function() {  
            $(this).remove();
    });
}
