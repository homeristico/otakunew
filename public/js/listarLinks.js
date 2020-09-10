

const listar = document.getElementById('listaLinks');
const bodyModal = document.querySelector('#bodyModal');
const loader = document.getElementById('loader');
let linkForm = document.querySelector('#linkForm');


listar.addEventListener('click',ListarLinkMethod);
linkForm.addEventListener('submit',subirLink);

function ListarLinkMethod(){
    console.log('listar');
    fetch('http://localhost:8000/api/articulos/links')
        .then(datos => datos.json())
        .then(res => {
            bodyModal.innerHTML = res;
            console.log(res)
        })
        

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
            console.log(res);
            loader.innerHTML = `
                <button type="submit" class="btn btn-primary">Subir</button>
            `;
        })
        .catch(error => {
            console.log(error)
        })
}

