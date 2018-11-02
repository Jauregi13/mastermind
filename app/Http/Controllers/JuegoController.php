<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class JuegoController extends Controller
{
	public function iniciar(Request $request)
    {
    	$longitud = $request -> input('longitud');
        $valorcolores = $request -> input('colores');

        if($longitud > $valorcolores){
            return view('index', ['mensajeError' => 'El número de elementos no puede ser inferior a la longitud
                                                     del código cuando no se permiten repetidos']);
        }
        else {
            $nombre = $request -> input('nombre');
            $intentosMax = $request -> input('intentos');
            $intentos = 0;
            
            $repetido = $request -> input('repetido');
            $colores = array('Azul','Naranja','Verde','Rojo','Azul Claro','Violeta','Amarillo','Gris');

            session(['nombre' => $nombre]);
            session(['longitud' => $longitud]);
            session(['intentosMax' => $intentosMax]);
            session(['intentos' => $intentos]);
            session(['valorcolores' => $valorcolores]);
            session(['colores' => $colores]);
            session(['resultado' => null]);


            $request->session()->forget('clave');

            for($i=0;$i < $longitud; $i++){
                if($repetido == 'si'){

                    $request->session()->push('clave', rand(0,$valorcolores -1));

                }
                else{
                    if($i == 0){
                        $request->session()->push('clave', rand(0,$valorcolores -1));
                    }
                    else {
                        $valor = rand(0,$valorcolores -1);;
                        while (in_array($valor, session('clave'))) {
                            $valor = rand(0,$valorcolores -1);
                        }
                        $request->session()->push('clave', $valor);

                    }
                    
                }
                
            }
            
            return view('juego');
        }
    	
    }


    public function jugar(Request $request)
    {
    	$longitud = session('longitud');
	    $clave = array();

    	// contar el intento despues de darle al boton
        $sumar_intento = session('intentos') + 1;
        

        if(session('intentos') != session('intentosMax')){
            $request->session()->put('intentos', (session('intentos') +1));
        }
        
            
    	if($sumar_intento <= session('intentosMax')){
    		
            $acierto= 0;
            $candidato = 0;

            for ($i=0; $i < $longitud; $i++) { 
	            $clave[$i] = $request -> input($i);

                if($clave[$i] == session('clave')[$i]){
                    $acierto++;

                } 

                else if(in_array($clave[$i], session('clave'))){
                    $candidato++;
                }
	        }
	        array_push($clave, $acierto);
	        array_push($clave, $candidato);
	        $request->session()->push('resultado', $clave);
    	}
    	

    	return view('juego');
    }
}
