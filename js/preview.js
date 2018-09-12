function Previewfoto(){ 
    var reader = new FileReader(); 
    reader.readAsDataURL(document.getElementById("perfil").files[0]);

    reader.onload = function (evento) { 
        document.getElementById("foto").src = evento.target.result; 
    }
}