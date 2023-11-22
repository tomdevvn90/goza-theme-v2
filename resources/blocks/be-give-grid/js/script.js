jQuery(document).ready(function($) {
	$('.progress').each(function(){
        
		var ref = $(this);
		var totalWidth = $(this).width();
		var barWidth = $(this).find('div.bar').width();
		var percent = barWidth/totalWidth * 100;
		progress(percent, ref);
	});
});

function progress(percent, $element) {
    var progressBarWidth = percent * $element.width() / 100;
    var unit = 'px';
    var cssWidth = progressBarWidth + unit;
    $element.find('div.bar').width(0);
    $element.find('div.bar').animate({width: cssWidth }, 1500);
}