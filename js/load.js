window.onload = function load(){
	l = document.querySelectorAll('.load');

	for (var y = 0; y < 5; y++){
		l[y].style.animationDelay='0.'+y+'s';
	}
}