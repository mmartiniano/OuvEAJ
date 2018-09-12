<?php

	include "init.php";

	$elo = conectar();
	
	session_start();

	$assunto = trim($_POST['assunto']);
	$data = date('y/m/d');
	$setor = trim($_POST['setor']);
	$relevancia = trim($_POST['relevancia']);
	$corpo = trim($_POST['corpo']);
	$tipo = $_SESSION['tipo'];
	$usuario_id = $_SESSION['id'];

	$aceito = array("jpg","jpeg","gif","png","bmp","mp3","avi","asf","doc","mov","mpg","pdf","rar","zip","7z","txt","docx","odt","gif","");

	if(($setor != null) && ($corpo != null) && ($tipo != null)){

		if($_FILES['anexo'] != null){
  			$ext = pathinfo($_FILES['anexo']['name'], PATHINFO_EXTENSION);//Pegando extensão do arquivo
  			$renomeio = mt_rand().".".$ext; //Definindo um novo nome para o arquivo
  			$dir = '../manifestacao/anexo/'; //Diretório para uploads

			if(in_array($ext,$aceito)){
 				move_uploaded_file($_FILES['anexo']['tmp_name'], $dir.$renomeio); //Fazer upload do arquivo
				$anexo = $dir.$renomeio;
				if ($ext == ""){
					$anexo = null;
				}
			}else{
				$anexo = null;
				$erro = "O arquivo anexado não foi aceito";
				$anexo_ok = false;
			}
		}
		$status = 3;
		$relevancia = null;

		$sql = "INSERT INTO manifestacao(assunto, data, corpo, anexo, setor_id, tipo_id, relevancia_id, usuario_id, status_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$stmt = $elo->prepare($sql);			
			$stmt->bindParam(1, $assunto);
			$stmt->bindParam(2, $data);
			$stmt->bindParam(3, $corpo);
			$stmt->bindParam(4, $anexo);
			$stmt->bindParam(5, $setor);
			$stmt->bindParam(6, $tipo);
			$stmt->bindParam(7, $relevancia);
			$stmt->bindParam(8, $usuario_id);
			$stmt->bindParam(9, $status);
		$stmt->execute();

		$_SESSION['manifestado'] = true;
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
				<?php if(manifestado()): ?>
					<h2>Manifestação submetida com sucesso</h2>
					<?php if((isset($anexo_ok)) && (!$anexo_ok)) : ?>
						<br>
						<h3 class="fvermelho"><?php echo $erro."<br>"; ?></h3>
					<?php endif ?>
					<br>
					<?php echo "<script>
							setTimeout(home, 2000); 
							function home(){
								location.href='../home.php'; 
							}
					</script>"; ?>
				<?php else: ?>
					<div class="row">
						<h2>Não foi possível submeter usa manifestação</h2>
							<br>
							<h3 class="fvermelho">
								<?php if(isset($erro)) { echo $erro."<br><br>";} ?>		
							</h3>
						<script>
							setTimeout(nm(), 2500); 
							function nm(){
								location.href='../nova-manifestacao.php'; 
							}
						</script>
					</div>
				<?php  endif; ?>
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
</html>