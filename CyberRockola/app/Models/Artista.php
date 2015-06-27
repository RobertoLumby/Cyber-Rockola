<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{

	protected $table = 'artistas';
	protected $fillable = array('nombre');
	protected $guarded  = array('id');
	public    $timestamps = false;

	/*public function articulos()
    {
        return $this->hasMany('\App\Models\Articulo');
    }*/
}