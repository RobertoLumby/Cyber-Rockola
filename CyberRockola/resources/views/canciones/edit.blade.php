
@extends('app')

@section('content')


<h1>Editar Cancion</h1>
    {!!Form::open(array('url' => "/canciones/$cancion->id", 'method' => 'PUT'))!!}
        <input name="nombre_cancion" value="{{{$cancion->nombre_cancion}}}" >
        <select name="id_artista">
    @foreach($artistas as $artista)
      <?php
       if($artista->id==$cancion->id_artista){
        echo "<option selected value= $artista->id>$artista->nombre</option>";
       }else{
        echo "<option  value= $artista->id>$artista->nombre</option>";
       }
      ?>
      @endforeach
  </select>
        <input type="submit">
    {!!Form::close()!!}


@stop