<?php

	include "init.php";

	$elo = conectar();
	
	session_start();

	$_SESSION['elogio'] = 0;
	$_SESSION['reclamacao'] = 0;
	$_SESSION['denuncia'] = 0;
	$_SESSION['sugestao'] = 0;
	$_SESSION['solicitacao'] = 0;

	$setor = $_POST['setor'];

	$sql = "SELECT * FROM manifestacao;";
	$stmt = $elo->prepare($sql);			
	$stmt->execute();

	$manifestacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$total = count($manifestacoes);	

	if($setor != null){
		$sql = "SELECT * FROM manifestacao WHERE setor_id = ?;";
		$stmt = $elo->prepare($sql);
			$stmt->bindParam(1, $setor);		
		$stmt->execute();

		$manifestacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$total = count($manifestacoes);

	}
	
	for ($y=0; $y < $total; $y++) {
		switch ($manifestacoes[$y]['tipo_id']){
			case 1: $_SESSION['elogio']++;
				break;
			case 2: $_SESSION['reclamacao']++;
				break;
			case 3: $_SESSION['denuncia']++;
				break;
			case 4: $_SESSION['sugestao']++;
				break;
			case 5: $_SESSION['solicitacao']++;
				break;
		}
	}

	$_SESSION['setore'] = $setor;
	$_SESSION['total'] = $total;

	$_SESSION['contabilizado'] = true;
	$setor = null;

	header('Location: ../estatisticas.php');

?>