$(document).ready(function()  {

	$('.sideMenu').click(function() {
		let ulButton = $(this).attr('id');
		isOpen = localStorage.getItem("isMenuOpened");
		if(isOpen == "opened")
		{
			localStorage.setItem("isMenuOpened","closed");
			localStorage.removeItem('openedMenu');
		}
		else
		{
			localStorage.setItem("isMenuOpened", "opened");
		}
		localStorage.setItem("openedMenu",ulButton);
		menuTrigger(ulButton);
	});

	$('.showProfile').click(showProfile);

	$('#darkMode').click(darkMode);
	if($('html').hasClass("dark"))
	{
		$('#darkMode').children('.absolute').removeClass('left-[5px]');
		$('#darkMode').removeClass('bg-yellow-300').addClass("bg-blue-400");
	}
	
	$('#openSettings').click(configLayout);
	$('#snowMode').click(snower);
	$('#lang').click(lang);
	$('#disabler').click(disabler);

	$('.cpColor').click(function(){
		let color = $(this).attr('data-bg');
		changeCPColor(color);
	});


	$('.cpTextColor').click(function(){
		let _this = $(this);
		let dl = $(this).attr('data-light');
		let dd = $(this).attr('data-dark');
		let ddt = $(this).attr('data-darkT');
		changeCPTextColor(dl, dd, ddt);
	});

	$('.cpGradient').click(function(){
		let newGradient = $(this).attr('data-bg');
		changeCPGradient(newGradient);
	});

	$('#panelMode').click(function(){
		let pMode = localStorage.getItem("pMode");
		if(pMode == "long")
		{
			localStorage.setItem("pMode", "short");
			panelMode();
		}
		else
		{
			localStorage.setItem("pMode", "long");
			panelMode();
		}
	});

	$('#mobileMenu').click(mobileMenu);
	$('#mnpTrigger').click(mnp);
	$('#settingesCloser').click(closeSettings);

	if(localStorage.getItem("darkMode") == "true")
		darkMode();

	if(localStorage.getItem("lang") == "FA")
	{
		lang();
		startupLang();
	}

	if(localStorage.getItem('cpBackgroundElement'))
	{
		thisColor = localStorage.getItem('cpBackgroundElement');
		changeCPColor(thisColor);
	}
	else if(localStorage.getItem('cpGradient'))
	{
		newGradient = localStorage.getItem('cpGradient');
		changeCPGradient(newGradient);
	}

	if(localStorage.getItem('dl'))
	{
		let dl = localStorage.getItem('dl');
		let dd = localStorage.getItem('dd');
		let ddt = localStorage.getItem('ddt');
		changeCPTextColor(dl, dd, ddt);
	}

	let pMode = localStorage.getItem("pMode");
	if(pMode == "long")
	{
		panelMode();
	}


	if(localStorage.getItem("isMenuOpened") == "opened")
	{
		let buttonId = localStorage.getItem("openedMenu");
		menuTrigger(buttonId);
	}

});

// ------------------------- ================== Start of functions :


function startupLang(){
	$('#settingsBar').removeClass('-right-72 left-0');
	$('#settingsBar').addClass('-left-72');
	$('#controlPanel').removeClass('-left-[520px]');
	$('#controlPanel').addClass('-right-[520px]');
}



function menuTrigger(buttonId) {
	button = $('#' + buttonId);
	button.next().slideToggle();
	if($('html').attr('dir') == 'rtl')
	{
		button.children(".bi-chevron-down").toggleClass("rotate-180");
	}
	else
	{
		button.children(".bi-chevron-down").toggleClass("-rotate-180");
	}
}



function showProfile(){
	let profile = $('.profileContent');
	if(profile.hasClass('hidden'))
	{
		profile.fadeIn('fast', function() {
			profile.removeClass('hidden');
			profile.addClass('top-12');
		});
	}
	else {
		profile.fadeOut(function() {
			profile.addClass('hidden');
			profile.removeClass('top-12');
		});
	}
}



function darkMode(){
	let darker = $('#darkMode');
	let child = darker.children(".absolute");
	darker.toggleClass("bg-blue-400");
	darker.toggleClass("bg-yellow-300");
	child.toggleClass("right-[5px]");
	child.toggleClass("left-[5px]");
	$('html').toggleClass("dark");
	if($('html').hasClass("dark"))
		localStorage.setItem("darkMode","true");
	else
		localStorage.setItem("darkMode","false");
}



function configLayout(){
	let settings = $('#settingsBar');
	let wh = $(window).outerHeight(true);
	let bh = $('body').outerHeight(true);
	$('#disabler').removeClass('hidden');
	wh > bh ? $('#disabler').height(wh) : $('#disabler').height(bh + 30);
	if($('html').attr('dir') == 'rtl')
	{
		settings.toggleClass('-left-72').toggleClass("left-0");
	}
	else
	{
		settings.toggleClass('-right-72').toggleClass("right-0");
	}
}



function snower(){
	let child = $('#snowMode').children(".absolute");
	child.toggleClass("right-[5px]");
	child.toggleClass("left-[5px]");
	$('#snowMode').toggleClass("bg-cyan-300");
}



function lang(){
	$('body').toggleClass('vazir');
	let child = $('#lang').children(".absolute");
	let _html = $('html');
	let li = $('.sideMenu').next().children('li').children('a');
	let chevron = $('.sideMenu').children(".bi-chevron-down");
	let cp = $('#controlPanel');
	child.toggleClass("right-[5px]").toggleClass("left-[5px]");
	child.text().trim() == 'EN' ? child.text('FA') : child.text('EN');
	$('#lang').toggleClass("bg-[url('/images/en.svg')]").toggleClass("bg-[url('/images/ir.svg')]");
	$('.fa').toggleClass('hidden');
	$('.en').toggleClass('hidden');
	$('.profileContent').toggleClass("right-0 left-0");
	if(_html.attr('dir') == 'rtl' )
	{
		localStorage.removeItem('lang');
		if(chevron.hasClass("rotate-180"))
		{
			chevron.removeClass("rotate-180");
			chevron.addClass("-rotate-180");
		}

		if(cp.hasClass('right-0'))
			cp.removeClass('right-0').addClass('left-0');
		else
			cp.removeClass('md:right-0').addClass('md:left-0');


		$('#settingsBar').removeClass('left-0');
		$('#settingsBar').addClass('right-0');
		 _html.attr('dir','ltr');
		 li.addClass('ps-3');
	}
	else
	{
		localStorage.setItem('lang','FA');
		if(chevron.hasClass("-rotate-180"))
		{
			chevron.removeClass("-rotate-180");
			chevron.addClass("rotate-180");
		}
		
		if(cp.hasClass('left-0'))
			cp.removeClass('left-0').addClass('right-0');
		else
			cp.removeClass('md:left-0').addClass('md:right-0');

		$('#settingsBar').addClass('left-0');
		$('#settingsBar').removeClass('right-0');
		$('#snowMode').attr('dir','ltr');
		$('#darkMode').attr('dir','ltr');
		_html.attr('dir', 'rtl');
		li.removeClass('ps-3');
	}
	$('#settingesCloser').toggleClass("left-1 right-1");
}



var prevColor;
var colorClicked = false;
function changeCPColor(thiss){
	localStorage.setItem('cpBackgroundElement',thiss);
	localStorage.removeItem('cpGradient');
	colorClicked = true;
	let cp = $('#controlPanel');
	let cpClass = cp.attr("class");
	let classes = cpClass.split(" ");
	for(let i = 0; i < classes.length; i++)
	{
		if(classes[i].startsWith("bg-"))
		{
			var bg = classes[i];
			break;
		}
	}
	cp.removeClass(bg).addClass(thiss);
	prevColor = thiss;
}



var cpColorsList = ['text-red-200','text-red-400','text-red-500'];
function changeCPTextColor(lightColor, darkColor, darkTColor) {
	localStorage.setItem("dl",lightColor);
	localStorage.setItem("dd",darkColor);
	localStorage.setItem("ddt",darkTColor);

	let cp = $('#controlPanel');
	
	let lightTexts = cp.find('.lightText');
	let darkTexts = cp.find('.darkText');
	let darkTitles = cp.find('.darkTitle');

	$(lightTexts).removeClass(cpColorsList[0]);
	$(darkTexts).removeClass(cpColorsList[1]);
	$(darkTitles).removeClass(cpColorsList[2]);
	cpColorsList = [];

	cpColorsList.push(lightColor);
	cpColorsList.push(darkColor);
	cpColorsList.push(darkTColor);

	lightTexts.addClass(lightColor);
	darkTexts.addClass(darkColor);
	darkTitles.addClass(darkTColor);
}



var prevGradient = "bg-[var(--red)]";
function changeCPGradient(newGradient) {
	localStorage.setItem("cpGradient",newGradient);
	localStorage.removeItem('cpBackgroundElement');
	let cp = $('#controlPanel');
	if(colorClicked)
	{
		colorClicked = false;
		cp.removeClass(prevColor);
	}
	cp.removeClass(prevGradient);
	cp.addClass(newGradient);
	prevGradient = newGradient;
}



function panelMode(){
	let _this = $('#panelMode');
	let cp = $('#controlPanel');
	_this.toggleClass('bg--[var(--background)]').toggleClass('text-slate-300')
	_this.toggleClass('bg-green-400').toggleClass('text-rose-400');
	_this.children('.absolute').toggleClass('left-[4px]');
	_this.children('.absolute').toggleClass('right-[4px]');
	$('#fullPagePadding').toggleClass("ps-3");
	$('html').attr('dir') == 'rtl' ? 
	cp.toggleClass('lg:h-[650px] md:h-[98vh] md:rounded-md md:static').addClass('md:right-0') :
	cp.toggleClass('lg:h-[650px] md:h-[98vh] md:rounded-md md:static').addClass('md:left-0');
	$('.twoColumnFake').toggleClass('hidden');
}



function disabler(){
	let wWidth = $(window).outerWidth();
	$('#disabler').addClass('hidden');
	if($('html').attr('dir') == 'rtl' )
	{
		$('#settingsBar').addClass('-left-72');
		$('#settingsBar').removeClass('left-0');
		$('#controlPanel').animate({}, 'slow', function(){
			$('#controlPanel').addClass('-right-[520px]');
			$('#controlPanel').removeClass('right-0');
		});
	}
	else
	{
		$('#settingsBar').addClass('-right-72');
		$('#settingsBar').removeClass('right-0');
		$('#controlPanel').animate({}, 'slow', function(){
			$('#controlPanel').addClass('-left-[520px]');
			$('#controlPanel').removeClass('left-0');
		});
	}
}




function mobileMenu(){
	let cp = $('#controlPanel');
	let wh = $(window).outerHeight(true);
	let bh = $('body').outerHeight(true);
	$('#disabler').removeClass('hidden');
	wh > bh ? $('#disabler').height(wh) : $('#disabler').height(bh + 30);
	if($('html').attr('dir') == 'rtl')
	{
		cp.animate({}, 'fast' , function() {
			cp.addClass('right-0');
			cp.removeClass('-right-[520px]');
		});
	}
	else
	{
		cp.animate({}, 'fast' , function() {
			cp.addClass('left-0');
			cp.removeClass('-left-[520px]');
		});
	}
}


function mnp(){
	$('#MNP').hasClass('hidden') ?
	$('#MNP').fadeIn().removeClass('hidden') :
	$('#MNP').fadeOut().addClass('hidden') ;
}

function closeSettings(){
	configLayout();
}