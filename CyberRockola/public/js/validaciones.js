
$(document).on("click","#subir",function() {

alert("entro");

  var origenArchivo  = $('#origenArchivo').get(0).files[0];
  var nombre_cancion =  $('#nombre_cancion').val();
  var id_artista = $('id_artista').val();
  
  var formData   = new FormData();
  formData.append('origenArchivo',origenArchivo);
  formData.append('nombre_cancion',nombre_cancion);
  formData.append('id_artista',id_artista);

    $.ajax({
    type: "POST",
    url: "canciones",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
  }).done(function( data ) {
     
    location.href = '/';

    }).fail(function( data , error) {
    
    console.log(data);
    console.log(error);
  });



});

 