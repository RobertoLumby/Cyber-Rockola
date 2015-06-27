@extends('app')

@section('content')
    <h1>Artistas</h1>
    
    <table class="table">
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
      @foreach($artistas as $artista)
        <tr>
            <td>{{ $artista->id }}</td>   
            <td>{{ $artista->nombre}}</td>    
            <td>
                {{link_to("songs/$artista->id/edit", 'Editar', $attributes = array(), $secure = null)}}
                {{link_to("songs/$artista->id/delete", 'Eliminar', $attributes = array(), $secure = null)}}
            </td>   
        </tr>
    @endforeach
</table>

    <a class="btn btn-primary btn-lg" href="{{ url('artistas/create') }}"
       role="button">Crear artista</a>
@stop