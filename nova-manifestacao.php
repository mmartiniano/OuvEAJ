<?php
	session_start();

	include 'php/init.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<link rel="icon" href="img/ico.png">
	<title>Manifeste-se | OuvEAJ</title>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="eaj, EAJ, escola, Escola, Agrícola, agrícola, agricola, Agricola, Jundiaí, Jundiai, jundiaí, jundiai, UFRN, ufrn, unidade, Unidade, acadêmica, Acadêmica, academica, Academica, ciências, Ciências, ciencias, Ciencias, agrárias, Agrárias, agrarias, Agrarias, Portal, portal, Ouvidoria, ouvidoria, OuvEAJ, ouveaj.">
    <meta name="description" content="Portal de Ouvidoria da Escola Agrícola de Jundiaí - EAJ | UFRN">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/elementos.css">
	<link rel="stylesheet" type="text/css" href="icomoon/style.css">
</head>
<body>
	<?php if(logado()): ?>
		<?php
			switch ($_POST['tipo']) {
			    case 't1': $_SESSION['tipo'] = 1; $_SESSION['cor'] = "verde"; $_SESSION['img'] = "likea.svg"; $_SESSION['def'] = "Elogio";
			        break;
			   case 't2': $_SESSION['tipo'] = 2; $_SESSION['cor'] = "laranja"; $_SESSION['img'] = "unlikea.svg"; $_SESSION['def'] = "Reclamação";
			        break;
			   case 't3': $_SESSION['tipo'] = 3; $_SESSION['cor'] = "vermelho"; $_SESSION['img'] = "altofalantea.svg"; $_SESSION['def'] = "Denúncia";
			        break;
			   case 't4': $_SESSION['tipo'] = 4; $_SESSION['cor'] = "azulmc"; $_SESSION['img'] = "lampadaa.svg"; $_SESSION['def'] = "Sugestão";
			        break;
			   case 't5': $_SESSION['tipo'] = 5; $_SESSION['cor'] = "roxo"; $_SESSION['img'] = "papela.svg"; $_SESSION['def'] = "Solicitação";
			        break;
			   default: header("location: home.php");
			        break;
			}
		?>
		<div class="all col-12 azuloc consolas f18">
			<header class="topbar text-right col col-12 circo azule">
				<nav class="row">
					<a href="home.php"><img src="img/logo.png" class="logo" title="Ouvidoria EAJ - UFRN" alt="Portal de Ouvidoria"></a>
					<form action="pesquisa.php" class="col col-4 search-box transparente">
						<input type="search" name="search" class="transparente search-inp inp big-ib col col-12" placeholder="Pesquisar Manifestações...">
						<button type="submit" class="icon-search search-btn col col-2 btn right fcinza f20 transparente"></button>
					</form>
					<ul class="nav col col-5 right">
					    <li class="skp-2 col center col-4">
					    	<a href="sobre.php" class="circo fbranco l rad-5">Ouvidoria</a>
					    </li>
					    <li class="col center col-4">
					    	<a onclick="tipo(event);" class="circo fbranco l rad-5 pointer">Manifeste-se</a>
					    </li>
					    <li class="col center col-2 azulme menu-icon right">
					    	<a onclick="menu(event);" class="f20 fbranco rad-5 pointer icon-menu"></a>
					    </li>
					</ul>
				</nav>
			</header>

			<div>
				<section class="row">
					<section class="container-main col-12 row col">
						<div class="col col-2 row sidebar">
							<div onclick="tipo(event);" class="skp-4 row col center container-circle rad-5 pointer">	
							 	<div class="circle <?php echo $_SESSION['cor']; ?> medium">  						
							     	<img class="icone img col-7" src="img/<?php echo $_SESSION['img']; ?>">
							  	</div>  						      		
							    <p><?php  echo $_SESSION['def'] ?></p>	
							</div>
						</div>

						<div class="container main col-9 col row branco rad-1">
							<div>
								<div class="row col-12 col">
									<h2 class="f20 bottom">Nova Manifestação</h2>
								</div>
								<hr class="hr azule">
							</div>
							<div>
								<div class="forms row col-12">
									<form name="manifesto" action="php/manifestar.php" method="post"  enctype="multipart/form-data">			
										<div class="row col col-5">
											<div class="col col-12 row grups">
												<label>Assunto</label>
												<input class="inp col-12" type="text" name="assunto" placeholder="..." autofocus>
											</div>
											<div class="col-12 row grups">
												<div class="col col-6">
													<label>Setor</label>
													<select class="select col col-12" title="Selecionar Opção" name="setor" required>
														<option value=null disabled selected>---</option>
														<option value="1">Agroindústria</option>
														<option value="2">Agropecuária</option>
														<option value="3">Aquicultura</option>
														<option value="4">Ensino Médio</option>
														<option value="5">Graduação</option>
														<option value="6">Informática</option>
														<option value="7">Internato</option>
													</select>
												</div>
												<div class="col col-6">
													<label>Relevância</label>
													<select class="select col-12" name="relevancia">
														<option value=null>---</option>
														<option value="1">Alta</option>
														<option value="2">Média</option>
														<option value="3">Baixa</option>
													</select>
												</div>					
											</div>
											<hr class="hr azule grups">
											<div class="col col-12 row grups">
												<div class="col col-12">
													<div class="pointer hideinp row col col-12 azule hover rad-5 fbranco center upcase f15">
														<span><span class="icon-attachment"></span> Anexar arquivo</span>
														<input class="hover btn" type="file" name="anexo">
													</div>
												</div>				
											</div>
											<div class="col col-12 row bottom">
												<br>
												<p class="bottom cinzac f12"><span class="icon-info"></span> Sua identificação estará acessível apenas ao ouvidor responsável pelo setor ao qual a manifestação será direcionada</p>
											</div>
											<div class="col col-12 row bottom">
												<p class="bottom">Manifestante: <strong><?php echo $_SESSION['nome']; ?></strong></p>
											</div>
											<div class="col col-12 row bottom">
												<p class="bottom">Matrícula: <strong><?php echo $_SESSION['matricula']; ?></strong></p>
											</div>
											<div class="col col-12 row bottom">
												<p class="bottom">E-mail: <strong><?php echo $_SESSION['email']; ?></strong></p>
											</div>
										</div>

										<div class="row col col-7">
											<div class="col col-12 row bottom">
												<textarea class="inp col col-12 text-area" type="text" name="corpo" placeholder="Insira sua manifestação..." required></textarea>
											</div>
											<div class="col col-5 right row">
												<button class="btn hover col col-12 verde fbranco upcase rad-5" type="submit">Submeter</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</section>

					<div class="modal azuloe row col-12">
						<div class="tipo row skp-3">
							<form name="tipomanifesto" action="nova-manifestacao.php" method="post">
								<button name="tipo" value="t1" type="submit" class="transparente btn f18 consolas">
									<div class="col center container-circle rad-5 pointer">	
							 			<div class="circle verde medium">  						
							      			<img src="img/likea.svg" class="icone img col-7" title="Elogio" alt="Elogio">
							  			</div>  		
							    		<p class="fbranco">Elogio</p>	
									</div>
								</button>

								<button name="tipo" value="t2" type="submit" class="transparente btn f18 consolas">
									<div class="col skp-3 center container-circle rad-5 pointer">	
							 			<div class="circle laranja medium">  						
							      			<img src="img/unlikea.svg" class="icone img col-7" title="Reclamação" alt="Reclamação">
							  			</div>  						      		
							    		<p class="fbranco">Reclamação</p>	
									</div>
								</button>

								<button name="tipo" value="t3" type="submit" class="transparente btn f18 consolas">
									<div class="col skp-5 center container-circle rad-5 pointer">	
							 			<div class="circle vermelho medium">  						
							      			<img src="img/altofalantea.svg" class="icone img col-7" title="Denúncia" alt="Denúncia">
							  			</div>  						      		
							    		<p class="fbranco">Denúncia</p>	
									</div>
								</button>

								<button name="tipo" value="t4" type="submit" class="transparente btn f18 consolas">
									<div class="col skp-7 center container-circle rad-5 pointer">	
							 			<div class="circle azulmc medium">  						
							      			<img src="img/lampadaa.svg" class="icone img col-7" title="Sugestão" alt="Sugestão">
							  			</div>  						      		
							    		<p class="fbranco">Sugestão</p>	
									</div>
								</button>

								<button name="tipo" value="t5" type="submit" class="transparente btn f18 consolas">
									<div class="col skp-9 center container-circle rad-5 pointer">	
							 			<div class="circle roxo medium">  						
							      			<img src="img/papela.svg" class="icone img col-7" alt="Solicitação">
							  			</div>  						      		
							    		<p class="fbranco">Solicitação</p>	
									</div>
								</button>
							</form>
						</div>

						<div class="menu col-5 azulme col row">
							<div class="row grups container-perfil">
								<figure class="circle overhide cinzac col skp-3 foto-perfil medium">
									<?php if (isset($_SESSION['perfil'])) : ?>
										<img src="<?php  echo $_SESSION['perfil'];?>" alt="Perfil" class="img col-12">	
									<?php else: ?>
										<img src="img/userg.svg" alt="Perfil" class="img col-12">
									<?php endif; ?>									
								</figure>
							</div>
							<div class="row grups">
								<div class="row">
									<label class="fbranco bottom col row col-6 skp-1 center" type="text"><?php echo $_SESSION['nome']; ?></label>
								</div>
								<div class="row">
									<label class="fbranco grups col row col-6 skp-1 center" type="text"><?php echo $_SESSION['matricula']; ?></label>
								</div>
							</div>
							<nav class="row grups container col-6 skp-1 rad-1 transparente">
								<div class="row">
									<a href="home.php" class="fbranco l3">Manifestações<span class="icon-bubbles"></span></a>
								</div>
								<div class="row">
									<a href="estatisticas.php" class="fbranco l3">Estatísticas<span class="icon-stats-bars"></span></a>
								</div>
								<?php if(administrador()): ?>
									<div class="row">
										<a href="feedbacks.php" class="fbranco l3">Feedbacks<span class="icon-warning"></span></a>
									</div>
									<div class="row">
										<a href="usuarios.php" class="fbranco l3">Usuários<span class="icon-users"></span></a>
									</div>
								<?php endif; ?>
								<div class="row">
									<a href="explorar.php" class="fbranco l3">Explorar<span class="icon-earth"></span></a>
								</div>
								<div class="row">
									<a href="conta.php" class="fbranco l3">Conta<span class="icon-user"></span></a>
								</div>
								<div class="row">
									<a href="php/logout.php" class="fbranco l3">Sair<span class="icon-switch"></span></a>
								</div>
							</nav>				
						</div>		
					</div>		
				</section>
			</div>

			<footer class="row azulc f12">	
				<section class="fbranco row col-12 footer">					
					<div class="col col-4">
						<p class="row">
							RN 160 - Km 03 - Distrito de Jundiaí - Macaíba<br>
							CEP: 59280-000 | Cx Postal 07				  <br>
							Fone: +55 (84) 3342-4800
						</p>
						<div class="row col-10 top">
							<a href="http://www.eaj.ufrn.br/site/" target="_blank">
								<div class="branco col-2 col rad-5 circle overhide	">
									<img class="row col-11 skp-1 img" src="img/logoeaj.png" alt="Escola Agrícola de Jundiaí - EAJ" title="Escola Agrícola de Jundiaí - EAJ">
								</div>
							</a>
							<a href="http://www.ufrn.br/" target="_blank">
								<div class="branco skp-1 col-2 col rad-5 circle overhide">
									<img class="row col-12 rad-5 img" src="img/logoufrn.png" alt="Universidade Federal do Rio Grande do Norte - UFRN" title="Universidade Federal do Rio Grande do Norte - UFRN">
								</div>
							</a>						
						</div>
					</div>

					<div class="col col-4 center f15">
						<?php if(logado()): ?>
							<p>Navegação</p>
							<nav class="row grups container col-6 rad-1 transparente">
								<ul>
									<li class="row">
										<a href="home.php" class="fbranco l3">Manifestações<span class="icon-bubbles"></span></a>
									</li>
									<li class="row">
										<a href="estatisticas.php" class="fbranco l3">Estatísticas<span class="icon-stats-bars"></span></a>
									</li>
									<li class="row">
										<a href="explorar.php" class="fbranco l3">Explorar<span class="icon-earth"></span></a>
									</li>
									<li class="row">
										<a href="conta.php" class="fbranco l3">Conta<span class="icon-user"></span></a>
									</li>
								</ul>
							</nav>
						<?php else: ?>
							<a href="index.php" class="fbranco l2 f15"><p>Entre ou Cadastre-se</p></a>
						<?php endif; ?>	
					</div>

					<div class="col col-4">
						<form action="php/reportar.php" method="post">
							<div class="grups row">
								<input class="inp col col-12" type="email" name="emailfeedback" maxlength="20" placeholder="E-mail" required>
							</div>
							<div class="grups row">
								<textarea class="inp col col-12 text-area foo-textarea" type="text" name="feedback" placeholder="Feedback" required></textarea>
							</div>
							<div class="grups row">
								<button type="submit" class="btn hover col col-12 azule fbranco upcase upcase f12">Reportar ao administrador</button>
							</div>
						</form>
					</div>
				</section>	

				<div class="row preto fbranco">
					<p>Desenvolvido por Lucas Miguel</p>
				</div>
			</footer>
		</div>
	<?php else: ?>
		<?php echo "<script>
				setTimeout(home, 1300); 
				function home(){
					location.href='index.php'; 
				}
		</script>"; ?>
		<div class="all col-12 azulme consolas f20 row fbranco">
		<br><br><br><br><br><br><br><br><br><br><br>
			<div class="row col col-8 skp-2 center">
				<h2>Por favor, primeiro inicie a seção</h2>
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
		<script src="js/load.js"></script>
	<?php endif; ?>
</body>
	<script src="js/home.js"></script>
</html>