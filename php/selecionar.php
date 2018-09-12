<?php

	include "init.php";

	$elo = conectar();

	session_start();

	$x = $_GET['x'];
	if(isset($_GET['tipo'])) { $tipo = $_GET['tipo']; }
	if(isset($_GET['setor'])) { $setor = $_GET['setor']; }
	if(isset($_GET['relevancia'])) { $relevancia = $_GET['relevancia']; }
	if(isset($_GET['status'])) { $status = $_GET['status']; }
	if(isset($_GET['cargo'])) { $cargo = $_GET['cargo']; }

	switch ($x) {
		case 'mu': $id = $_SESSION['id'];

			$sql = "SELECT * FROM manifestacao LEFT OUTER JOIN setor ON manifestacao.setor_id = setor.setor_id LEFT OUTER JOIN tipo ON manifestacao.tipo_id = tipo.tipo_id LEFT OUTER JOIN status ON manifestacao.status_id = status.status_id LEFT OUTER JOIN relevancia ON manifestacao.relevancia_id = relevancia.relevancia_id WHERE manifestacao.usuario_id = ?;";

			$stmt = $elo->prepare($sql); 
				$stmt->bindParam(1, $id);
			$stmt->execute();

			$_SESSION['manifestos'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$manifestos = $_SESSION['manifestos'];

			for ( $y = (count($manifestos)-1); $y >= 0; $y--) {
				if(!((($tipo == $manifestos[$y]['tipo_id']) or ($tipo == "null")) and (($setor == $manifestos[$y]['setor_id']) or ($setor == "null")) and (($relevancia == $manifestos[$y]['relevancia_id']) or ($relevancia == "null")) and (($status == $manifestos[$y]['status_id']) or ($status == "null")))){
					unset($manifestos[$y]);
				}
			}

			$_SESSION['manifestos'] = array_values($manifestos);

			$_SESSION['selecionado'] = true;

			header("location: ../home.php");
			break;

		case 'ma': 	$sql = "SELECT * FROM manifestacao LEFT OUTER JOIN setor ON manifestacao.setor_id = setor.setor_id LEFT OUTER JOIN tipo ON manifestacao.tipo_id = tipo.tipo_id LEFT OUTER JOIN status ON manifestacao.status_id = status.status_id LEFT OUTER JOIN relevancia ON manifestacao.relevancia_id = relevancia.relevancia_id;";

			$stmt = $elo->prepare($sql); 
			$stmt->execute();

			$_SESSION['manifestosall'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$manifestosall = $_SESSION['manifestosall'];

			for ( $y = (count($manifestosall)-1); $y >= 0; $y--) {
				if(!((($tipo == $manifestosall[$y]['tipo_id']) or ($tipo == "null")) and (($setor == $manifestosall[$y]['setor_id']) or ($setor == "null")) and (($relevancia == $manifestosall[$y]['relevancia_id']) or ($relevancia == "null")) and (($status == $manifestosall[$y]['status_id']) or ($status == "null")))){
					unset($manifestosall[$y]);
				}
			}

			$_SESSION['manifestosall'] = array_values($manifestosall);

			$_SESSION['selecionado'] = true;

			header("location: ../explorar.php");
			break;

		case 'mo': if(ouvidor()){
				$setor_id = $_SESSION['setor_id'];

				$sql = "SELECT * FROM manifestacao LEFT OUTER JOIN setor ON manifestacao.setor_id = setor.setor_id LEFT OUTER JOIN tipo ON manifestacao.tipo_id = tipo.tipo_id LEFT OUTER JOIN status ON manifestacao.status_id = status.status_id LEFT OUTER JOIN relevancia ON manifestacao.relevancia_id = relevancia.relevancia_id WHERE manifestacao.setor_id = ?;";

				$stmt = $elo->prepare($sql); 
					$stmt->bindParam(1, $setor_id);
				$stmt->execute();

				$_SESSION['manifestosouv'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

				$manifestosouv = $_SESSION['manifestosouv'];

				for ( $y = (count($manifestosouv)-1); $y >= 0; $y--) {
					if(!((($tipo == $manifestosouv[$y]['tipo_id']) or ($tipo == "null")) and (($setor == $manifestosouv[$y]['setor_id']) or ($setor == "null")) and (($relevancia == $manifestosouv[$y]['relevancia_id']) or ($relevancia == "null")) and (($status == $manifestosouv[$y]['status_id']) or ($status == "null")))){
						unset($manifestosouv[$y]);
					}
				}

				$_SESSION['manifestosouv'] = array_values($manifestosouv);

				$_SESSION['selecionado'] = true;

				header("location: ../ouvidor.php");
			}else{
				header("location: ../php/home.php");
			}
			break;

		case 'us': if(administrador()){
				$sql = "SELECT * FROM usuario LEFT OUTER JOIN setor ON usuario.setor_id = setor.setor_id;";

				$stmt = $elo->prepare($sql); 
				$stmt->execute();

				$_SESSION['usuarios'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

				$usuarios = $_SESSION['usuarios'];

				for ( $y = (count($usuarios)-1); $y >= 0; $y--) {
					if($_SESSION['usuarios'][$y]['ouvidor_id']){
						$uscargo = "2";
					}elseif($_SESSION['usuarios'][$y]['administrador_id']){
						$uscargo = "3";
					}else{
						$uscargo = "1";
					}

					if(!((($setor == $usuarios[$y]['setor_id']) or ($setor == "null")) and (($cargo == $uscargo) or ($cargo == "null")))){
						unset($usuarios[$y]);
					}
				}

				$_SESSION['usuarios'] = array_values($usuarios);

				$_SESSION['selecionado'] = true;

				header("location: ../usuarios.php");
			}else{
				header("location: ../php/home.php");
			}
			break;

		case 'fb': if(administrador()){
				$sql = "SELECT * FROM feedback;";

				$stmt = $elo->prepare($sql); 
				$stmt->execute();

				$_SESSION['feedbacks'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

				$_SESSION['selecionado'] = true;

				header("location: ../feedbacks.php");
			}else{
				header("location: /php/home.php");
			}
			break;
	}

	if(isset($_GET['tipo'])) { $_SESSION['ftipo'] = $tipo; }
	if(isset($_GET['setor'])) { $_SESSION['fsetor'] = $setor; }
	if(isset($_GET['relevancia'])) { $_SESSION['frelevancia'] = $relevancia;}
	if(isset($_GET['status'])) { $_SESSION['fstatus'] = $status; }
	if(isset($_GET['cargo'])) { $_SESSION['fcargo'] = $cargo;}

 ?>