$(document).ready(function(){
	$('.slider').slick({
		arrows: true,
		slidesToShow: 3,
		slidesToScroll: 2,
		infinite: false,
		speed:1000,
		draggable: false,
		swipe: false,
		waitForAnimate: true,
	});
});