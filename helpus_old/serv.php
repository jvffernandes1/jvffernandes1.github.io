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
		<?php require_once "header.php";
			  include "text_data.php";
			  
			  $contavisita = ler();
			  $contavisita = $contavisita+1;
			  gravar($contavisita);
		?>
		<div class="cont">
			<div class="geralserv">
				<div class="lateralserv">
					<b>Filtros de busca:</b>
					<hr>
					<form action="http://127.0.0.1:8080/helpus/serv.php?service=<?php echo $_GET["service"];?>&srcfiltro=<?php echo $_GET["srcfiltro"];?>" method="GET">
						<label for="sel1">Pesquisa por nome:</label>
						<input type="text" class="form-control" name="nmfiltro" placeholder="Ex: Kipão">
						<hr>
						<label for="sel1">Pesquisa por serviço:</label>
						  <select class="form-control" id="sel1" name="service">
							<option value="lanchonete">Lanchonetes</option>
							<option value="padaria">Padarias</option>
							<option value="farmacia">Farmácias</option>
							<option value="empregado">Empregado Doméstico</option>
						  </select>
						<hr> 
						<label for="sel1">Ordenar por:</label>
							<select class="form-control" id="sel1" name="srcfiltro">
								<option value="1">Nome</option>
								<option value="2">Melhores Notas</option>
								<option value="3">Mais visitados</option>
							  </select>
						<hr>
						<button type="submit" class="btn btn-danger">Buscar</button>
					</form>
				</div>
				<div class="centralserv">
				Resultados encontrados:
					
					<div class="boxserv">
						<?php 
							include "config.php";
							
							if(!isset($_GET['service']))
							{
								$getservice = "'%'";
							}
							else{
								$getservice = "'%".$_GET['service']."%'";
							}
							
							if(!isset($_GET['nmfiltro']))
							{
								$getnome = "%";
							}
							else{
								$getnome = "%".$_GET['nmfiltro']."%";
							}
							
							if(!isset($_GET['srcfiltro']))
							{
								$catch_id = "serial_id";
							}
							else if($_GET['srcfiltro'] == 1)
							{
								$catch_id = "anunnome";
							}
							else if($_GET['srcfiltro'] == 2)
							{
								$catch_id = "serial_id";
							}
							else
							{
								$catch_id = "serial_id";
							}
							
							$sql = "SELECT anunnome,serial_id,anunsobre FROM anuncadastro WHERE (anuntype1 ILIKE ".$getservice." OR anuntype2 ILIKE ".$getservice." OR anuntype3 ILIKE ".$getservice." OR anuntype4 ILIKE ".$getservice." OR anuntype5 ILIKE ".$getservice.") AND (anunnome ILIKE '".$getnome."' OR anunsobre ILIKE '".$getnome."') ORDER BY ".$catch_id.";";
							$resultado = pg_query($conecta,$sql);
							$linhas = pg_num_rows($resultado);
							
							for($contador = 1; $contador <= $linhas; $contador++ )
							{
								$linhadavez = pg_fetch_row($resultado);
						?>
							<a class="linkanun" href="http://127.0.0.1:8080/helpus/anunpag.php?anunpg=<?php echo $linhadavez[1];?>">
								<div class="boxanun">
									<div class="fotoanun">
										<img src="anun/<?php echo $linhadavez[1];?>/perfil.jpg" width="93%" height="auto"></img>
									</div>
									<div class="descanun">
									<b><?php
									
									echo $linhadavez[0];
									
									?></b>
									<br>
									
									<?php
									
									echo $linhadavez[2];
										
									?>
									</div>
								</div>
							</a>
							<br>
						<?php
							}
						?>
					</div>
					
				</div>
			</div>
		</div>
	</body>
</html>