$(document).ready(function () {
    if ($('.sidebar')) InitMenuEffects();
    $.getScript('/js/plugin.js', function () { });
});


/* *********************************************************************
 * Main Menu
 * *********************************************************************/
function InitMenuEffects () {
	/* Sliding submenus */
	$('.sidebox ul ul').hide();
	$('.sidebox ul li .active ul').show();
	
	$('.sidebox ul li a').click(function () {
		submenu = $(this).parent().find('ul');
		if (submenu.is(':visible'))
			submenu.slideUp(150);					
		else
			submenu.slideDown(200);				
	});
	
	/* Hover effect on links */
	$('.sidebox li a').hover(
		function () { $(this).stop().animate({'paddingLeft': '18px'}, 200); },
		function () { $(this).stop().animate({'paddingLeft': '1px'}, 200); }
	)
		/* Sliding submenus */
		$('.sidenews ul ul').hide();
	$('.sidenews ul li .active ul').show();
	
	$('.sidenews ul li a').click(function () {
		submenu = $(this).parent().find('ul');
		if (submenu.is(':visible'))
			submenu.slideUp(150);					
		else
			submenu.slideDown(200);				
	});
	
	/* Hover effect on links */
	$('.sidenews li a').hover(
		function () { $(this).stop().animate({'paddingLeft': '18px'}, 200); },
		function () { $(this).stop().animate({'paddingLeft': '1px'}, 200); }
	)
}

function rGet(cqstr, name) {
    if (cqstr == '') cqstr = location.search;
    name += '=';
    var value = cqstr.replace('?' + name, '&' + name);
    name = '&' + name;
    if (value.indexOf(name) > -1) {
        value = value.substring(value.indexOf(name) + name.length);
        if (value.indexOf('&') > -1) value = value.substring(0, value.indexOf('&'));
    } else value = '';
    return value;
}

String.prototype.replaceAll = function (s1, s2) {
    return this.replace(new RegExp(s1, "gm"), s2);
}

var curl = top.location.toString();
if (curl.indexOf("&rn=") > 0) curl = curl.substring(0, curl.indexOf("&rn="));

jQuery.mySlider = {
    build: function (options) {
        if (this.length > 0)
            return jQuery(this).each(function (i) {
                var 
				$this = $(this),
				bgSlider = jQuery('<div>', { id: 'bgSlider' }),
				Slider = jQuery('<div>', { id: 'Slider' }),
                Icons = jQuery('<div>', { id: 'Icons' });
                Txts = jQuery('<div>', { id: 'Txts' });

                bgSlider.appendTo($this);
                Txts.insertAfter(bgSlider);
                Icons.insertAfter(bgSlider);
                Slider.appendTo(bgSlider);
                $this.show();
                Txts.text(options.txt);

                Slider.draggable({
                    revert: function () {
                        if (parseInt(Slider.css("left")) > 150) return false;
                        else return true;
                    },
                    containment: bgSlider,
                    axis: 'x',
                    stop: function (event, ui) {
                        if (ui.position.left > 150) {
                            Icons.css('background-position', '-16px 0');
                            Txts.css("color", "#007B09");
                            setTimeout(options.success, 1000);
                        }
                    }
                });
            });
    }
};  jQuery.fn.mySlider = jQuery.mySlider.build;


function getUnixTime(time) {
    var yt = new Date(time * 1000);
    var nt = yt.getFullYear() + '-' + (yt.getMonth() + 1) + '-' + yt.getDate() + ' ' + yt.getHours() + ':' + yt.getMinutes() + ':' + yt.getSeconds();
    return nt;
}