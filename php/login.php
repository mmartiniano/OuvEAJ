<?php
	include "init.php";

	$elo = conectar();

	$matricula = trim($_POST['matricula-login']);
	$senha = trim($_POST['senha-login']);

	if (empty($matricula) || empty($senha)){
		$erro = "Dados importantes não foram informados";
    	exit();
	}else{
		$sql = "SELECT * FROM usuario WHERE matricula = ?";

		$stmt = $elo->prepare($sql);
			$stmt->bindParam(1, $matricula);
	 	$stmt->execute();
	 
		$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if (count($usuarios) <= 0){
			$erro = "Cadastre-se. Credenciais ainda não registradas";
		}else{
			$senha = criptografar($senha);

			$sql = "SELECT * FROM usuario WHERE matricula = ? AND senha = ?";

			$stmt = $elo->prepare($sql);
				$stmt->bindParam(1, $matricula);
				$stmt->bindParam(2, $senha);
		 	$stmt->execute();
	 
			$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if (count($usuarios) <= 0){
				$erro = "Matrícula e/ou senha incorreta(s)";
			}else{
				$usuario = $usuarios[0];

				session_start();

				$_SESSION['logado'] = true;

				$_SESSION['nome'] = $usuario['nome'];
				$_SESSION['matricula'] = $usuario['matricula'];
				$_SESSION['email'] = $usuario['email'];
				$_SESSION['perfil'] = $usuario['perfil'];
				$_SESSION['id'] = $usuario['id'];
				$_SESSION['setor_id'] = $usuario['setor_id'];

				$primeiroNome = explode(" ", $usuario['nome']);

				$_SESSION['primeiroNome'] = $primeiroNome[0];

				if($usuario['ouvidor_id'] != null){
					$_SESSION['ouvidor'] = true;
					$_SESSION['ouvidor_id'] = $usuario['ouvidor_id'];
				}

				if($usuario['administrador_id'] != null){
					$_SESSION['administrador'] = true;
				}
			}			
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
		<div class="col col-8 skp-2 center">
				<br><br><br><br><br><br><br><br><br><br><br>
				<?php if(logado()):?>
					<br><br>
					<?php echo "<script>
							setTimeout(home, 1200); 
							function home(){
								location.href='../home.php'; 
							}
					</script>"; ?>
				<?php else: ?>
					<div class="row">
						<h2>Login não efetuado</h2>
							<br>
							<h3 class="fvermelho">
								<?php if(isset($erro)) { echo $erro."<br><br>";} ?>		
							</h3>
						<script>
							setTimeout(index, 1700); 
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