@extends('app')

@section('content')
    <h1>Canciones</h1>
     <a class="btn btn-primary btn-lg" href="{{ url('canciones/create') }}"
       role="button">Agregar Cancion</a>

       {!!Form::open(['route' => 'canciones.index','method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search' ]) !!}
       
          <div class="form-group">
            {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Artista']) !!}
            
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
       {!!Form::close()!!}   



       
    <table class="table">
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Artista</th>
        <th>Acciones</th>
    </tr>
      @foreach($canciones as $cancion)
        <tr>
            <td>{{ $cancion->id }}</td>   
            <td>{{ $cancion->nombre_cancion}}</td>
            <td>
             @foreach($artistas as $artista)
            <?php
             if($artista->id==$cancion->id_artista){
                echo "$artista->nombre";
             }
                
             
            ?>
           @endforeach

            </td>        
            <td>
                @if (Auth::user()->roll == '1')
                    
                 <a href="/canciones/{{{$cancion->id}}}/edit" class="btn btn-info col-md-3" role="button">Editar</a>
                {!!Form::open(array('url' => "/canciones/$cancion->id", 'method' => 'DELETE'))!!}
                
                       <button class="btn btn-info col-md-3" role="button">Eliminar</button>
                {!!Form::close()!!}    

                @endif
               
                <a href="/canciones/{{{$cancion->id}}}/agregarLista" class="btn btn-info col-md-5" role="button">Agregar a lista</a>



            </td>   
        </tr>
    @endforeach
</table>
{!! $canciones->render() !!}
   
@stop