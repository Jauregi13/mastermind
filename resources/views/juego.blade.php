<!DOCTYPE html>
<html>
<head>
	<title>Juego</title>
</head>
<body>
<h3>Bienvenido Mastermind!</h3>
@if(isset($_POST['comprobar']))
	@foreach($clave as $valor)
		<img src="img/bola{{$valor}}.png">
	@endforeach
@endif
<h4>Introduce un código</h4>
<form method="post" action="jugar">
@csrf
@for ($i = 0; $i < $longitud; $i++)
	<select name="{{$i}}">
		<option value="0">Azul</option>
		<option value="1">Naranja</option>
		<option value="2">Verde</option>
		<option value="3">Rojo</option>
		<option value="4">Azul Turquesa</option>
		<option value="5">Violeta</option>
		<option value="6">Amarillo</option>
		<option value="7">Gris</option>
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