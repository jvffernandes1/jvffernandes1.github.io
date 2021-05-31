<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			  </button>
			  <a class="navbar-brand" href="index.php"><img src="imgs/helpus.png" width="30px" height="30px"></img></a>
			</div>
			<?php   $endereco = $_SERVER ['REQUEST_URI'];  ?>
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="serv.php"><?php

					if(strpos($endereco,"serv.php") == true)
					{
						echo "<b>";
					}
				?>SERVIÇOS</b></a></li>
				<li><a href="login.php"><?php

					if(strpos($endereco,"login.php") == true)
					{
						echo "<b>";
					}
				?>ANUNCIANTE</b></a></li>
				<li><a href="about.php"><?php

					if(strpos($endereco,"about.php") == true)
					{
						echo "<b>";
					}
				?>SOBRE</b></a></li>
				<li>
					<form class="navbar-form navbar-left" action="serv.php" method="GET">
					  <div class="input-group">
						<input type="text" class="form-control" name="nmfiltro" placeholder="Pesquisar...">
						<div class="input-group-btn">
						<span class="glyphicon glyphicon-search"></span>
						</div>
					  </div>
					</form>
				</li>
			  </ul>
			</div>
		  </div>
		</nav>