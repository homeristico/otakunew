


const bodyModal = document.querySelector('#bodyModal');
const loader = document.getElementById('loader');
let linkForm = document.querySelector('#linkForm');
const link = document.getElementById('link');

if(linkForm){
    linkForm.addEventListener('submit',subirLink);
}

function subirLink(e){
    e.preventDefault();    
    loader.innerHTML = `
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    `;
    let formLink = new FormData(linkForm);
    fetch('http://localhost:8000/api/articulos/storeLinks',{
        method:'post',
        body:formLink
        })
        .then(datos => datos.json())
        .then(res => {
            if(res.success){
                console.log(res.message);
                link.value = '';
                loader.innerHTML = `
                    <button type="submit" class="btn btn-primary">Subir</button>
                `;
            }else{
                console.log('ocurrio un error.')
            }            
        })
        .catch(error => {
            console.log(error)
        })
}

