<?php
	session_start();

	include 'php/init.php';	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<link rel="icon" href="img/ico.png">
	<title>Estatísticas | OuvEAJ</title>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="eaj, EAJ, escola, Escola, Agrícola, agrícola, agricola, Agricola, Jundiaí, Jundiai, jundiaí, jundiai, UFRN, ufrn, unidade, Unidade, acadêmica, Acadêmica, academica, Academica, ciências, Ciências, ciencias, Ciencias, agrárias, Agrárias, agrarias, Agrarias, Portal, portal, Ouvidoria, ouvidoria, OuvEAJ, ouveaj.">
    <meta name="description" content="Portal de Ouvidoria da Escola Agrícola de Jundiaí - EAJ | UFRN">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/elementos.css">
	<link rel="stylesheet" type="text/css" href="icomoon/style.css">
</head>
<body>
	<?php if(logado()): ?>
		<?php if(contabilizado()){
				 switch ($_SESSION['setore']) {
				    case '1': $_SESSION['setore'] = 1; $_SESSION['core'] = "laranja"; $_SESSION['imge'] = "cog.svg"; $_SESSION{'defe'} = "Agroindústria";
				        break;
				   case '2': $_SESSION['setore'] = 2; $_SESSION['core'] = "verde"; $_SESSION['imge'] = "leaf.svg"; $_SESSION{'defe'} = "Agropecuária";
				        break;
				   case '3': $_SESSION['setore'] = 3; $_SESSION['core'] = "azulmc"; $_SESSION['imge'] = "droplet.svg"; $_SESSION{'defe'} = "Aquicultura";
				        break;
				   case '4': $_SESSION['setore'] = 4; $_SESSION['core'] = "vermelho"; $_SESSION['imge'] = "book.svg"; $_SESSION{'defe'} = "E. M.";
				        break;
				   case '5': $_SESSION['setore'] = 5; $_SESSION['core'] = "roxo"; $_SESSION['imge'] = "sphere.svg"; $_SESSION{'defe'} = "Graduação";
				        break;
				   case '6': $_SESSION['setore'] = 6; $_SESSION['core'] = "preto"; $_SESSION['imge'] = "embed.svg"; $_SESSION{'defe'} = "Informática";
				        break;
				   case '7': $_SESSION['setore'] = 7; $_SESSION['core'] = "amarelo"; $_SESSION['imge'] = "home.svg"; $_SESSION{'defe'} = "Internato";
				        break;
				   default: $_SESSION['setore'] = 8; $_SESSION['core'] = "branco"; $_SESSION['imge'] = "logoeaj.png"; $_SESSION{'defe'} = "EAJ";
				   		break;
				}
				
				$_SESSION['contabilizado'] = false;
			}else{
				header('Location: php/contabilizar.php');
			} ?>
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
							<div onclick="setor(event);" class="skp-4 row col center container-circle rad-5 pointer">	
							 	<div class="circle <?php echo $_SESSION['core']; ?> medium">  						
							     	<img class="img col-7 icone-circle" src="img/<?php echo $_SESSION['imge']; ?>">
							  	</div>  						      		
							    <p><?php  echo $_SESSION['defe'] ?></p>	
							</div>
						</div>

						<div class="container main col-9 col row branco rad-1">
							<div>
								<div class="row col-12 col">
									<h2 class="f20 bottom">Estatísticas</h2>
								</div>
								<hr class="hr azule bottom">
							</div>

							<div class="row col col-2 f15 contas">
								<br><br><br><br><br>
								<p class="row col col-12 grups">Manifestações: <?php echo $_SESSION['total']; ?></p>
								<p class="row col col-12 grups">Elogios: <?php echo $_SESSION['elogio']; ?></p>
								<p class="row col col-12 grups">Reclamações: <?php echo $_SESSION['reclamacao']; ?></p>
								<p class="row col col-12 grups">Denúncias: <?php echo $_SESSION['denuncia']; ?></p>
								<p class="row col col-12 grups">Sugestões: <?php echo $_SESSION['sugestao']; ?></p>
								<p class="row col col-12 grups">Solicitações: <?php echo $_SESSION['solicitacao']; ?></p>
							</div>

							<div class="row col-12 col">						
								<div class="row col-12">
									<div class="grafico col col-2 row skp-2">
										<div class="bar col-6 skp-3 rad-1 verde" style="height:					
								      			<?php
								      				if($_SESSION['total'] > 0){
								      					echo (($_SESSION['elogio'] * 100)/ $_SESSION['total'])."%";
								      				}else{
								      					echo "0%";
								      				}
								      			?>
								      		">						
										</div>
									</div>
									<div class="grafico col col-2 row">
										<div class="bar col-6 skp-3 rad-1 laranja" style="height:					
								      			<?php
								      				if($_SESSION['total'] > 0){
								      					echo (($_SESSION['reclamacao'] * 100)/ $_SESSION['total'])."%";
								      				}else{
								      					echo "0%";
								      				}
								      			?>
								      		">						
										</div>
									</div>
									<div class="grafico col col-2 row">
										<div class="bar col-6 skp-3 rad-1 vermelho" style="height:					
								      			<?php
								      				if($_SESSION['total'] > 0){
								      					echo (($_SESSION['denuncia'] * 100)/ $_SESSION['total'])."%";
								      				}else{
								      					echo "0%";
								      				}
								      			?>
								      		">						
										</div>
									</div>
									<div class="grafico col col-2 row">
										<div class="bar col-6 skp-3 rad-1 azulmc" style="height:					
								      			<?php
								      				if($_SESSION['total'] > 0){
								      					echo (($_SESSION['sugestao'] * 100)/ $_SESSION['total'])."%";
								      				}else{
								      					echo "0%";
								      				}
								      			?>
								      		">						
										</div>
									</div>
									<div class="grafico col col-2 row">
										<div class="bar col-6 skp-3 rad-1 roxo" style="height:					
								      			<?php
								      				if($_SESSION['total'] > 0){
								      					echo (($_SESSION['solicitacao'] * 100)/ $_SESSION['total'])."%";
								      				}else{
								      					echo "0%";
								      				}
								      			?>
								      		">						
										</div>
									</div>
								</div>

								<hr class="hr col-10 skp-2 azule">

								<div class="row col-12">
									<div class="col col-2 skp-2 center container-circle rad-5">	
							 			<div class="circle skp-2 verde medium">
							 				<p class='fbranco f35 col col-12 icone-circle'>						
								      			<?php
								      				if($_SESSION['total'] > 0){
								      					echo intval((($_SESSION['elogio'] * 100)/ $_SESSION['total']))."%";
								      				}else{
								      					echo "0%";
								      				}
								      			?>
							      			</p>
							  			</div>  		
							    		<p>Elogios</p>	
									</div>

									<div class="col col-2 center container-circle rad-5">	
							 			<div class="circle skp-2 laranja medium">  						
							      			<p class='fbranco f35 col col-12 icone-circle'>					
								      			<?php
								      				if($_SESSION['total'] > 0){
								      					echo intval((($_SESSION['reclamacao'] * 100)/ $_SESSION['total']))."%";
								      				}else{
								      					echo "0%";
								      				}
								      			?>
							      			</p>
							  			</div>  		
							    		<p>Reclamações</p>	
									</div>

									<div class="col col-2 center container-circle rad-5">	
							 			<div class="circle skp-2 vermelho medium">  						
							      			<p class='fbranco f35 col col-12 icone-circle'>						
								      			<?php
								      				if($_SESSION['total'] > 0){
								      					echo intval((($_SESSION['denuncia'] * 100)/ $_SESSION['total']))."%";
								      				}else{
								      					echo "0%";
								      				}
								      			?>
							      			</p>
							  			</div>  		
							    		<p>Denúncias</p>	
									</div>

									<div class="col col-2 center container-circle rad-5">	
							 			<div class="circle skp-2 azulmc medium">  						
							      			<p class='fbranco f35 col col-12 icone-circle'>					
								      			<?php
								      				if($_SESSION['total'] > 0){
								      					echo intval((($_SESSION['sugestao'] * 100)/ $_SESSION['total']))."%";
								      				}else{
								      					echo "0%";
								      				}
								      			?>
							      			</p>
							  			</div>  		
							    		<p>Sugestões</p>	
									</div>

									<div class="col col-2 center container-circle rad-5">	
							 			<div class="circle skp-2 roxo medium">  						
							      			<p class='fbranco f35 col col-12 icone-circle'>						
								      			<?php
								      				if($_SESSION['total'] > 0){
								      					echo intval((($_SESSION['solicitacao'] * 100)/ $_SESSION['total']))."%";
								      				}else{
								      					echo "0%";
								      				}
								      			?>
							      			</p>
							  			</div>  		
							    		<p>Solicitações</p>	
									</div>
								</div>
							</div>							
						</div>
					</section>

					<div class="modal azuloe row col-12">
						<div class="setor row skp-1">
							<form name="setore" action="php/contabilizar.php" method="post">
								<button name="setor" type="submit" class="transparente btn f18 consolas">
									<div class="col center container-circle rad-5 pointer">	
							 			<div class="circle skp-1 branco medium">  						
							      			<img src="img/logoeaj.png" class="img col-7 icone-circle">
							  			</div>  		
							    		<p class="fbranco">EAJ</p>	
									</div>
								</button>

								<button name="setor" value="1" type="submit" class="transparente btn f18 consolas">
									<div class="col skp-2 center container-circle rad-5 pointer">	
							 			<div class="circle skp-1 laranja medium">  						
							      			<img src="img/cog.svg" class="img col-7 icone-circle">
							  			</div>  		
							    		<p class="fbranco">Agroindústria</p>	
									</div>
								</button>

								<button name="setor" value="2" type="submit" class="transparente btn f18 consolas">
									<div class="col skp-3 center container-circle rad-5 pointer">	
							 			<div class="circle skp-1 verde medium">  						
							      			<img src="img/leaf.svg" class="img col-7 icone-circle">
							  			</div>  		
							    		<p class="fbranco">Agropecuária</p>	
									</div>
								</button>

								<button name="setor" value="3" type="submit" class="transparente btn f18 consolas">
									<div class="col skp-4 center container-circle rad-5 pointer">	
							 			<div class="circle skp-1 azulmc medium">  						
							      			<img src="img/droplet.svg" class="img col-7 icone-circle">
							  			</div>  		
							    		<p class="fbranco">Aquicultura</p>
									</div>
								</button>

								<button name="setor" value="4" type="submit" class="transparente btn f18 consolas">
									<div class="col skp-5 center container-circle rad-5 pointer">	
							 			<div class="circle skp-1 vermelho medium">  						
							      			<img src="img/book.svg" class="img col-7 icone-circle">
							  			</div>  		
							    		<p class="fbranco">E. M.</p>
									</div>
								</button>

								<button name="setor" value="5" type="submit" class="transparente btn f18 consolas">
									<div class="col skp-6 center container-circle rad-5 pointer">	
							 			<div class="circle skp-1 roxo medium">  						
							      			<img src="img/sphere.svg" class="img col-7 icone-circle">
							  			</div>  		
							    		<p class="fbranco">Graduação</p>	
									</div>
								</button>

								<button name="setor" value="6" type="submit" class="transparente btn f18 consolas">
									<div class="col skp-7 center container-circle rad-5 pointer">	
							 			<div class="circle skp-1 preto medium">  						
							      			<img src="img/embed.svg" class="img col-8 icone-circle">
							  			</div>  		
							    		<p class="fbranco">Informática</p>		
									</div>
								</button>

								<button name="setor" value="7" type="submit" class="transparente btn f18 consolas">
									<div class="col skp-8 center container-circle rad-5 pointer">	
							 			<div class="circle skp-1 amarelo medium">  						
							      			<img src="img/home.svg" class="img col-7 icone-circle">
							  			</div>  		
							    		<p class="fbranco">Internato</p>
									</div>
								</button>
							</form>
						</div>
						
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