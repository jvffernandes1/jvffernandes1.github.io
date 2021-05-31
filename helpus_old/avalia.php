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
		<script type="text/javascript" src="dist/gauge.js"></script>
		<script type="text/javascript" src="dist/canvasjs.min.js"></script>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<script>
	function updateTextInput(val) {
          document.getElementById('textInput').value=val; 
        }
	</script>
		<?php require_once "header.php";
		?>
		<div class="cont">
			<div class="geralserv">
				<form action="avaliainto.php?anunnick=<?php echo $_GET['anunnick']; ?>" method="POST">
					<label for="comment">Nome:</label>
					<input type="text" class="form-control" name="nome" id="nome" placeholder="Ex.: João">
					<hr>
					<div class="form-group">
					   <label for="comment">Comentário:</label>
					   <textarea class="form-control" rows="5" id="comentario" name="comentario" placeholder="Ex.: Gostei muito!"></textarea>
					</div>
					<hr>
					<div class="form-group">
						<label for="formControlRange">Nota: <output name="outputnota" id="outputnota" style="float: right; margin-top:-7px; margin-left:5px;">2.5</output></label>
						<input type="range" class="form-control-range" id="nota" name="nota" min="0" max="5" step="0.5" oninput="outputnota.value = nota.value">
					</div>
					<hr>
					<div class="form-group">
						<button type="submit" class="btn btn-danger">Avaliar!</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>