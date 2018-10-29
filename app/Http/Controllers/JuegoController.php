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
        $colores = $request -> input('colores');
    	session(['nombre' => $nombre]);
    	session(['longitud' => $longitud]);
    	session(['intentos' => $intentos]);
        session(['colores' => $colores]);
    	
    	return view('juego',['longitud' => $longitud, 'nombre' => $nombre, 'intentos' => $intentos]);
    }


    public function jugar(Request $request)
    {
    	$nombre = session('nombre');
    	$longitud = session('longitud');
    	$intentos = session('intentos');
        $colores = session('colores');
        $array_colores = array();
        for ($i=0; $i < $colores; $i++) { 
            $array_colores[i] = rand(0,8);
        }

    	return view('juego', ['nombre' => $nombre, 'longitud' => $longitud, 'intentos' => $intentos, 'colores' => $array_colores]);
    }
}
