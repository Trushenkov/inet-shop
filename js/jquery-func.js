function _init_slider(carousel) {
	$('#slider-nav a').bind('click', function() {
		var index = $(this).parent().find('a').index(this);
		carousel.scroll( index + 1);
		return false;
	});
};

function _active_slide(carousel, item, idx, state) {
	var index = idx-1;
	$('#slider-nav a').removeClass('active');
	$('#slider-nav a').eq(index).addClass('active');
};

/**
 * Запуск слайдера и задание параметров слайдера
 */
$(document).ready(function() {
	$("#slider-holder ul").jcarousel({
		scroll: 1, //перелистывание на 1 картинку
		auto: 5, //время показа одной картинки
		wrap: 'both', //скролл и в одну и в другую сторону
		initCallback: _init_slider,
		itemFirstInCallback: _active_slide,
	});
});
