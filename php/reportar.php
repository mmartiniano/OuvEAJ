<?php

	include "init.php";

	$elo = conectar();

	session_start();

	$email = trim($_POST['emailfeedback']);
	$feedback = trim($_POST['feedback']);

	if(($email != null) and ($feedback != null)){
		$sql = "INSERT INTO feedback(email, feedback) VALUES (?, ?);";

 		$stmt = $elo->prepare($sql); 
			$stmt->bindParam(1, $email);
			$stmt->bindParam(2, $feedback);
		$stmt->execute();

		$_SESSION['reportado'] = true;
	}else{
		$erro = "Dados importantes não foram informados";
	}

?>

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
				<br><br><br><br><br><br><br><br><br><br><br>
				<?php if(reportado()): ?>
					<h2>Feedback submetido</h2>
				<?php else: ?>
					<div class="row">
						<h2>Feedback não submetido</h2>
						<br>
						<h3 class="fvermelho">
							<?php if(isset($erro)) { echo $erro;} ?>		
						</h3>
					</div>
				<?php  endif; ?>
				<br><br>
				<div class="row">
					<span class="col-1 circle small load verde"></span>
					<span class="col-1 circle small load laranja"></span>
					<span class="col-1 circle small load vermelho"></span>
					<span class="col-1 circle small load azulmc"></span>
					<span class="col-1 circle small load roxo"></span>
				</div>
		</div>
	</div>
</body>
	<script src="../js/load.js"></script>
	<script src="../js/home.js"></script>
	<script>
		setTimeout(back(), 1500); 
	</script>
</html>