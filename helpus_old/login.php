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
		<?php require_once "header.php"; ?>
		<?php
			include "config.php";
			if(isset($_COOKIE["id"])){

			include "text_data.php";

			
		?>
		<div class="cont">
			<div class="bxpainel">	
				Seja bem-vindo <b> <?php echo $_COOKIE["id"]; ?> </b> ao painel de anunciantes! Aqui, você pode conferir estatisticas gerais de acessos ao seu perfil, além de
				alterar dados cadastrais! <a href="logout.php">Sair</a>
				<hr>
				<b>Número de visitas no site:</b> <?php echo ler();?>
			</div>
		</div>
		<?php			
			}
			else{
				setcookie("id", "whatever", 1);
				
				if(isset($_POST['id'])){
			$id = $_POST['id'];
			$senha = $_POST['senha'];
			
			
				$sql = "SELECT anunlogin,anunpw FROM anuncadastro WHERE anunlogin = '".$id."' and anunpw = '".$senha."';";
				$resultado = pg_query($conecta,$sql);
				$linhas = pg_num_rows($resultado);
				if($linhas > 0){
					setcookie("id",$id);
					header("Location:login.php");
				}
				else{
			?>
			<div class="cont">
			<div class="bxpainel">	
				<b>Bem-vindo! Logue abaixo:</b><br><br>
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="form-inline">
						<input class="form-control" type="text" placeholder="Usuário" name="id" tabindex="1" required>
						<input class="form-control" type="password" placeholder="Senha" name="senha" tabindex="2" required>
						<input class="btn" type="submit" value="Entrar" tabindex="3">  <a href="#"><button class="btn" type="button" tabindex="4">Cadastrar</button></a><br>
					</form><br>
					<font color="red">Usuário ou senha incorretos!</font>
			</div>
			</div>
			<?php
				}
				}
				else{
			?>
			<div class="cont">
			<div class="bxpainel">	
					<b>Bem-vindo! Logue abaixo:</b><br><br>
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="form-inline">
						<input class="form-control" type="text" placeholder="Usuário" name="id" tabindex="1" required>
						<input class="form-control" type="password" placeholder="Senha" name="senha" tabindex="2" required>
						<input class="btn" type="submit" value="Entrar" tabindex="3">  <a href="#"><button class="btn" type="button" tabindex="4">Cadastrar</button></a><br>
					</form><br>
			</div>
			</div>
		<?php
			}
			}
		?>			
	</body>
</html>