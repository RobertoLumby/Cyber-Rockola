<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CancionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('canciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('ruta',300);
			$table->string('nombre_cancion',300);
			$table->integer('id_artista')->unsigned();
			$table->foreign('id_artista')
      		->references('id')->on('artistas')
      		->onDelete('cascade');

			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('canciones');
	}

}
