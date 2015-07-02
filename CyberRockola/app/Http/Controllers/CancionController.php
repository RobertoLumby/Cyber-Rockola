<?php namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

use Session;
use App\Http\Requests;
use \App\Models\Cancion;
use \App\Models\Artista;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CancionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		//dd($request->get('name')); - name($request->get('name'))->

		$artistas = Artista::get()->all();		
		$canciones = Cancion::get()->all();
		$canciones = Cancion::paginate(10);
		return view('canciones.index',compact('canciones','artistas'));
			
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$artistas = Artista::get()->all();

		return view('canciones.create',compact('artistas'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$id_artista = Input::get('id_artista');
		
	
		$archivo = array('image' => Input::file('image'));
		$extension = Input::file('image')->getClientOriginalExtension(); 
		$nombre =  Input::file('image')->getClientOriginalName();
	
		$nuevoNombre=$this->limpia_espacios($nombre);
 		

		$rutaArchivo_subido="/home/BRYAN19/ProyectoRobertillo/Cyber-Rockola/CyberRockola/storage/Subidos/";
		
		Input::file('image')->move($rutaArchivo_subido, $nuevoNombre);
		$this->guardarCancion($nuevoNombre,$id_artista);

		return Redirect::to('canciones');	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function agregarLista($id)
	{
		$cancion = Cancion::find($id);
		$ruta=$cancion->ruta;
		$this->cola($ruta);
		return Redirect::to('canciones');					

	}


	public function guardarCancion($nuevoNombre,$id_artista)
	{
		$ruta="storage/Subidos/".$nuevoNombre;
		$canciones = new Cancion();	
		$canciones->ruta=$ruta;
		$canciones->nombre_cancion=$nuevoNombre;
		$canciones->id_artista=$id_artista;
		$canciones->save();

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cancion = Cancion::find($id);

		$artistas = Artista::all();
		return view('canciones.edit', compact('cancion','artistas'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$nombre_cancion = Input::get('nombre_cancion');
		$id_artista = Input::get('id_artista');
		$canciones = Cancion::find($id);
		$canciones->nombre_cancion = $nombre_cancion;
		$canciones->id_artista = $id_artista;
		$canciones->save();
		return redirect('canciones');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$canciones = Cancion::find($id);
		$canciones->delete();
		return redirect('canciones');
	}
	/*public function limpia_espacios($cadena){
    $cadena = str_replace(' ', '', $cadena);
    return $cadena;

	}*/
	public function limpia_espacios($file){
		
		$file = strtolower($file);//Convierte el nombre del archivo a minuscula
		$file = preg_replace("/[^.a-z0-9_\s-]/", "", $file);//Indica los caracteres posiblesque mantiene el nombre
		$file = preg_replace("/[\s-]+/", " ", $file);//Elimina espacios en blanco multiples y barras inclinadas
		$file = preg_replace("/[\s_]/", "_", $file);//Combierte los espacios en blanco en guiones
		return $file;
	}	


	public function cola($cola){
		
		$connection = new AMQPConnection('localhost', 5672, 'guest', 'guest');
		$channel = $connection->channel();
		$channel->queue_declare('hola', false, false, false, false);
		
		$msg = new AMQPMessage($cola);
		$channel->basic_publish($msg, '', 'hola');
		$channel->close();
		$connection->close();
	}


}
