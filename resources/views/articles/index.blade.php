@extends('layouts.app')
@section('content')

        @foreach($articulos as $articulo)
            
         @include('articles.mostrarArticulo')
         
        @endforeach


 <!-- Paginacion -->
    <div class="row my-5">
        <div class="col-md-6 ">
                     <div class="col-md-5"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5 text-right"></div>
        </div>
        {{ $articulos->render() }}
    </div>
    

@endsection

