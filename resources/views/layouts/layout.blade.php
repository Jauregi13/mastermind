<!DOCTYPE html>
<html>
<head>
	<title>@yield('titulo')</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
<div class="container-fluid">
	<div class="jumbotron">
		  <center>
			  <h3><b>Bienvenido/a al Mastermind!</b></h3>
			  @for($i = 0; $i < 8;$i++)
			  	<img src="img/bola{{$i}}.png">
			  @endfor
		  </center>
	</div>
	<div class="row">
		<div class="col-md-7">
			@yield('resultado/error')
		</div>
	</div>
	<div class="row">
		
		<div class="col-md-4">
			@yield('contenido')
		</div>
	</div>
	


</body>
</html>