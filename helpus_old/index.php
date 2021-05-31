<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>HelpUS.</title>
		
		<meta charset="UTF-8">
		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<?php require_once "header.php"; ?>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
			<div class="item active">
			  <img src="imgs/wallpaper.png" alt="Inicio">
			  <div class="carousel-caption">
				<h3>Bem-vindo</h3>
				<p>A HelpUS possuí o que você precisa</p>
			  </div> 
			</div>

			<div class="item">
			  <img src="imgs/wallpaper2.png" alt="Serviços">
			  <div class="carousel-caption">
				<h3>Serviços</h3>
				<p>Tudo o que você e sua casa precisam.</p>
			  </div> 
			</div>

			<div class="item">
			  <img src="imgs/wallpaper3.png" alt="Custo Zero">
			  <div class="carousel-caption">
				<h3>Custo Zero</h3>
				<p>A HelpUS é totalmente gratuita a você!</p>
			  </div> 
			</div>
		  </div>

		  <!-- Left and right controls -->
		  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		</div>
		</head>
		<body>

		<div class="jumbotron text-center">
			HelpUS.
		</div>
	</body>
	
</html>