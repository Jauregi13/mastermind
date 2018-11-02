<!DOCTYPE html>
<html>
<head>
	<title>Juego</title>
</head>
<body>
<h3>Bienvenido Mastermind!</h3>
@if(Request::has('comprobar'))
	@foreach(Session::get('resultado') as $registro)
		@for($i = 0; $i < Session::get('longitud'); $i++)
			<img src="img/bola{{$registro[$i]}}.png">
		@endfor
		<b>Aciertos: {{$registro[count($registro)-2]}}
		Candidatos: {{$registro[count($registro)-1]}}</b>
		<br>
	@endforeach
	@php
	$indiceUltimoIntento = Session::get('intentos') - 1;
	$indiceAciertos = count(Session::get('resultado')[$indiceUltimoIntento]) - 2; 
	$ultimoIntento = Session::get('resultado')[$indiceUltimoIntento][$indiceAciertos];
	@endphp
	@if($ultimoIntento == Session::get('longitud'))
		<h3>Has acertado la clave!! Enhorabuena!!</h3>
		<a href="/"><button>Nueva partida</button></a>

	@elseif($ultimoIntento != Session::get('longitud') && Session::get('intentos') == Session::get('intentosMax'))
		<h3>No has acertado la clave!! Intentalo otra vez</h3>
		<a href="/"><button>Nueva partida</button></a>
	@endif
@endif
<h4>Introduce un código</h4>
<form method="post" action="jugar">
@csrf
@for ($i = 0; $i < Session::get('longitud'); $i++)
	<select name="{{$i}}">
	@for($j = 0; $j < Session::get('valorcolores'); $j++)
		<option value="{{$j}}">{{Session::get('colores')[$j]}}</option>
	@endfor
	</select>
@endfor
<br><br>
<input type="submit" name="comprobar" value="Comprobar">
</form>
<br><br>
@foreach(Session::get('clave') as $valor)
		<img src="img/bola{{$valor}}.png">
@endforeach

<h3>Jugador/a: {{Session::get('nombre')}}</h3>

<hr>
<p>Intento: {{Session::get('intentos')}} / {{Session::get('intentosMax')}}</p>
</body>
</html>