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
				<?php
				
					$somatoria_nota = 0;
					$anun_id = $_GET['anunnick'];
					$anuncomentario = $_POST['comentario'];
					$anunname = $_POST['nome'];
					$anunnota = $_POST['nota'];
					$anundata = date("d/m/Y");
				
					include "config.php";
					
					$sql="INSERT INTO anuncoment VALUES(nextval('anuncoment_serial_id_seq'::regclass),$anun_id,'$anuncomentario','$anunname',$anunnota,'$anundata','n')";
					$resultado=pg_query($conecta,$sql);
					$linhas=pg_affected_rows($resultado);
						
					if ($linhas > 0)
					{					
				
						$sql = "SELECT anuncnota FROM anuncoment WHERE anun_id = ".$anun_id." AND excluir='n';";
						$resultado = pg_query($conecta,$sql);
						$linhas = pg_num_rows($resultado);
						
						for($contador = 1; $contador <= $linhas; $contador++)
						{
						$linhadavez = pg_fetch_row($resultado);
						
						$somatoria_nota += $linhadavez[0];
						}
						
						$novanota = $somatoria_nota/$linhas;
						
						$sql="UPDATE anuncadastro SET anunvoto = $novanota WHERE serial_id = $anun_id";
						$resultado = pg_query($conecta,$sql);
						$linhas=pg_affected_rows($resultado);
						
						if ($linhas > 0)
							echo "<b>Voto computado com sucesso!</b>";
						else
							echo "ERRO";
					}
					else
						echo "Erro !!!";
						// Fecha a conexão com o PostgreSQL
						
					?>
						<br><br>
						<a href="serv.php">Voltar</a>
						
						<?php
					pg_close($conecta);
				
				?>
			</div>
		</div>
	</body>
</html>