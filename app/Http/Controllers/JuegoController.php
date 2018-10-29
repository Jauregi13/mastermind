<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuegoController extends Controller
{
	public function iniciar(Request $request)
    {
    	$longitud = $request -> input('longitud');
    	$nombre = $request -> input('nombre');
    	$intentos = $request -> input('intentos');
    	$request->session()->put('nombre', $nombre);
    	$request->session()->put('longitud', $longitud);
    	$request->session()->put('intentos', $intentos);

    	$nombre = $request -> session() ->get('nombre');
    	$longitud = $request -> session() ->get('longitud');
    	$intentos = $request -> session() ->get('intentos');
    	
    	return view('juego',['longitud' => $longitud, 'nombre' => $nombre, 'intentos' => $intentos]);
    }


    public function jugar(Request $request)
    {
    	$nombre = session('nombre');
    	$longitud = $request -> session() ->get('longitud');
    	$intentos = $request -> session() ->get('intentos');

    	/*$request->session()->forget('nombre');

		$request->session()->flush();*/
    	return view('juego', ['nombre' => $nombre, 'longitud' => $longitud, 'intentos' => $intentos]);
    }
}
