@extends('layouts.app')
@section('content')
<div class="row white my-3 card">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Imagen</th>
      <th scope="col">Titulo</th>
      <th scope="col">Descripción</th>
      <th scope="col">Creado en</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody id="registro">
  @foreach($showarticle as $article)
      <tr id="{{$article->id}}">
      <th scope="row">{{ $article->id }}</th>
      <td><a href="articles/{{$article->slug}}"><img class="" src="/images/{{$article -> imagen}}" style="height: 2rem; width: 3rem;"></a></td>
      <td>{{ $article->titulo }}</td>
      <td>{{ substr($article->descripcion,0,7) }}</td>
      <td>{{ $article->created_at }}</td>
      <td>   
          <a href="articles/{{ $article->slug}}/edit"  id="{{ $article->id }}" class="btn btn-primary">Actualizar</a> 
      </td>
      <td>         
          <button id="{{$article->id}}" class="btn btn-danger">Eliminar</button>
      </td>
   </tr>
  @endforeach
  </tbody>
</table>
</div>

<!-- Paginacion -->
<div class="row my-5">
        <div class="col-md-6 ">
                     <div class="col-md-5"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5 text-right"></div>
        </div>
        {{ $showarticle->render() }}
    </div>
    
@endsection