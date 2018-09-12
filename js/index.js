var x, c, s, i;

function index(evt, x){
	evt.preventDefault();

	if(x==0){
		document.querySelector(".modal").style="opacity: 1; z-index: 150;";
		document.getElementById("cadastro").style="margin-top: 0%;";
		x++;
	}else{
		document.querySelector(".modal").style="opacity: 0; z-index: 0;";
		document.getElementById("cadastro").style="margin-top: -100%;";
		x=0;
	}
}

function cadastro(evt, c){
	evt.preventDefault();

	s = document.querySelectorAll(".step");
	i = document.querySelectorAll(".stp");

	for(y=0; y<3; y++){
		s[y].style="opacity: 0; z-index: 0;";
		i[y].style="background-color: rgba(49, 61, 77, 0.4);";
	}
	switch (c) {
		case 1:
			s[0].style="opacity: 1; z-index: 70;";
			i[0].style="background-color: #3F4E64;";
			break;
		case 2:
			s[1].style="opacity: 1; z-index: 70;";
			i[1].style="background-color: #3F4E64;";
			break;
		case 3:
			s[2].style="opacity: 1; z-index: 70;";
			i[2].style="background-color: #3F4E64;";
			break;
	}
}

function PreviewImage() { 
    var reader = new FileReader(); 
    reader.readAsDataURL(document.getElementById("imgFile").files[0]);

    reader.onload = function (evento) { 
        document.getElementById("imgResult").src = evento.target.result; 
    }; 
};