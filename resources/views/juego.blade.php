<!DOCTYPE html>
<html>
<head>
	<title>Juego</title>
</head>
<body>
<h3>Bienvenido Mastermind!</h3>
@if($colores != null)
	@for ($i=0; $i < $colores; $i++)
		{{$colores[i]}}
	@endfor
@endif
<h4>Introduce un código</h4>
<form method="post" action="jugar">
@csrf
@for ($i = 0; $i < $longitud; $i++)
	<select>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
	</select>
@endfor
<br><br>
<input type="submit" name="comprobar" value="Comprobar">
</form>
<br><br>

<h3>Jugador/a: {{$nombre}}</h3>

<hr>

<p>Intento: 1 / {{$intentos}}</p>
</body>
</html>