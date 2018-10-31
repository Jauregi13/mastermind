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

    	session(['nombre' => $nombre]);
    	session(['longitud' => $longitud]);
    	session(['intentosMax' => $intentosMax]);
    	session(['intentos' => $intentos]);
        session(['colores' => $colores]);

        $request->session()->forget('clave');

        for($i=0;$i < $longitud; $i++){
            if($repetido == 'si'){

                

            }
            else{
                $request->session()->push('clave', rand(0,$colores -1));
            }
        	
        }
    	
    	return view('juego',['longitud' => $longitud, 'intentos' => $intentos, 'colores' => $colores]);
    }


    public function jugar(Request $request)
    {
    	$nombre = session('nombre');
    	$longitud = session('longitud');
    	$intentos = session('intentos');
        $colores = session('colores');
        $array_colores = array();
        $clave = array();
        for ($i=0; $i < $longitud; $i++) { 
            $clave[$i] = $request -> input($i);
        }

    	return view('juego', ['nombre' => $nombre, 'longitud' => $longitud, 'intentos' => $intentos, 'colores' => $array_colores, 'clave' => $clave]);
    }
}
