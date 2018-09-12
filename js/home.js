function menu(evt){
	evt.preventDefault();

	document.querySelector(".modal").style="opacity: 1; z-index: 150;";
	document.querySelector(".menu").style.right="-15%";
	
	window.onclick=function(evt){
		if (evt.target == document.querySelector(".modal")){
			document.querySelector(".modal").style="opacity: 0; z-index: 0;";
			document.querySelector(".menu").style.right="-100%";
		}
	}
}

function tipo(evt){
	evt.preventDefault();

	document.querySelector(".modal").style="opacity: 1; z-index: 150;";
	document.querySelector(".tipo").style.top="42%";

	window.onclick=function(evt){
		if (evt.target == document.querySelector(".modal")){
			document.querySelector(".modal").style="opacity: 0; z-index: 0;";
			document.querySelector(".tipo").style.top="-100%";
		}
	}
}

function setor(evt){
	evt.preventDefault();

	document.querySelector(".modal").style="opacity: 1; z-index: 150;";
	document.querySelector(".setor").style.bottom="55%";

	window.onclick=function(evt){
		if (evt.target == document.querySelector(".modal")){
			document.querySelector(".modal").style="opacity: 0; z-index: 0;";
			document.querySelector(".setor").style.bottom="-100%";
		}
	}
}

function resposta(evt){
	evt.preventDefault();

	document.querySelector(".modal").style="opacity: 1; z-index: 150;";
	document.querySelector(".resposta").style.left="-15%";

	window.onclick=function(evt){
		if (evt.target == document.querySelector(".modal")){
			document.querySelector(".modal").style="opacity: 0; z-index: 0;";
			document.querySelector(".resposta").style.left="-100%";
		}
	}
}

function x(x){
	var off = document.querySelectorAll(".off");
	var on = document.querySelectorAll(".on");

	for (var y = 0; y < 2; y++) {
		if (x == 1) {
			off[y].style="opacity: 1; z-index: 10; display: inline;";
			on[y].style="opacity: 0; z-index: 0; display: none;";
		}else{
			on[y].style="opacity: 1; z-index: 10; display: inline;";
			off[y].style="opacity: 0; z-index: 0; display: none;";
		}
	}
}

function back(){
	window.history.back(); 
}