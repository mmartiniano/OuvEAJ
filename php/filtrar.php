<?php

	include "init.php";

	$elo = conectar();

	session_start();

	$x = $_GET['x'];
	$tipo = $_GET['tipo'];
	$setor = $_GET['setor'];
	$relevancia = $_GET['relevancia'];
	$status = $_GET['status'];

	switch ($x) {

		case 'fa': $manifestosall = $_SESSION['manifestosall'];

			for ( $y = (count($manifestosall)-1); $y >= 0; $y--) {
				if(!((($tipo == $manifestosall[$y]['tipo_id']) or ($tipo == "null")) and (($setor == $manifestosall[$y]['setor_id']) or ($setor == "null")) and (($relevancia == $manifestosall[$y]['relevancia_id']) or ($relevancia == "null")) and (($status == $manifestosall[$y]['status_id']) or ($status == "null")))){
					unset($manifestosall[$y]);
				}
			}

			$_SESSION['selecionado'] = true;

			$_SESSION['manifestosall'] = array_values($manifestosall);

			//echo "Tipo:".$tipo."      Setor:".$setor."        Relevancia:".$relevancia."            Status:".$status."                             ";
			//var_dump($manifestosall);
			//var_dump($_SESSION['manifestosall']);
			header("location: ../explorar.php");
			break;
	}
 ?>