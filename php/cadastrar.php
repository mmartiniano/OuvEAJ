<?php

	include "init.php";

	$elo = conectar();

	$nome = trim($_POST['nome']);
	$matricula = trim($_POST['matricula']);
	$email = trim($_POST['email']);
	$email2 = trim($_POST['email2']);
	$senha = trim($_POST['senha']);
	$senha2 = trim($_POST['senha2']);
	$setor = trim($_POST['setor']);
	$genero = trim($_POST['genero']);
	$celular = trim($_POST['celular']);
	$aniversario = trim($_POST['aniversario']);

	$aceito = array("jpg","jpeg","gif","png","bmp","svg","");

	if(($nome != null) && ($matricula != null) && ($email != null) && ($email2 != null) && ($senha != null) && ($senha2 != null) && ($setor != null)){

		if(strlen($matricula) != 10){
			$erro = "Matrícula informada inválida";

		}elseif($email != $email2){
			$erro = "Os e-mails informados não coincidem";

		}elseif($senha !=$senha2){
			$erro = "As senhas informadas não coincidem";

		}else{

			$sql = "SELECT matricula, email FROM usuario WHERE matricula = ? OR email = ?";
	 		$stmt = $elo->prepare($sql); 
				$stmt->bindParam(1, $matricula);
				$stmt->bindParam(2, $email);
			$stmt->execute();

			$checar = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if (count($checar)>0){

				$erro = "Matrícula e/ou e-mail já utilizados";

	 		}else{
				if($_FILES['perfil'] != null){
		  			$ext = pathinfo($_FILES['perfil']['name'], PATHINFO_EXTENSION);//Pegando extensão do arquivo
		  			$renomeio = $matricula.".".$ext; //Definindo um novo nome para o arquivo
		  			$dir = '../usuario/perfil/'; //Diretório para uploads

					if(in_array($ext,$aceito)){
		 				move_uploaded_file($_FILES['perfil']['tmp_name'], $dir.$renomeio); //Fazer upload do arquivo
						$dir = 'usuario/perfil/';
						$perfil = $dir.$renomeio;
						if ($ext == ""){
							$perfil = null;
						}
					}else{
						$erro = "Erro no upload da foto";
						$perfil = null;
						$anexo_ok = false;
					}
				}

				$senha = criptografar($senha);
				$nome = ucfirst($nome);

				$sql = "INSERT INTO usuario(nome, matricula, email, senha, setor_id, genero, celular, aniversario, perfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

				$stmt = $elo->prepare($sql);			
					$stmt->bindParam(1, $nome);
					$stmt->bindParam(2, $matricula);
					$stmt->bindParam(3, $email);
					$stmt->bindParam(4, $senha);
					$stmt->bindParam(5, $setor);
					$stmt->bindParam(6, $genero);
					$stmt->bindParam(7, $celular);
					$stmt->bindParam(8, $aniversario);
					$stmt->bindParam(9, $perfil);
				$stmt->execute();

				$sql = "SELECT * FROM usuario WHERE matricula = ?";

				$stmt = $elo->prepare($sql);
					$stmt->bindParam(1, $matricula);
			 	$stmt->execute();
			 
				$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

				if (count($usuarios) <= 0){
					$_SESSION['cadastrado'] = false;
				}else{
					session_start();

					$usuario = $usuarios[0];

					$_SESSION['logado'] = true;		

					$_SESSION['nome'] = $usuario['nome'];
					$_SESSION['matricula'] = $usuario['matricula'];
					$_SESSION['email'] = $usuario['email'];
					$_SESSION['perfil'] = $usuario['perfil'];
					$_SESSION['id'] = $usuario['id'];

					$primeiroNome = explode(" ", $usuario['nome']);
					$_SESSION['primeiroNome'] = $primeiroNome[0];

					$_SESSION['cadastrado'] = true;
				}	
			}
		}
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
				<?php if(cadastrado()): ?>
					<h2>Cadastro efetuado</h2>
					<?php if((isset($anexo_ok)) && (!$anexo_ok)) : ?>
						<br>
						<h3 class="fvermelho"><?php echo $erro."<br>"; ?></h3>
					<?php endif ?>
					<br>
					<?php echo "<script>
							setTimeout(home, 1600); 
							function home(){
								location.href='../home.php'; 
							}
					</script>"; ?>
				<?php else: ?>
					<div class="row">
						<h2>Não foi possível realizar seu cadastro</h2>
							<br>
							<h3 class="fvermelho">
								<?php if(isset($erro)) { echo $erro."<br><br>";} ?>		
							</h3>
						<script>
							setTimeout(index, 1600); 
							function index(){
								location.href='../index.php'; 
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