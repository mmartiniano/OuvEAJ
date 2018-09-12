<?php
	include "init.php";

	$elo = conectar();

	session_start();

	if(!validado()){
		$senha = trim($_POST['senha']);
		$senhax = $senha;

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
				header('Location:	consultar.php');
			}else{
				$_SESSION['validado'] = true;
				if(!consultado()){
					$sql = "SELECT * FROM usuario LEFT OUTER JOIN setor ON setor.setor_id = usuario.setor_id WHERE usuario.id = ?;";

					$stmt = $elo->prepare($sql);
						$stmt->bindParam(1, $_SESSION['id']);
				 	$stmt->execute();
				 
					$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
					$usuario = $usuarios[0];
					
					$_SESSION['setor'] = $usuario['setor'];
					$_SESSION['genero'] = $usuario['genero'];

					$_SESSION['celular'] = $usuario['celular'];
					$_SESSION['aniversario'] = $usuario['aniversario'];
						$data = explode("-", $_SESSION['aniversario']);
						$_SESSION['a'] = $data[0];
						$_SESSION['m'] = $data[1];
						$_SESSION['d'] = $data[2];
					$_SESSION['senha'] = $senhax;

					$_SESSION['consultado'] = true;
				}
				header('Location: ../conta.php');
			}		
		}else{
			$erro = "Senha não informada";
		}
	}
	header('Location: ../conta.php');
?>