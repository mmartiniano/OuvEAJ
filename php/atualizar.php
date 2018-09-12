<?php 

	include "init.php";

	$elo = conectar();

	session_start();

	$nome = trim($_POST['nome']);
	$matricula = trim($_POST['matricula']);
	$email = trim($_POST['email']);	
	$genero = trim($_POST['genero']);
	$celular = trim($_POST['celular']);
	$aniversario = trim($_POST['aniversario']);
	$senha = trim($_POST['senha']);
		$senhax = $senha;

	$aceito = array("jpg","jpeg","gif","png","bmp","svg","");

	if(($nome != null) && ($matricula != null) && ($email != null) && ($senha != null)){

		if(strlen($matricula) != 10){
			$erro = "Matrícula informada inválida";
		}else{

			$sql = "SELECT * FROM usuario WHERE matricula = ? OR email = ?";
	 		$stmt = $elo->prepare($sql); 
				$stmt->bindParam(1, $matricula);
				$stmt->bindParam(2, $email);
			$stmt->execute();

			$checar = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if ($checar >= 0){
				
				$usuario = $checar[0];

				if(($usuario['id'] == $_SESSION['id']) || ($usuario['matricula'] == null)){

					$sql = "SELECT * FROM usuario WHERE id = ?";
			 		$stmt = $elo->prepare($sql); 
						$stmt->bindParam(1, $_SESSION['id']);
					$stmt->execute();

					$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
						
					$usuario = $usuarios[0];

					if($_FILES['perfil'] != null){
			  			$ext = pathinfo($_FILES['perfil']['name'], PATHINFO_EXTENSION);//Pegando extensão do arquivo
			  			$renomeio = $_SESSION['matricula'].".".$ext; //Definindo um novo nome para o arquivo
			  			$dir = '../usuario/perfil/'; //Diretório para uploads

						if(in_array($ext,$aceito)){
							move_uploaded_file($_FILES['perfil']['tmp_name'], $dir.$renomeio); //Fazer upload do arquivo
							$dir = 'usuario/perfil/';
							$perfil = $dir.$renomeio;
							if ($ext == ""){
								$perfil = $usuario['perfil'];
							}			 				
						}else{
							$erro = "Erro no upload da foto";
							$perfil = null;
							$anexo_ok = false;
						}
					}

					$senha = criptografar($senha);
					$nome = ucfirst($nome);

					$sql = "UPDATE usuario SET nome = ?, matricula = ?, email = ?, senha = ?, genero = ?, celular = ?, aniversario = ?, perfil = ?, ouvidor_id = ? WHERE id = ?";

					$stmt = $elo->prepare($sql);			
						$stmt->bindParam(1, $nome);
						$stmt->bindParam(2, $matricula);
						$stmt->bindParam(3, $email);
						$stmt->bindParam(4, $senha);
						$stmt->bindParam(5, $genero);
						$stmt->bindParam(6, $celular);
						$stmt->bindParam(7, $aniversario);
						$stmt->bindParam(8, $perfil);
						$stmt->bindParam(9, $ouvidor_id);
						$stmt->bindParam(10, $_SESSION['id']);
					$stmt->execute();

					$sql = "SELECT * FROM usuario LEFT OUTER JOIN setor ON setor.setor_id = usuario.setor_id WHERE matricula = ? OR email = ?";
			 		$stmt = $elo->prepare($sql); 
						$stmt->bindParam(1, $matricula);
						$stmt->bindParam(2, $email);
					$stmt->execute();

					$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
					$usuario = $usuarios[0];

					$_SESSION['nome'] = $usuario['nome'];
					$_SESSION['matricula'] = $usuario['matricula'];
					$_SESSION['email'] = $usuario['email'];
					$_SESSION['senha'] = $senhax;
					$_SESSION['setor'] = $usuario['setor'];
					$_SESSION['perfil'] = $usuario['perfil'];
					$_SESSION['genero'] = $usuario['genero'];
					$_SESSION['celular'] = $usuario['celular'];
					$_SESSION['aniversario'] = $usuario['aniversario'];
						$data = explode("-", $_SESSION['aniversario']);
							$_SESSION['a'] = $data[0];
							$_SESSION['m'] = $data[1];
							$_SESSION['d'] = $data[2];
					$_SESSION['id'] = $usuario['id'];

					$primeiroNome = explode(" ", $usuario['nome']);
					$_SESSION['primeiroNome'] = $primeiroNome[0];
			
					$_SESSION['atualizado'] = true;
					$_SESSION['consultado'] = true;
					$_SESSION['validado'] = true;

				}else{
					$erro = "Matrícula e/ou e-mail não disponíveis";
				}
			}else{
				$erro = "Ops";
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
			<br><br><br><br><br><br><br><br><br><br><br><br>	
			<?php if(atualizado()) : ?>
				<h2>Seus dados foram atualizados</h2>
				<?php if((isset($anexo_ok)) && (!$anexo_ok)) : ?>
					<br>
					<h3 class="fvermelho"><?php echo $erro."<br>" ?></h3>
				<?php endif ?>
			<?php else: ?>
				<h2>Seus dados não foram atualizados</h2>
				<br>
				<h3 class="fvermelho">
					<?php if(isset($erro)) { echo $erro."<br><br>";} ?>		
				</h3>
				
			<?php endif; ?>
 			<?php echo "<script>
				setTimeout(index, 700); 
				function index(){
					location.href='../conta.php'; 
				}
			</script>"; ?>
			<br>
			<div class="row">
				<span class="col-1 circle small load verde"></span>
				<span class="col-1 circle small load laranja"></span>
				<span class="col-1 circle small load vermelho"></span>
				<span class="col-1 circle small load azulmc"></span>
				<span class="col-1 circle small load cinza"></span>
			</div>		
		</div>
	</div>
</body>
	<script src="../js/load.js"></script>
</html>