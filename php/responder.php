<?php

	include "init.php";

	$elo = conectar();
	
	session_start();

	date_default_timezone_set('America/Fortaleza');

	$status = trim($_POST['status']);
	$resposta = trim($_POST['resposta']);
	$m_id = trim($_POST['m_id']);
	$data = date('y/m/d H:i:s');

	if($resposta != null){
		if($status == null){
			$status = 3;
		}
		
		$sql = "INSERT INTO resposta(resposta, data, usuario_id, manifestacao_id) VALUES (?, ?, ?, ?);";

		$stmt = $elo->prepare($sql);			
			$stmt->bindParam(1, $resposta);
			$stmt->bindParam(2, $data);
			$stmt->bindParam(3, $_SESSION['id']);
			$stmt->bindParam(4, $m_id);
		$stmt->execute();

		$sql = "UPDATE manifestacao SET status_id = ? WHERE id = ?;";

		$stmt = $elo->prepare($sql);			
			$stmt->bindParam(1, $status);
			$stmt->bindParam(2, $m_id);
		$stmt->execute();

		$_SESSION['respondido'] = true;
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
			<?php if(respondido()): ?>
				<h2>Resposta submetida com sucesso</h2>
			<?php else: ?>
				<div class="row">
					<h2>Não foi possível submeter usa manifestação</h2>
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
	<script>
		setTimeout(manifesto, 1500); 
		function manifesto(){
			location.href='../manifesto.php?id=<?php echo $m_id; ?>'; 
		}
	</script>
</html>