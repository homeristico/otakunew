
const registro = document.getElementById("registro");

if(registro){
    registro.addEventListener('click',identificarBoton);    
}


function identificarBoton(e){
    
    var tipo = e.target.tagName;
    var boton = e.target.id;

    if(tipo=="BUTTON"){
        //console.log(boton,tipo);

        fetch(`http://localhost:8000/article/${boton}`)
            .then(datos=>datos.text())
            .then(datos=>{
                var borrarRegistro = document.getElementById(boton);
                borrarRegistro.innerHTML = "";
           });
    }
   

}