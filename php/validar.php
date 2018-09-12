<?php 
	include "init.php";

	$elo = conectar();

	session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<link rel="icon" href="../img/ico.png">
	<title>OuvEAJ</title>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="eaj, EAJ, escola, Escola, Agrícola, agrícola, agricola, Agricola, Jundiaí, Jundiai, jundiaí, jundiai, UFRN, ufrn, unidade, Unidade, acadêmica, Acadêmica, academica, Academica, ciências, Ciências, ciencias, Ciencias, agrárias, Agrárias, agrarias, Agrarias, Portal, portal, Ouvidoria, ouvidoria, OuvEAJ, ouveaj.">
    <meta name="description" content="Portal de Ouvidoria da Escola Agrícola de Jundiaí - EAJ | UFRN">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../css/elementos.css">
	<link rel="stylesheet" type="text/css" href="../icomoon/style.css">
</head>
<body>
	<div class="all col-12 azulme consolas f20 row fbranco">
		<div class="col col-8 skp-2 center">
			<br><br><br><br><br><br><br><br>

			<?php if (!validado()): ?>
				<h2 class="grups row col-8 skp-2">Por segurança, valide a seção reinserindo sua senha:</h2>
				<br>
				<h3 class="fvermelho">
					<?php if(isset($erro)) { echo $erro."<br><br>";} ?>		
				</h3>
				<form action="validar.php" method="post">			
					<div class="grups row col-8 skp-2">
						<input class="inp col col-12 login-ib upcase transparente" type="password" name="senha" maxlength="16" placeholder="Senha" autofocus required>
					</div>
					<div class="grups row col-8 skp-2">
						<button type="submit" name="alt" value="2" class="btn hover col col-12 login-ib azul fbranco upcase">Validar</button>
					</div>
				</form>
			<?php endif; ?>
		</div>
	</div>
</body>
	<script src="../js/load.js"></script>
</html>

<?php

	$senha = trim($_POST['senha']);
	$senhav = $senha;

	if($senha != null){
		$sql = "SELECT * FROM usuario WHERE id = ?";

		$stmt = $elo->prepare($sql);
			$stmt->bindParam(1, $_SESSION['id']);
	 	$stmt->execute();
	 
		$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$usuario = $usuarios[0];

		$senha = criptografar($senha);

		if($senha != $usuario['senha']){
			$erro = "Senha incorreta";
		}else{
			$_SESSION['validado'] = true;
			header('Location: ../conta.php');
		}		
	}else{
		$erro = "Senha não informada";
	}
?>