<?php

	include "init.php";

	$elo = conectar();

	$id = $_GET['id'];
	$setor = $_GET['setor_id'];

	$erro = null;

	$sql = "SELECT * FROM usuario WHERE id = ?;";

	$stmt = $elo->prepare($sql);
		$stmt->bindParam(1, $id);
	$stmt->execute();

	$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$usuario = $usuarios[0];

	if($usuario['ouvidor_id'] != null){
		$sql = "UPDATE usuario SET ouvidor_id = ? WHERE id = ?;";

		$stmt = $elo->prepare($sql);
			$stmt->bindParam(1, $erro);		
			$stmt->bindParam(2, $id);
		$stmt->execute();

	}else{

		$sql = "SELECT * FROM usuario WHERE ouvidor_id = ?;";

		$stmt = $elo->prepare($sql);
			$stmt->bindParam(1, $setor);
		$stmt->execute();

		$checar = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(count($checar) > 0){
			$erro = "Cargo já ocupado";
		}else{

			$sql = "UPDATE usuario SET ouvidor_id = ? WHERE id = ?;";

			$stmt = $elo->prepare($sql);
				$stmt->bindParam(1, $setor);		
				$stmt->bindParam(2, $id);
			$stmt->execute();
		}
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
	<br>
		<div class="col col-8 skp-2 center top">
			<?php if($erro == null): ?>
				<h2>Operação efetuada com êxito</h2>
			<?php else: ?>
				<div class="row">
					<h2>Não foi possível realizar operação</h2>
					<br>
					<h3 class="fvermelho">
						<?php echo $erro; ?>		
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
			<script>
				setTimeout(usuarios, 1500); 
				function usuarios(){
					location.href='../usuarios.php'; 
				}
			</script>
		</div>
	</div>
</body>
	<script src="../js/load.js"></script>
</html>