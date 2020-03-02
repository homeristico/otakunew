

/*FORMULARIO PARA ENVIO IMAGENES*/

var forVideo = document.getElementById("video");
var videoid = document.getElementById("videoid");
// var text = document.getElementById("ta");

if(forVideo){
    forVideo.addEventListener("submit", video);
}


function video(e){
    e.preventDefault();			
                
    var datoVideo = new FormData(forVideo);
    let tempUrl = datoVideo.get("video");
    if(tempUrl.indexOf("youtube") !== -1){

        datoVideo.delete("video");
        let array = tempUrl.split('=');
        let codigo = array[1];
        let url = "https://www.youtube.com/embed/"+codigo;
        datoVideo.append("video",url);
    
        //console.log(datoVideo.get("video"));
    
        
        
        fetch("http://localhost:8000/videos",{ 
            method: "POST",
            body: datoVideo
            
        })
        .then(res => res.json())
        .then(dataVideo => {
            
            console.log(dataVideo);
            
             
             if(dataVideo == "error"){
                 videoid.innerHTML = `
                    <div class="alert alert-danger" role="alert">
                         llena todos los campos
                     </div>
                 `;
                
                }else{
        
                    videoid.innerHTML +=`
                    <iframe width="560" height="315" src="${videoid.video}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    `;
                    location.reload();
                }
                
        })
    }else{
        fetch("http://localhost:8000/videos",{ 
            method: "POST",
            body: datoVideo
            
        })
        .then(res => res.json())
        .then(dataVideo => {
            
            console.log(dataVideo);
            
             
             if(dataVideo == "error"){
                 videoid.innerHTML = `
                    <div class="alert alert-danger" role="alert">
                         llena todos los campos
                     </div>
                 `;
                
                }else{
        
                    videoid.innerHTML +=`
                    <iframe width="560" height="315" src="${videoid.video}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    `;
                    location.reload();
                }
                
        })
    }
    
}





