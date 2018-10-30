<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuegoController extends Controller
{
	public function iniciar(Request $request)
    {
    	$longitud = $request -> input('longitud');
    	$nombre = $request -> input('nombre');
    	$intentosMax = $request -> input('intentos');
    	$intentos = 1;
        $colores = $request -> input('colores');
        $repetido = $request -> input('repetido');
        session(['repetido' => $repetido]);
    	session(['nombre' => $nombre]);
    	session(['longitud' => $longitud]);
    	session(['intentosMax' => $intentosMax]);
    	session(['intentos' => $intentos]);
        session(['colores' => $colores]);

        $request->session()->forget('clave');

        for($i=0;$i < $longitud; $i++){
        	$request->session()->push('clave', rand(0,$colores -1));
        }
    	
    	return view('juego',['longitud' => $longitud, 'intentos' => $intentos, 'colores' => $colores]);
    }


    public function jugar(Request $request)
    {
    	$nombre = session('nombre');
    	$longitud = session('longitud');
    	session('intentos', 3);
    	$intentos = session('intentos');
        $colores = session('colores');
        $array_colores = array();
        for ($i=0; $i < $longitud; $i++) {
        	if(session('repetido') == 'no'){

        	}
        	else{
        		$array_colores[$i] = rand(0,$colores -1);
        	}            
        }

    	return view('juego', ['nombre' => $nombre, 'longitud' => $longitud, 'intentos' => $intentos, 'colores' => $array_colores]);
    }
}
