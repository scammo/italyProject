	/***********/
	/*VARIABLES*/
	/***********/
	var smallSliderOptions = new Object({
		minSlides: 1,
		maxSlides: 1,
		moveSlides: 1,
		pager: false,
		randomStart: true,
		auto: true,
		autoHover: true,
		onSliderLoad: function(){
			showSlider();
		}
	});

	var mediumSliderOptions = new Object({
		minSlides: 2,
		maxSlides: 2,
		moveSlides: 1,
		pager: false,
		randomStart: true,
		auto: true,
		autoHover: true,
		onSliderLoad: function() {
			showSlider();
		}
	});

	var bigSliderOptions = new Object({
		minSlides: 3,
		maxSlides: 3,
		moveSlides: 1,
		pager: false,
		randomStart: true,
		auto: true,
		autoHover: true,
		onSliderLoad: function(){
			showSlider();
		}
	});

	var smallSliderLoaded = false;

	/***********/
	/*FUNCTIONS*/
	/***********/

	function showSlider(){
		$('#slider .box').css('visibility','visible').css('display','none').fadeIn();
	}

	/***********/
	/*EVENTS*/
	/***********/

	$(window).load(function() {
		if($(window).width() < 925){
			slider = $('.bxslider').bxSlider(smallSliderOptions);
		} else if($(window).width() < 700)  {
			slider = $('.bxslider').bxSlider(mediumSliderOptions);
		} else {
			slider = $('.bxslider').bxSlider(bigSliderOptions);
		}
	});

	$(window).resize(function(){

		if($(window).width() < 925 && !smallSliderLoaded){
		
			smallSliderLoaded = true;

			slider.reloadSlider(smallSliderOptions);
		}

		if($(window).width() < 700 && smallSliderLoaded){

			smallSliderLoaded = false;

			slider.reloadSlider(mediumSliderOptions);
		}

		if($(window).width() >= 905 && smallSliderLoaded){
		
			smallSliderLoaded = false;

			slider.reloadSlider(bigSliderOptions);
		}
	});