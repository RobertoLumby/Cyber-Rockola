
@extends('app')

@section('content')




<div class="about-section">
   <div class="text-content">
     <div class="span7 offset1">
        @if(Session::has('success'))
          <div class="alert-box success">
          <h2>{!! Session::get('success') !!}</h2>
          </div>
        @endif
        <div class="secure"></div>
        {!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) !!}
         
  
        <select name="id_artista">
    @foreach($artistas as $artista)
      <option value={{$artista->id}}>{{$artista->nombre}}</option>
      @endforeach
  </select>

         <div class="control-group">
          <div class="controls">
          {!! Form::file('image') !!}
	  <p class="errors">{!!$errors->first('image')!!}</p>
	@if(Session::has('error'))
	<p class="errors">{!! Session::get('error') !!}</p>
	@endif
        </div>
        </div>
        <div id="success"> </div>
      {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
      {!! Form::close() !!}
      </div>
   </div>
</div>


@stop
