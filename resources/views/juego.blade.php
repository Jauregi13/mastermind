@extends('layouts.layout')

@section('titulo','A jugar!!')

@section('resultado/error')
@if(Request::has('comprobar'))
	@php
	$indiceUltimoIntento = Session::get('intentos') - 1;
	$indiceAciertos = count(Session::get('resultado')[$indiceUltimoIntento]) - 2; 
	$ultimoIntento = Session::get('resultado')[$indiceUltimoIntento][$indiceAciertos];
	@endphp
	@if($ultimoIntento == Session::get('longitud'))
		<div class="alert alert-success" role="alert">
			<h3>Has acertado la clave!! Enhorabuena!!</h3>
			<a class="btn btn-primary" href="/" role="button">Nueva Partida</a>
		</div>
	@elseif($ultimoIntento != Session::get('longitud') && Session::get('intentos') == Session::get('intentosMax'))
		<div class="alert alert-danger" role="alert">
			<h3>No has acertado la clave!! Intentalo otra vez</h3>
			<p>La clave es:
				@foreach(Session::get('clave') as $valor)
					<img src="img/bola{{$valor}}.png">
				@endforeach
			</p>
			<a class="btn btn-primary" href="/" role="button">Nueva Partida</a>
		</div>
	@endif
@endif
@endsection

@section('contenido')

@if(Request::has('comprobar'))

	@foreach(Session::get('resultado') as $registro)
		@for($i = 0; $i < Session::get('longitud'); $i++)
			<img src="img/bola{{$registro[$i]}}.png">
		@endfor
		<b>Aciertos: {{$registro[count($registro)-2]}}
		Candidatos: {{$registro[count($registro)-1]}}</b>
		<br>
	@endforeach
	
@endif
<h4>Introduce un código</h4>
<form method="post" action="jugar">
@csrf
<div class="form-group">
@for ($i = 0; $i < Session::get('longitud'); $i++)
	<select name="{{$i}}" class="form-control">
	@for($j = 0; $j < Session::get('valorcolores'); $j++)
		<option value="{{$j}}">{{Session::get('colores')[$j]}}</option>
	@endfor
	</select>
@endfor
</div>
<input type="submit" name="comprobar" value="Comprobar">
</form>
<h3>Jugador/a: {{Session::get('nombre')}}</h3>

<hr>
<p>Intento: {{Session::get('intentos')}} / {{Session::get('intentosMax')}}</p>

@endsection
