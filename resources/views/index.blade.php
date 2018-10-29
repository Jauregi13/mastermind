<!DOCTYPE html>
<html>
<head>
	<title>MasterMind</title>
</head>
<body>
<h3><b>Bienvenido/a al Mastermind!</b></h3>

<form method="post" action="jugar">
	@csrf-
	<label>Jugador/a:</label>
	<input type="text" name="nombre">
	<br><br>
	<label>Longitud de la clave:</label>
	<br>
	<input type="radio" name="longitud" value="4" checked>
	<label>4</label>
	<input type="radio" name="longitud" value="5">
	<label>5</label>
	<br><br>
	<label>Numero de colores posibles:</label>
	<br>
	<input type="radio" name="colores" value="4">
	<label>4</label>
	<input type="radio" name="colores" value="5">
	<label>5</label>
	<input type="radio" name="colores" value="6" checked>
	<label>6</label>
	<input type="radio" name="colores" value="7">
	<label>7</label>
	<input type="radio" name="colores" value="8">
	<label>8</label>
	<br><br>
	<label>Permitir repetidos:</label>
	<br>
	<input type="radio" name="repetido" value="si">
	<label>Sí</label>
	<input type="radio" name="repetido" value="no" checked>
	<label>No</label>
	<br><br>
	<label>Numero de intentos:</label>
	<br>
	<select name="intentos">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
	</select>
	<br><br>
	<input type="submit" name="iniciar" value="Iniciar partida">

</form>

</body>
</html>