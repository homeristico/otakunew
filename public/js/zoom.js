$(document).ready(function(){
    $('.zoom').hover(function() {
        $(this).addClass('transition');
    }, function() {
        $(this).removeClass('transition');
    });
});

function red(x){
    x.style.color = "red";
    
}
function blue(x){
    x.style.color = "orange";
    
}


/*FORMULARIO PARA ENVIO POR POST*/

var formulario = document.getElementById("formulario");
var respuesta = document.getElementById("respuesta");
var text = document.getElementById("ta");

if(formulario){
    formulario.addEventListener("submit",comentar); 
}


function comentar(e){
    e.preventDefault();			
                
    var datos = new FormData(formulario);
    console.log(datos.get("user_id"));
    
    
    fetch("http://localhost:8000/comentario",{ 
        method: "POST",
        body: datos
         
    })
    .then(res => res.json())
    .then(data => { 
        
        console.log(data);
        
         
         if(data == "error"){
             respuesta.innerHTML = `
                <div class="alert alert-danger" role="alert">
                     llena todos los campos
                 </div>
             `;
            
            }else{
                 respuesta.innerHTML += `
                 <div class="row">
                 <div class="col-md-5">
                      <div class="row my-3 card">            
                         <div class="col-md-12  ">
                              <h3 class="card-title text-left container" >${data.user_comentario}:</h3>
                              <p class="my-4"> ${data.comentario}</p>
                         </div>               
                      </div>   
                 </div>
               <div class="col-md-2"></div>
               <div class="col-md-5"></div>
          </div> 
               
               
             `;
             text.value = "";
                
                
            }
         
    })
}





