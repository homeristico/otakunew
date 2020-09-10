@extends('layouts.app')
@section('content')
<h1>create</h1>
@if($errors->any())
	
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
			   <li>{{$error}}</li>
			@endforeach
			</ul>
		</div>	
@endif

<form class="form-group" method="POST" action="/articles" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="" class="color">Titulo</label>
			<input type="text" name="titulo" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="" class="color">Imagen</label>
			<input type="file" name="imagen" required>
		</div>
		<div class="form-group">
			<label for="" class="color">Descripcion</label>
			<textarea name="descripcion" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="" class="color">Detalles</label>
			<textarea name="detalles" class="form-control"></textarea>
		</div>
		<!-- <div class="form-group">
			<label for="" class="color">Link</label>
			<textarea name="link" class="form-control"></textarea>
		</div> -->
		<div class="form-group">
			<label for="" class="color">Slug</label>
			<input type="text" name="slug" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="" class="color">Categoria</label>
			<select name="categoria" class="form-control">
                <option value="anime">Anime</option>
                <option value="manga">Manga</option>
                <option value="videojuegos">Video Juegos</option>
                <option value="noticias">Noticias</option>
            </select>
		</div>

		<button type="submit" class="btn btn-primary">Guardar</button>
		
	</form>
@endsection