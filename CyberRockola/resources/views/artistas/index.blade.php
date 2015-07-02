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

                 <a href="/artistas/{{{$artista->id}}}/edit" class="btn btn-info" role="button">Editar</a>
                {!!Form::open(array('url' => "/artistas/$artista->id", 'method' => 'DELETE'))!!}
                
                       <button class="btn btn-info" role="button">Eliminar</button>
                {!!Form::close()!!}    

            </td>   
        </tr>
    @endforeach
</table>

    <a class="btn btn-primary btn-lg" href="{{ url('artistas/create') }}"
       role="button">Crear artista</a>
@stop