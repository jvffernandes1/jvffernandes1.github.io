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
			  include "config.php";
			  
			  $selo = $_GET['anunpg'];
			  
			$sql = "SELECT anunnome,serial_id,anunsobre,anunend,anuntelefone,anunvoto FROM anuncadastro WHERE serial_id = ".$selo.";";
			$resultado = pg_query($conecta,$sql);
			$linhas = pg_num_rows($resultado);
			$linhadavez = pg_fetch_row($resultado);
		?>
		<div class="cont">
			<div class="geralserv">
				<div class="lateralserv">
					<div class="anunpht"><img src="anun/<?php echo $_GET['anunpg']; ?>/perfil.jpg" width="100%" height="auto"></img></div>
					
					<hr>
					
					<table width="100%">
						<tr style="background-color:#ccc;">
							<td><b>Nome:</b></td>
							<td><?php echo $linhadavez[0]; ?></td>
						</tr>
						<tr>
							<td><b>Endereço:</b></td>
							<td><?php echo $linhadavez[3]; ?></td>
						</tr>
						<tr style="background-color:#ccc;">
							<td><b>Telefone:</b></td>
							<td><?php echo $linhadavez[4]; ?></td>
						</tr>
						<tr>
							<td><b>Nota:</b></td>
							<td><?php echo $linhadavez[5]; ?></td>
						</tr>
					</table>
					
					<hr>
					
					<a href="serv.php">Voltar</a>
				</div>
				<div class="centralserv">
					Aqui será um sistema de cardápio ou qualquer outra coisa que a empresa queiras!
					<hr>
					Avaliações: <a href="avalia.php?anunnick=<?php echo $_GET['anunpg']; ?>">Clique aqui para avaliar!</a>
					<?php
						  
						$sql = "SELECT * FROM anuncoment WHERE anun_id = ".$selo." AND excluir='n' ORDER BY serial_id DESC;";
						$resultado = pg_query($conecta,$sql);
						$linhas = pg_num_rows($resultado);
						
						if($linhas = 0);
							echo "<br><br>Seja o primeiro a avaliar!";
						
						for($contador = 1; $contador <= 10 and $contador <= $linhas; $contador++)
						{
						$linhadavez = pg_fetch_row($resultado);
					?>
						<div class="boxcoment">
							<div class="boxnomecoment">
								<?php
									echo "<b>".$linhadavez[3]."</b> - (".$linhadavez[5].")";
								?>
							</div>
							<div class="boxnotacoment" align="right">
								<b>Nota:</b> <?php echo $linhadavez[4]; ?>
							</div><br>
							<hr class="minusspace">
							<?php
								echo $linhadavez[2];
							?>
						</div>
					
					
					
					<?php 
					} 
					?>
					
				</div>
			</div>
		</div>
	</body>
</html>