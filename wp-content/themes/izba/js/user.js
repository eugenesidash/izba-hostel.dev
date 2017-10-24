$(document).ready(function(){
	// m3956: reduced/refactored from script.js
	$('menu a, #menu-dropdown li a, a.link-to-section, #callback a, #submenu a, .navbrand').click(function(e){
		e.preventDefault();
		var top = $($(this).attr('href')).offset().top;
		$('body,html').animate({scrollTop:top},1500);
	});
	$('#menu-dropdown-trigger').click(function(e){
		e.preventDefault();
		$('#menu-dropdown').toggle();
	});
	//
	var zboxsetup = {
		'#menu-dropdown-trigger':	['x',50,1.5,100],
		'.order-call':				['x',-50,1.5,100],
		'#tata1':					['x',50,1.5,100],
		'#tata3':					['x',-50,1.5,100],
		'#tata2':					['y',50,1.5,80],
		'#prod':					['y',-50,2,80],
		'.we-are .img, .contactbox h2':
									['y',-50,2,50],
		'.btn-izba, .link-to-section':
									['y',100,1.5,93],
		'.number p':				['y',100,1.5,50],
		'#num2ol, #num4ol':			['y',50,2,50],
		'#num8ol, #num10ol':		['y',-50,2,85],
		'#num4ro, #num10ro':		['x',50,3,100],
		'#num2ro, #num8ro':			['x',-50,3,100],
		'.wifi, .tehnika':			['y',-50,2,90],
		'.uborka, .ohrana':			['y',-50,2,90],
		'.transfer, .viza':			['y',50,2,90],
		'.kruglosutochno, .kuhnia':	['y',50,2,90],
		'address p:first':			['x',-75,2,100],
		'address:nth-child(2)':		['x',-75,2.3,100],
		'address span':
									['y',100,2,90],
		'address p:last':			['y',50,1,100],
		'.social_icon_fb':			['x',75,2,100],
		'.social_icon_ig':			['x',-75,2,100]
	};
	for(var s in zboxsetup){
		$(s).boxLoader({
			direction: zboxsetup[s][0],
			position: zboxsetup[s][1]+'%',
			effect: 'fadeIn',
			duration: zboxsetup[s][2]+'s',
			windowarea: zboxsetup[s][3]+'%'
		});
	}
	//
	$('.tabulous').each(function(){$(this).tabulous();});
	$('.up i').click(function(){$('html,body').animate({scrollTop:$('.boxes').offset().top},{queue:false,duration:1000});});
	// fullscreen modalz
	$('.modal-fullscreen').on('show.bs.modal',function(){setTimeout(function(){$('.modal-backdrop').addClass('modal-backdrop-fullscreen');},0);});
	$('.modal-fullscreen').on('hidden.bs.modal',function(){$('.modal-backdrop').addClass('modal-backdrop-fullscreen');});
	$(document).keydown(function(e){if(27 == e.keyCode){$('.modal').find('.close').trigger('click');}});
	// set booked room
	var zzzroom = null;
	$('button').click(function(e){
		if('modal' == $(this).data('toggle') && '#form-order' == $(this).data('target')){
			zzzroom = $(this).data('zzzroomid');
		}
	});
	$('#form-order').on('show.bs.modal',function(){
		if(zzzroom){
			$('#form-order').find('select').first().val(zzzroom);
		}
	});
	// gallery
	/*$(document).on('click','[data-toggle="lightbox"]',function(event){
		event.preventDefault();
		$(this).ekkoLightbox({
			alwaysShowClose: true,
			showArrows: true,
		});
	});*/
	// menu overlay
	$(window).scroll(function(){
		var pxa = $('#block1').first().offset();
		var pxb = $('#block2').offset();
		var pxc = $('#block3').offset();
		var pxd = $('#block4').offset();
		var pxe = $('#block5').offset();
		var zztop = $(window).scrollTop()+$('menu').first().height();
		//
		if(zztop >= pxa.top && zztop < pxb.top){
			$('menu a').css('color','silver');
			$('menu li, menu a').removeClass('menulinkact');
			$('menu li').eq(0).addClass('menulinkact');
			$('menu a').eq(0).addClass('menulinkact');
		}
		else if(zztop >= pxb.top && zztop < pxc.top){
			$('menu a').css('color','black');
			$('menu li, menu a').removeClass('menulinkact');
			$('menu li').eq(1).addClass('menulinkact');
			$('menu a').eq(1).addClass('menulinkact');
		}
		else if(zztop >= pxc.top && zztop < pxd.top){
			$('menu a').css('color','silver');
			$('menu li, menu a').removeClass('menulinkact');
			$('menu li').eq(2).addClass('menulinkact');
			$('menu a').eq(2).addClass('menulinkact');
		}
		else if(zztop >= pxd.top && zztop < pxe.top){
			$('menu a').css('color','black');
			$('menu li, menu a').removeClass('menulinkact');
			$('menu li').eq(3).addClass('menulinkact');
			$('menu a').eq(3).addClass('menulinkact');
		}
		else if(zztop >= pxe.top){
			$('menu a').css('color','black');
			$('menu li, menu a').removeClass('menulinkact');
			$('menu li').eq(4).addClass('menulinkact');
			$('menu a').eq(4).addClass('menulinkact');
			$('menu li').eq(5).addClass('menulinkact');
			$('menu a').eq(5).addClass('menulinkact');
		}
	});
	// final
	setTimeout('$(document).scroll();',1000);
});
