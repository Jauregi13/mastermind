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

                $request->session()->push('clave', rand(0,$colores -1));

            }
            else{
                if($i == 0){
                	$request->session()->push('clave', rand(0,$colores -1));
                }
                else {
                	$valor = rand(0,$colores -1);;
                	while (in_array($valor, session('clave'))) {
                		$valor = rand(0,$colores -1);
                	}
                	$request->session()->push('clave', $valor);

                }
                
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
    	$sumar_intento = $intentos + 1;
    	if($sumar_intento <= session('intentosMax')){
    		// contar el intento despues de darle al boton
	    	
	    	$request->session()->put('intentos', $sumar_intento);

	        
	        for ($i=0; $i < $longitud; $i++) { 
	            $clave[$i] = $request -> input($i);
	        }
	        $acierto= 0;
	        $candidato = 0;
	        for ($i=0; $i < count($clave); $i++) {

	        	if($clave[$i] == session('clave')[$i]){
	        		$acierto++;

	        	} 

	        	else if(in_array($clave[$i], session('clave'))){
	        		$candidato++;
	        	}
	        	
	        	
	        }
	        array_push($clave, $acierto);
	        array_push($clave, $candidato);
	        //$request->session()->forget('resultado');
	        $request->session()->push('resultado', $clave);
    	}
    	

    	return view('juego', ['nombre' => $nombre, 'longitud' => $longitud, 'intentos' => $intentos, 'colores' => $array_colores, 'clave' => $clave]);
    }
}
