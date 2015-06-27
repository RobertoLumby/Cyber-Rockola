<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{

	protected $table = 'canciones';
	protected $fillable = array('ruta','nombre_cancion','id_artista');
	protected $guarded  = array('id');
	public    $timestamps = false;

	/*public function articulos()
    {
        return $this->hasMany('\App\Models\Articulo');
    }*/
}