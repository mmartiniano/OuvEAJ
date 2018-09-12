<?php
	session_start();

	require 'php/init.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<link rel="icon" href="img/ico.png">
	<title>Feedbacks | OuvEAJ</title>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="eaj, EAJ, escola, Escola, Agrícola, agrícola, agricola, Agricola, Jundiaí, Jundiai, jundiaí, jundiai, UFRN, ufrn, unidade, Unidade, acadêmica, Acadêmica, academica, Academica, ciências, Ciências, ciencias, Ciencias, agrárias, Agrárias, agrarias, Agrarias, Portal, portal, Ouvidoria, ouvidoria, OuvEAJ, ouveaj.">
	<meta name="description" content="Portal de Ouvidoria da Escola Agrícola de Jundiaí - EAJ | UFRN">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/elementos.css">
	<link rel="stylesheet" type="text/css" href="icomoon/style.css">
</head>
<body>
	<?php if(logado() and administrador()): ?>
		<?php if(!selecionado()){
	 		header("location: php/selecionar.php?x=fb");
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
							<div onclick="menu(event);" class="skp-4 row col center container-circle rad-5 pointer">	
								<div class="circle branco medium overhide foto-perfil">  						
									<?php if (isset($_SESSION['perfil'])) : ?>
										<img src="<?php  echo $_SESSION['perfil'];?>" alt="Perfil" class="img col-12">	
									<?php else: ?>
										<img src="img/userg.svg" alt="Perfil" class="img col-12">
									<?php endif; ?>	
								</div>  						      		
								<p><?php  echo $_SESSION['primeiroNome']; ?></p>	
							</div>
						</div>

						<div class="container main col-9 col row branco rad-1">
							<div>
								<div class="row col-12 col">
									<h2 class="f20 bottom">Feedbacks</h2>
								</div>
								<hr class="hr azule">
							</div>
							<div>
								<div class="row">
									<div class="col col-12 cinzac">
										<?php if(count($_SESSION['feedbacks']) <= 0): ?>
											<div class="f20 center col col-12 show">
												<p class="top">Nenhum feedback submetido</p>
											</div>
										<?php else: ?>
											<div class="row col-12 li azulme fbranco">
												<div class="col col-6">
													<p>E-mail</p>
												</div>
												<div class="col col-6">
													<p>Feedback</p>
												</div>
											</div>

											<ul class="show row col-12 scroll">
												<?php for ($y=(count($_SESSION['feedbacks'])-1); $y >= 0 ; $y--) {
													echo "<li class='row col-12 li'>
															<a href='feedback.php?id=".$_SESSION['feedbacks'][$y]['id']."' class='l2 fpreto'>
																<div class='col col-6'>
																	<p>".$_SESSION['feedbacks'][$y]['email']."</p>
																</div>
																<div class='col col-6'>
																	<p>".$_SESSION['feedbacks'][$y]['feedback']."</p>
																</div>
															</a>
														</li>";
												} ?>
											</ul>
										<?php endif; ?>
									</div>
								</div>
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
						<a href="conta.php">
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
						</a>
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

		<footer class="row azulc f12 consolas">	
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
	<?php $_SESSION['selecionado'] = false; ?>
<?php else: ?>
	<?php echo "<script>
	setTimeout(index, 1300); 
	function index(){
		location.href='index.php'; 
	}
</script>"; ?>
<div class="all col-12 azulme consolas f20 row fbranco">
	<br><br><br><br><br><br><br><br><br><br><br>
	<div class="row col col-8 skp-2 center">
		<?php if(logado() and !administrador()): ?>
			<h2 class="fvermelho">Acesso bloqueado</h2>
		<?php else: ?>
			<h2>Por favor, primeiro inicie a seção</h2>
		<?php endif; ?>
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
<?php endif ?>
</body>
	<script src="js/home.js"></script>
</html>