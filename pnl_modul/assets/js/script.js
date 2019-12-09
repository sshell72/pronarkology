//menu close
$('.panel-menu-container').prepend('<div class="close"></div>');

// fancybox
var thumbnails = jQuery("a:has(img)").not(".nolightbox").filter(function () {
	return /\.(jpe?g|png|gif|bmp)$/i.test(jQuery(this).attr('href'));
});
var fancybox = jQuery('.fancybox');
fancybox.each(function () {
	jQuery(this).find(thumbnails).attr('data-fancybox', "group-" + fancybox.index(this));
});

// burger menu
$('.panel .burger-menu').click(function () {
	$('.panel .panel-menu-container').toggleClass('active');
	$('body').toggleClass('menu-active');
	$('.bg-menu').bind('touchmove', function (e) {
		e.preventDefault()
	});
	$('.bg-menu').bind('scroll', function (e) {
		e.preventDefault()
	})
});
$('.menu .burger-menu').click(function () {
	$('.menu .pro-menu-container').toggleClass('active');
	$('body').toggleClass('menu-active');
	$('.bg-menu').bind('touchmove', function (e) {
		e.preventDefault()
	});
	$('.bg-menu').bind('scroll', function (e) {
		e.preventDefault()
	})
});

$('.panel .close').click(function () {
	$('.panel .panel-menu-container').toggleClass('active');
	$('body').toggleClass('menu-active');
	$('.bg-menu').unbind('touchmove')
});
$('.menu .close').click(function () {
	$('.menu .pro-menu-container').toggleClass('active');
	$('body').toggleClass('menu-active');
	$('.bg-menu').unbind('touchmove')
});

$('.bg-menu').click(function () {
	$('.panel .panel-menu-container').removeClass('active');
	$('.menu .pro-menu-container').removeClass('active');
	$('body').removeClass('menu-active');
	$('.bg-menu').unbind('touchmove')
});

// block-4
// Smart Wizard
$(".next-btn").on("click", function () {
	// Navigate next
	$('#smartwizard').smartWizard("next");
	return true;
});
$('#smartwizard').smartWizard({
	selected: 0,
	theme: 'default',
	transitionEffect: 'fade',
	showStepURLhash: false,
	useURLhash: false,
	contentCache: false,
	anchorSettings: {
		removeDoneStepOnNavigateBack: true,
	},
	toolbarSettings: {
		toolbarPosition: 'none',
		toolbarButtonPosition: 'none',
		showNextButton: false,
		showPreviousButton: false,
	}
});

$('.btn-zero').on('click', function () {
	$('.step-0').hide();
	$('.steps ul .active').addClass('active-first');
	$('#step-1').addClass('act');
});

// block-5
$('.block-5 .slider').slick({
	infinite: true,
	slidesToShow: 4,
	slidesToScroll: 1,
	arrows: true,
	dots: false,
	autoplay: true,
	autoplaySpeed: 10000,
	responsive: [
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
			}
		},
		{
			breakpoint: 576,
			settings: {
				slidesToShow: 1,
			}
		}
	]
});

// block-6
$('.block-6 .slider').slick({
	infinite: true,
	slidesToShow: 3,
	slidesToScroll: 1,
	arrows: true,
	dots: false,
	autoplay: true,
	autoplaySpeed: 10000,
	responsive: [
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 2,
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 1,
			}
		},
	]
});

// block-8
$('.block-8 .slider').slick({
	infinite: true,
	slidesToShow: 4,
	slidesToScroll: 1,
	arrows: true,
	dots: false,
	autoplay: true,
	autoplaySpeed: 10000,
	responsive: [
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
			}
		},
		{
			breakpoint: 576,
			settings: {
				slidesToShow: 1,
			}
		}
	]
});

// block-16
$('.block-16 .slider').slick({
	infinite: true,
	slidesToShow: 4,
	slidesToScroll: 1,
	arrows: true,
	dots: false,
	autoplay: true,
	autoplaySpeed: 10000,
	responsive: [
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
			}
		},
		{
			breakpoint: 576,
			settings: {
				slidesToShow: 1,
			}
		}
	]
});

//star
$('.rating2').on('click', 'span', function () {
	$('.rating2 span').removeClass('active');
	$(this).addClass('active');
	$('#rating_review').val(5-$( this ).index());
});

// blocks animation
Revealator.effects_padding = "-100";
$("body").css("opacity", "1");

// count animation
if ($('#counter').length) {
	var a = 0;
	$(window).scroll(function () {
		var oTop = $("#counter").offset().top - window.innerHeight;
		if (a == 0 && $(window).scrollTop() > oTop) {
			$(".counter-value").each(function () {
				var $this = $(this),
				countTo = $this.attr("data-count");
				$({
					countNum: $this.text()
				}).animate(
				{
					countNum: countTo
				},
				{
					duration: 1500,
					easing: "swing",
					step: function () {
						$this.text(Math.floor(this.countNum));
					},
					complete: function () {
						$this.text(this.countNum);
						//alert('finished');
					}
				}
				);
			});
			a = 1;
		}
	});
}

// search
$('.input-search').focus(function () {
	$(this).parents('.search-form').addClass('active');
});

$('.input-search').focusout(function () {
	$(this).parents('.search-form').removeClass('active');
});

$(document).ready(function() {
	$('.js-example-basic-single').select2();
	
	$('.js-example-basic-single').on('change', function(){
		var city_name = $(this).val(),
		date = new Date(Date.now() + 86400e3);
    document.cookie = 'city_name='+city_name+'; path=/; expires=-' + date;
		location.reload();
	});
	
	ymaps.ready(init);
	function init(){
		// Создание карты.
		var myMap = new ymaps.Map("map", {
			center: [$('#map').attr('data-lat'), $('#map').attr('data-lon')],
			zoom: 15,
			type: 'yandex#map',
		});
		if($('.map-info')){
			myMap.balloon.open(myMap.getCenter(), {
				contentBody: '<div class="map-info-bal">'+$('.map-info').html()+'</div>',
			});
		}
	}
});

//антибот
$("form").append(
	'<input type="hidden" name="antibot" value="wjdnnsj9a77ga65sgdb">'
);

var ajax_url = '/wp-admin/admin-ajax.php';

//отправка отзыва
$(document).on("submit", "#commentform", function(e) {
	e.stopPropagation();
	e.preventDefault();
	
	var the_form = $(this);
	
	if (!grecaptcha.getResponse()) {
		show_hide('.robot-limit');
		return false;    
	}
	
	if(the_form.find('#inputGroupFile01').prop('files')[0]){
		parts = the_form.find('#inputGroupFile01').prop('files')[0].name.split('.');
		if (parts.length > 1) 
		ext = parts.pop();
		if(ext != 'jpeg' && ext != 'jpg' && ext != 'png'){
			show_hide('.type-limit');
			return false;
		}
		
		if(the_form.find('#inputGroupFile01').prop('files')[0].size > 1048576){
			show_hide('.size-limit');
			return false;
		}
	}
	if (
		!the_form.find("input[name=antibot]").length &&
		the_form.find("input[name=antibot]") != "wjdnnsj9a77ga65sgdb"
	)
	return false;
	
	the_form.find("#hp_loading").show();
	
	var post_id = the_form.attr('data-id'),
	fd = new FormData(document.getElementById("commentform"));
	
	fd.append('img', the_form.find('#inputGroupFile01').prop('files')[0]);
	fd.append('post_id', post_id);
	fd.append('action', 'add_comment_send_request');
	
	$.ajax({
		url: ajax_url,
		type: "POST",
		data: fd,
		cache       : false,
		dataType: "json",
		processData : false,
		contentType : false, 
		success: function(res) {
			the_form.find("#hp_loading").hide();
			if(!res.error){
				the_form["0"].reset();
				$('.rating2 span').removeClass('active');
			}
			$('#callback').find('form').hide();
			$('#callback').find('.title').text(res.info_title);
			$('#callback').find('.desc').text(res.info_text);
			$.fancybox.open({
				src  : '#callback',
				type : 'inline',
				opts : {
					onComplete : function() {
						console.info('done!');
					}
				}
			});
			setTimeout(function() {
				$("#callback")
				.find(".fancybox-close-small")
				.trigger("click");
			}, 3000);
		},
		error: function(res){
			the_form.find("#hp_loading").hide();
		}
	});
	
});

//Еще отзывы
$(document).on("click", "#download_more_reviews", function(e) {
	e.stopPropagation();
	e.preventDefault();
	
	var post_id = $('#commentform').attr('data-id'),
	offset = $(this).attr('data-offset'),
	offsets = $(this).attr('data-offsets'),
	bat = $(this);
	
	bat.find("#hp_loading").show();
	
	var data = {
		action: "download_more_reviews",
		offset: offsets,
		post_id: post_id
	}; 
	
	$.ajax({
		url: ajax_url,
		type: "POST",
		data: data,
		cache: false,
		dataType: "json",
		success: function(res) {
			bat.find("#hp_loading").hide();		
			var offs = Number.parseInt(offset)+Number.parseInt(offsets);
			$('.block-18 #reviev-but').before(res.coment_list_main);
			$('#download_more_reviews').attr('data-offsets',offs);
			if(offs >= res.comments)
			$('#reviev-but').hide();
		}
	});
	
});

$("#text_review").keyup(function() {
	if (this.value.length > 1000){
		this.value = this.value.substr(0, 1000);
		show_hide('.character-limit');
	}
});

function show_hide(class_sh){
	$(class_sh).show(400);
	setTimeout(function() {
		$(class_sh).hide(400);   
	}, 3000);
	
}	

$('#inputGroupFile01').on( 'change',
	function(e) {
		if(e.target.files[0]){
			$('.foto-limit p').text(e.target.files[0].name);
			$('.foto-limit').show(400);
			$(this).parent('.custom-file').addClass("active");
		}
	});			
	
