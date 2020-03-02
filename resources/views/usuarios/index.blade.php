@extends('layouts.app')
@section('content')

<div class="row white my-3 card">
    <div class="col-md-12">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Usuario</th>
              <th scope="col">Email</th>
              <th scope="col">Creado</th>
              <th scope="col">Rol</th>
              <th scope="col">Cambio Rol</th>
            </tr>
          </thead>
          <tbody>
          @foreach($usuario as $user)
            <tr>
              <th scope="row">{{ $user->id }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->user }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->created_at }}</td>
              <td>{{ $user->rol }}</td>
              <td>
              <form action="/usuarios" method="POST">
                @csrf
                  <input name="user" type="hidden" value="{{ $user->user }}">
                  <select name="rol" id="">
                      <option value="usuario">Usuario</option>
                      <option value="administrador">Administrador</option>
                  </select>
                  <button type="submit" class="btn btn-primary">Cambiar</button>
              </form>
              </td>
              <!-- <td><a href="usuarios/{{ $user->user }}" class="btn btn-primary">Cambiar</a></td> -->
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
@endsection