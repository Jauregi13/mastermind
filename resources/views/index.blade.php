@extends('layouts.layout')

@section('titulo', 'Configuración Mastermind')

@section('contenido')

<form method="post" action="iniciar">
	@csrf
	<div class="form-group">
	<label>Jugador/a:</label>
	<input type="text" class="form-control" name="nombre" value="Jon">
	</div>
	<fieldset class="form-group">
		<label>Longitud de la clave:</label>
		<div class="form-check">
			<label class="form-check-label">
				<input type="radio" class="form-check-input" name="longitud" value="4" checked>
				4
			</label>
		</div>
		<div class="form-check">
			<label class="form-check-label">
				<input type="radio" class="form-check-input" name="longitud" value="5">
				5
			</label>
		</div>
	</fieldset>
	<fieldset class="form-group">
		<label>Numero de colores posibles:</label>
		<div class="form-check">
			<label class="form-check-label">
				<input type="radio" name="colores" value="4" class="form-check-input">
				4
			</label>
		</div>
		<div class="form-check">
			<label class="form-check-label">
				<input type="radio" name="colores" value="5" class="form-check-input">
				5
			</label>
		</div>
		<div class="form-check">
			<label class="form-check-label">
				<input type="radio" name="colores" value="6" class="form-check-input">
				6
			</label>
		</div>
		<div class="form-check">
			<label class="form-check-label">
				<input type="radio" name="colores" value="7" class="form-check-input">
				7
			</label>
		</div>	
		<div class="form-check">
			<label class="form-check-label">
				<input type="radio" name="colores" value="8" class="form-check-input">
				8
			</label>
		</div>
	</fieldset>
	<fieldset class="form-group">
		<label>Permitir repetidos:</label>
		<div class="form-check">
			<label class="form-check-label">
				<input type="radio" class="form-check-input" name="repetido" value="si">
				Sí	
			</label>
		</div>
		<div class="form-check">
			<label class="form-check-label">
				<input type="radio" name="repetido" class="form-check-input" value="no" checked>
				No
			</label>
		</div>	
	</fieldset>
	<div class="form-group">
		<label>Numero de intentos:</label>
		<select name="intentos" class="form-control">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
		</select>
	</div>		
	<input type="submit" class="btn btn-primary" name="iniciar" value="Iniciar partida">
</form>
@endsection
@section('resultado/error')

@if(Request::has('iniciar'))
	<div class="alert alert-danger" role="alert">
		{{$mensajeError}}
	</div>
@endif
@endsection

