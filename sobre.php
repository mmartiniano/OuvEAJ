<?php
	session_start();

	include 'php/init.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<link rel="icon" href="img/ico.png">
	<title>A Ouvidoria | OuvEAJ</title>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="eaj, EAJ, escola, Escola, Agrícola, agrícola, agricola, Agricola, Jundiaí, Jundiai, jundiaí, jundiai, UFRN, ufrn, unidade, Unidade, acadêmica, Acadêmica, academica, Academica, ciências, Ciências, ciencias, Ciencias, agrárias, Agrárias, agrarias, Agrarias, Portal, portal, Ouvidoria, ouvidoria, OuvEAJ, ouveaj.">
    <meta name="description" content="Portal de Ouvidoria da Escola Agrícola de Jundiaí - EAJ | UFRN">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/elementos.css">
	<link rel="stylesheet" type="text/css" href="icomoon/style.css">
</head>
<body>
	<div class="all col-12 consolas f18">
		<header class="topbar text-right col col-12 circo azule">
			<nav class="row">
				<a href="index.php"><img src="img/logo.png" class="logo" title="Ouvidoria EAJ - UFRN" alt="Portal de Ouvidoria"></a>
				<?php if(logado()): ?>
					<form action="pesquisa.php" class="col col-4 search-box transparente">
						<input type="search" name="search" class="transparente search-inp inp big-ib col col-12" placeholder="Pesquisar Manifestações...">
						<button type="submit" class="icon-search search-btn col col-2 btn right fcinza f20 transparente"></button>
					</form>
				<?php endif; ?>
				<ul class="nav col col-5 right">
				    <li class="skp-2 col center col-4">
				    	<a href="#" class="circo fbranco l rad-5">Ouvidoria</a>
				    </li>
				    <?php if(logado()): ?>
					    <li class="col center col-4">
					    	<a onclick="tipo(event);" class="circo fbranco l rad-5 pointer">Manifeste-se</a>
					    </li>
					    <li class="col center col-2 azulme menu-icon right">
					    	<a onclick="menu(event);" class="f20 fbranco rad-5 pointer icon-menu"></a>
					    </li>
					<?php else: ?>
						 <li class="col center col-6">
					    	<a href="index.php" class="circo fbranco l rad-5 pointer">Entre ou Cadastre-se</a>
					    </li>
					<?php endif; ?>
				</ul>
			</nav>
		</header>

		<div class="all">
			<section class="row">
				<div class="row col-12 azuloe all">					
					<section class="col col-4 skp-4 top">
						<a href="index.php"><img src="img/logo.png" class="img col-6 skp-3" title="OuvEAJ" alt="OuvEAJ"></a>
						<div class="row">
							<div class="col-12 row center grups">
								<p class="row col col-12 fbranco upcase f17">Portal de Ouvidoria da Escola Agrícola de Jundiaí</p>
							</div>
							<div class="row">
								<div class="col-12 row center grups">
									<div class="col-12 row grups">
										<p class="row col col-12 fbranco f18">EAJ | UFRN</p>
									</div>
								</div>
							</div>
							<div class="row center">
								<span class="col-1 circle small verde"></span>
								<span class="col-1 circle small laranja"></span>
								<span class="col-1 circle small vermelho"></span>
								<span class="col-1 circle small azulmc"></span>
								<span class="col-1 circle small roxo"></span>
							</div>
							<div class="col-12 row center grups top">
								<p class="row col col-12 fbranco f18 upcase">Conheça o Sistema</p>
							</div>
							<div class="col-12 row center grups f35 fbranco down">
								<p class="icon-circle-down"></p>
								<br>
							</div>
						</div>
					</section>
				</div>

				<div class="row col-12 verde all">					
					<section class="row col col-12 top fbranco">
						<div class="row grups">
							<div class="col-6 col grups skp-1">
								<p class="row col col-12 f20 lh justify">
									Este projeto tem como intuito tornar mais prátrico e acessível o pronunciamento dos alunos e servidores da Escola Agrícola de Jundiaí, de modo que possam participar comunitariamente em seu processo de desenvolvimento. Sendo este portal um canal aberto de interlocução entre a comunidade acadêmica e a administração de cada setor na figura do coordenador.

								</p>
							</div>
							<div class="col-4 col grups">
								<img src="img/comunicacao.png" class="img col-12">
							</div>
						</div>
						<div class="row">
							<div class="col-12 row center grups f35 down">
								<p class="icon-circle-down"></p>
							</div>
						</div>			
					</section>
				</div>

				<div class="row col-12 laranja all">					
					<section class="row col col-12 top fbranco">
						<div class="row">
							<p class="center coo col-12 f35">Manifeste-se</p>
						</div>
						<div class="row grups">
							<p class="center coo col-12 f20">Exponha suas opniões e interesses. Colabore com o avanço da escola</p>
						</div>
						<div class="row grups">
							<div class="row col col-8 skp-3">
								<img src="img/likea.svg" alt="Elogio" class="col col-2 img">
								<img src="img/unlikea.svg" alt="reclamação" class="col col-2 img">
								<img src="img/altofalantea.svg" alt="Denúncia" class="col col-2 img">
								<img src="img/lampadaa.svg" alt="Sugestão" class="col col-2 img">
								<img src="img/papela.svg" alt="Solicitação" class="col col-2 img">
							</div>
						</div>
						<div class="row">		
							<div class="col-12 row center grups f35 fbranco down">
								<p class="icon-circle-down"></p>
							</div>
						</div>			
					</section>
				</div>

				<div class="row col-12 vermelho all">					
					<section class="row col col-12 top fbranco">
						<div class="row grups">
							<div class="col-6 col grups skp-1">
								<p class="row col col-12 f20 lh">
									As manifestações submetidas são redirecionadas ao ouvidor respectivo do setor alvo escolhido. Aguardarão até que sejam vizualidas e respondidas pelo coordenador
								</p>
							</div>
							<div class="col-4 col grups">
								<img src="img/setores.png" class="img col-12">
							</div>
						</div>
						<div class="row">
							<div class="col-12 row center grups f35 down">
								<p class="icon-circle-down"></p>
							</div>
						</div>			
					</section>
				</div>

				<div class="row col-12 azulmc all">					
					<section class="row col col-12 top fbranco">
						<div class="row grups">
							<div class="col-6 col grups skp-1">
								<p class="row col col-12 f20 lh justify">
									 &nbsp; Acompanhe suas manifestações, explore os enunciados submetidos a outros setores. Veja quais reivindicações já foram resolvidas e verifique estatísticas quantos aos manifestos enviados
								</p>
							</div>
							<div class="col-4 col grups">
								<img src="img/earth.svg" class="col col-5 skp-2 img">
								<img src="img/stats-bars.svg" class="col col-5 img">
							</div>
						</div>	
					</section>
				</div>

				<?php if(logado()) :?>
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
				<?php endif; ?>
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

</body>
	<script src="js/home.js"></script>
</html>