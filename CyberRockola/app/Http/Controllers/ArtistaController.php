<?php namespace App\Http\Controllers;

use App\Http\Requests;
use \App\Models\Artista;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ArtistaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		
		$artistas = Artista::get()->all();
	
		return view('artistas.index',compact('artistas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('artistas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Artista::create(\Input::all());
		return redirect('artistas');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$artista = Artista::find($id);
		return view('artistas.edit', compact('artista'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$artistas = Artista::find($id);
		$nombre = \Input::get('nombre');
		$artistas->nombre = $nombre;
		$artistas->save();
		return redirect('artistas');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$artistas = Artista::find($id);
		$artistas->delete();
		return redirect('artistas');
	}

}
