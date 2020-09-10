@extends('layouts.app')
@section('content')


            <!-- Articulo -->
      
            <h2 class="text-center orange my-3">{{ $articulo->titulo}}</h2>  
       
            <div class="row white my-3 card">
                <div class="row container">
                    <div class="col-md-12">
                        <img class="center card my-5 img-fluid" src="/images/{{$articulo -> imagen}}" style="height: 24rem; width: 35rem;" alt="Card image cap Responsive image">
                        <p class="card-body my-4" >{{ $articulo -> descripcion}}</p>
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="my-4 text-left card-body">{{ $articulo -> detalles}}</p>
                                </div>
                                <div class="col-md-2">
                                
                                </div>
                                <div class="col-md-5">
                                    <!-- <a href="{{ $articulo->link }}}" target="_blank" class="btn btn-danger btn-lg my-5">Descargar</a> -->
                                    <button id="listaLinks" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Descargar</button>
                                </div>
                            </div>
                </div>
            </div> 

            <!-- MODAL LINKS DE DESCARGA -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">links Descargar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="bodyModal">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                      
                    </div>
                    </div>
                </div>
            </div>
                <!-- FIN MODAL -->

                 <!-- IMAGENES -->
                 <img id="imgid"> 
                 @foreach($imagen as $img) 
                    <div class="row container">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-5 my-2">  
                                                                                           
                                    <img id="imgid" class="center my-5 img-fluid card" src="/images/imagenesArticulo/{{$img -> imagen}}" style="height: 24rem; width: 35rem;" alt="Card image cap Responsive image"  >                                                             
                            </div>
                            <div class="col-md-6">                                
                            </div>
                    </div>
                @endforeach

                <!-- VIDEOS -->
                <img id="videoid">  
                @foreach($video as $vid) 
                <div class="row my-3 container">
                         <div class="col-md-1">
                         </div>
                         <div class="col-md-5 my-2">  
                         <!-- <img id="imgid"> -->  
                             <div class="video-responsive">                                                          
                                 <iframe id="videoid" width="560" height="315" src="{{ $vid->video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>      
                             </div>
                        </div>
                         <div class="col-md-6">                                
                         </div>
                </div>
                @endforeach




                
</div>


            <!-- SUBIR IMAGENES -->
          @if(Auth::user() && Auth::user()->rol == "administrador")
            <div class="row white my-3 card">
                <div class="col-md-12 my-2">
                    <form id="imagen" class="form-group" action="/imagens" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="">Imagen</label>
                            <input name="articulo_id" type="hidden" value="{{ $articulo->id }}">
                            <input name="slug" type="hidden" value="{{ $articulo->slug }}">
                            <input name="imagen" type="file">                        
                        </div>
                        <button type="submit" class="btn btn-primary">Subir</button>
                    </form>

                </div>
            </div>
            @endif

            <!-- ERRORES VIDEOS E IMAGENES -->
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="alert alert-danger">{{$error}}</li>
                    @endforeach
                </ul>                
            @endif

             <!-- SUBIR VIDEOS -->
            @if(Auth::user() && Auth::user()->rol == "administrador")
            <div class="row white my-3 card">
                <div class="col-md-12 my-2">
                    <form id="video" class="form-group" action="/videos" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="">Video</label>
                            <input name="articulo_id" type="hidden" value="{{ $articulo->id }}">
                            <input name="video" type="text" class="form-group">                        
                        </div>
                        <button type="submit" class="btn btn-primary">Subir</button>
                    </form>
                </div>
            </div>
            @endif

             <!-- SUBIR LINKS -->
          @if(Auth::user() && Auth::user()->rol == "administrador")
            <div class="row white my-3 card">
                <div class="col-md-12 my-2">
                    <form id="linkForm" class="form-group">
                    @csrf
                        <div class="form-group">
                            <label for="">Link</label>
                            <input name="articulo_id" type="hidden" value="{{ $articulo->id }}">
                            <input name="slug" type="hidden" value="{{ $articulo->slug }}">
                            <input name="link" type="text"> 
                            <div id="loader" >
                                <button type="submit" class="btn btn-primary">Subir</button>
                            </div>                                                                        
                        </div>
                        
                    </form>

                </div>
            </div>
            @endif
            <!-- FIN SUBIR LINKS -->
            

          
          <!-- ZONA DE COMENTARIOS -->
          
                 @foreach($comentarios as $comentario)
            <div class="row">
                    <div class="col-md-5">
                         <div class="row my-3 card">            
                            <div class="col-md-12  ">
                                 <h3 class="card-title text-left container" >{{ $comentario->user_comentario }}:</h3>
                                 <p class="my-4">{{ $comentario->comentario }}</p>
                            </div>               
                         </div>   
                    </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-5"></div>
             </div>                       
                @endforeach
            
                
                <div id="respuesta"></div>  


     <!-- COMENTAR -->

     <div class="row my-1">       
                <div class="col-md-5 card text-center" style="width: 35rem;">
                         <form id="formulario">
                            @csrf                            
                             @if(Auth::user())
                                <h3 class="card-title text-left container" >{{Auth::user()->user}}:</h3>
                                <input type="hidden" name="user_comentario" value="{{ Auth::user()->user }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="articulo_id" value="{{ $articulo->id }}">
                                <input type="hidden" name="slug" value="{{ $articulo->slug }}">                                
                                <textarea class="textinput comment cont" name="comentario" id="ta" cols="60" rows="5" placeholder="comentarios"></textarea>                              
                                <div class="card-body">
                                    <button id="btncomentario" type="submit" class="btn btn-default my-1">Enviar</button>
                                </div>                            
                            @else
                            <div class="my-4">
                                <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesión</a>
                            </div>                      
                            @endif                   
                         </form>                               
                </div> 
                     
                    
                    <div class="col-md-2"></div>
                    <div class="col-md-5 text-right"></div>
        
        
    </div> 
     
    
                        
                                                
                       
                        
                    
                 
           <div id="respuesta">
           
           </div>             




@endsection 