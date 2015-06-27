@extends('app')

@section('content')
    <h1>Write a new article</h1>
    <hr>

    {!! Form::open(['url' => 'articles']) !!}
        <!-- Title Form Input -->
        <div class="form-group">
            {{!! Form::label('title','Título: ')  !!}}
            {!! Form::text('title', null , ['class'=>'form-control'])  !!}
        </div>

        <!-- Body Form Input -->
        <div class="form-group">
            {!! Form::label('body','Contenido del Artículo: ')  !!}
            {!! Form::textarea('body', null , ['class'=>'form-control'])  !!}
        </div>

        <!-- Published_at Form Input -->
        <div class="form-group">
            {!! Form:: label('published_at','Publicado en: ')  !!}
            {!! Form::input('date','published_at', date('Y-m-d'), ['class'=>'form-control'])  !!}
        </div>

        <!-- Submit -->
        <div class="form-group">
            {!! Form::submit('Agregar Articulo', ['class'=>'btn btn-primary form-control'])  !!}
        </div>
    {!! Form::close() !!}

    {{-- var_dump($errors->toArray()) --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
 
@stop