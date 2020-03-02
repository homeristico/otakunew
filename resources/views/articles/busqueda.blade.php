@extends('layouts.app')
@section('content')

        @if($nada)        
            <div class="row white my-3 card container">
                <h1>{{ $nada }}</h1>
            </div>
        @endif
        
        @foreach($res as $articulo)
         @include('articles.mostrarArticulo')
        @endforeach



@endsection