@extends('layouts.app')
@section('content')

<h1>editar</h1>
@if($errors->any())
	
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
			   <li>{{$error}}</li>
			@endforeach
			</ul>
		</div>	
@endif
<div class="row white my-3 card container">
<form class="form-group" method="POST" action="/articles/{{$editarArticulo->slug}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
		<div class="form-group">
			<label for="">Titulo</label>
			<input type="text" name="titulo" value="{{$editarArticulo->titulo}}" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Imagen</label>
			<input type="file" name="imagen" value="{{$editarArticulo->imagen}}">
		</div>
		<div class="form-group">
			<label for="">Descripcion</label>
			<textarea name="descripcion" value="" class="form-control">{{$editarArticulo->descripcion}}</textarea>
		</div>
		<div class="form-group">
			<label for="">Detalles: titulo|genero|capitulos|servidor|año|peso|duracion</label>
			<textarea name="detalles" class="form-control" value="">{{$editarArticulo->detalles}}</textarea>
		</div>
		<div class="form-group">
			<label for="">Link</label>
			<textarea name="link" value="" class="form-control">{{$editarArticulo->link}}</textarea>
		</div>
		<div class="form-group">
			<label for="">Categoria</label>
			<select name="categoria" class="form-control">
                <option value="anime">Anime</option>
                <option value="manga">Manga</option>
                <option value="videojuegos">Video Juegos</option>
                <option value="noticias">Noticias</option>
            </select>
		</div>

		<button type="submit" class="btn btn-primary">Guardar</button>
		
	</form>
</div>
@endsection
