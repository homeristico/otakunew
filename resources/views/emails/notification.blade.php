
        <div class="row">
                <div class="col-md-6 white card text-center" style="width: 35rem; margin-top: 50px;">
                   
                         <h3 class="card-title" style="color:orange;">{{ $articulo->titulo}}</h3>
                            <img class="card-img-top mx-auto d-block zoom img-fluid" src="{{ $message->embed(public_path().'/images/'.$articulo -> imagen) }}"
                            style="height: 20rem; width: 33rem;" alt="Responsive image"  >
                                <div class="card-body">
                                        <p>{{ substr($articulo -> descripcion, 0, 10)}}</p>
                                        <a href="https://otakunewotaku1.000webhostapp.com/articles/{{$articulo->slug}}">Ver mas..</a>
                                </div>
           
                   
                </div>
           
       
                <div class="col-md-1"></div>
                <div class="col-md-5"></div>
        </div>

