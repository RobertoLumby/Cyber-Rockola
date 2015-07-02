@extends('app')

@section('content')
    <h1>Editar Artista</h1>
    {!!Form::open(array('url' => "/artistas/$artista->id", 'method' => 'PUT'))!!}
        <input name="nombre" value="{{{$artista->nombre}}}" placeholder="Digite el nuevo nombre">
        <input type="submit">
    {!!Form::close()!!}
    
@stop