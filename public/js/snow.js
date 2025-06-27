/*!
// Snow.js - v0.0.3
// kurisubrooks.com
*/

// Amount of Snowflakes
var snowMax = 85;

// Snowflake Colours
var snowColor = ["#DDD", "#EEE"];

// Snow Entity
// var snowEntity = "&#x2022;";
var snowEntity = "<i class='bi bi-circle-fill'><i>";

// Falling Velocity
var snowSpeed = 1;

// Minimum Flake Size
var snowMinSize = 3;

// Maximum Flake Size
var snowMaxSize = 8;

// Refresh Rate (in milliseconds)
var snowRefresh = 50;

// Additional Styles
var snowStyles = "cursor: default; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; -o-user-select: none; user-select: none;";

/*
// End of Configuration
// ----------------------------------------
// Do not modify the code below this line
*/

var snow = [],
	pos = [],
	coords = [],
	lefr = [],
	marginBottom,
	marginRight;

function randomise(range) {
	rand = Math.floor(range * Math.random());
	return rand;
}

function initSnow() {
	var snowSize = snowMaxSize - snowMinSize;
	// marginBottom = document.body.scrollHeight - 5;
	let wh = $(window).outerHeight(true);
	let bh = $('body').outerHeight(true);
	marginBottom = wh > bh ? wh : bh ;
	// marginRight = document.body.clientWidth + 10;
	marginRight = $(window).width() ;

	for (i = 0; i <= snowMax; i++) {
		coords[i] = 0;
		lefr[i] = Math.random() * 15;
		pos[i] = 0.03 + Math.random() / 10;
		snow[i] = document.getElementById("flake" + i);
		snow[i].style.fontFamily = "inherit";
		snow[i].size = randomise(snowSize) + snowMinSize;
		snow[i].style.fontSize = snow[i].size + "px";
		snow[i].style.color = snowColor[randomise(snowColor.length)];
		snow[i].style.zIndex = 1000;
		snow[i].sink = snowSpeed * snow[i].size / 5;
		snow[i].posX = randomise(marginRight - snow[i].size);
		snow[i].posY = randomise(2 * marginBottom - marginBottom - 2 * snow[i].size);
		snow[i].style.left = snow[i].posX + "px";
		snow[i].style.top = snow[i].posY + "px";
	}

	
}

function resize() {
	// marginBottom = document.body.scrollHeight - 5;
	let wh = $(window).outerHeight(true);
	let bh = $('body').outerHeight(true);
	marginBottom = wh > bh ? wh : bh ;
	// marginRight = document.body.clientWidth + 10;
	marginRight = $(window).width();
}

function moveSnow() {
	for (i = 0; i <= snowMax; i++) {
		coords[i] += pos[i];
		snow[i].posY += snow[i].sink;
		snow[i].style.left = snow[i].posX + lefr[i] * Math.sin(coords[i]) + "px";
		snow[i].style.top = snow[i].posY + "px";

		if (snow[i].posY >= marginBottom - 2 * snow[i].size || parseInt(snow[i].style.left) > (marginRight - 3 * lefr[i])) {
			snow[i].posX = randomise(marginRight - snow[i].size);
			snow[i].posY = 0;
		}
	}

	setTimeout("moveSnow()", snowRefresh);
}

for (i = 0; i <= snowMax; i++) {
	let snowFlakes = $('<span>',{
		id : "flake" + i,
		style : snowStyles,
		style :  "position:absolute;top:-",
		html: snowEntity
	});
	$('body').append(snowFlakes);
}

window.addEventListener('resize', resize);
// window.addEventListener('load', initSnow);




 var snowNow = false;
 var firstSnow = 0;

 $(document).ready(function() {
 	$('#snowMode').click(function(){
 		if(snowNow)
 		{
 			for(let i = 0 ; i <= snowMax; i++)
 			{
	 			let flake = $('#flake' + i);
	 			flake.remove();
 			}
 			snowNow = false;
 		}
 		else
 		{
 			for (i = 0; i <= snowMax; i++) {
				let snowFlakes = $('<span>',{
					id : "flake" + i,
					style : snowStyles,
					style :  "position:absolute;top:-",
					html: snowEntity
				});
				$('body').append(snowFlakes);
			}
			if(firstSnow == 0)
			{
				initSnow();
				moveSnow();
				firstSnow++;
			}
			else
			{
				initSnow();
			}
 			snowNow = true;
 		}
 	});
 });