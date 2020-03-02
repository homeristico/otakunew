

/*FORMULARIO PARA ENVIO IMAGENES*/

var forImagen = document.getElementById("imagen");
var imgid = document.getElementById("imgid");
// var text = document.getElementById("ta");

if(forImagen){
    forImagen.addEventListener("submit", subir);
}


function subir(e){
    e.preventDefault();			
                
    var datoImagen = new FormData(forImagen);
    console.log(datoImagen.get("articulo_id"));
    
    
    fetch("http://localhost:8000/imagens",{ 
        method: "POST",
        body: datoImagen
        
    })
    .then(res => res.json())
    .then(dataImg => {
        
        console.log(dataImg);
        
         
         if(dataImg == "error"){
             imgid.innerHTML = `
                <div class="alert alert-danger" role="alert">
                     llena todos los campos
                 </div>
             `;
            
            }else{
    
                imgid.innerHTML +=`
                    <img id="imgid" class="center card my-5 img-fluid" src="/images/imagenesArticulo/${dataImg.nombre}" style="height: 24rem; width: 35rem;" alt="Card image cap Responsive image">                                

                `;
                location.reload();
            }
            
    })
}





