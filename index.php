<?php
	session_start();

	include 'php/init.php';

	$_FILES['perfil'] = null;
?>
<?php 
	if(logado()){
		header("location:home.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<link rel="icon" href="img/ico.png">
	<title>Entrar | OuvEAJ</title>
    <meta name="description" content="Portal de Ouvidoria da Escola Agrícola de Jundiaí - EAJ | UFRN">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/elementos.css">
	<link rel="stylesheet" type="text/css" href="icomoon/style.css">
</head>
<body>
	<div class="all col-12 azulme consolas f18">

		<div>
			<section class="row">			
				

				<div class="modal azulo row col-12 f20">
					<div class="row">
						<br>
						<div class="col-4 col skp-4 grups text-right row fbranco f18">
							<p class="col skp-5 col-5">Possui uma conta?</p>
							<p class="l2 col col-2 pointer upcase" onclick="index(event, 1)">Entrar</p>
						</div>
					</div>

					<section id="cadastro" class="col col-4 skp-4 container cadastro branco">
						<div>
							<div>
								<h2 class="f20">Cadastre-se</h2>
								<hr class="hr azule">
							</div>
	
							<div class="row col-4 skp-4 grups">
								<span class="stp col col-4 azule" id="stp1"></span>
								<span class="stp col col-4 azulo" id="stp2"></span>
								<span class="stp col col-4 azulo" id="stp3"></span>
							</div>
						</div>
						<div class="f15">
							<form action="php/cadastrar.php" method="post" enctype="multipart/form-data">
								<div id="step1" class="step row">
									<div class="forms col col-11 cinzac row">
										<div class="col row dados-cadastro">
											<div class="grups row">
												<label>Nome</label>
												<input class="inp col-12" type="text" name="nome" maxlength="150" required>
											</div>
											<div class="grups row">
												<label>Matrícula</label>
												<input class="inp col-12" type="text" name="matricula" maxlength="10" required>
											</div>
											<div class="grups row">
												<label>E-mail</label>
												<input class="inp col-12" type="email" name="email" maxlength="100" required>
											</div>
											<div class="grups row">
												<label>Confirmar E-mail</label>
												<input class="inp col-12" type="email" name="email2" maxlength="100" required>
											</div>
											<div class="grups row">
												<div class="col col-5">
													<label>Senha</label>
													<input class="inp col-12" type="password" name="senha" maxlength="16" required>
												</div>
												<div class="col col-5 right">
													<label>Confirmar Senha</label>
													<input class="inp col-12" type="password" name="senha2" maxlength="16" required>
												</div>
											</div>
										</div>
										<div class="row col right col-12">
											<button onclick="cadastro(event, 2);" title="Próximo" class="btn hover small f15 verde col right circle icon-circle-right"></button>
											<button onclick="index(event, 1);" title="Cancelar" class="btn hover small f15 vermelho col circle icon-cancel-circle"></button>
										</div>
									</div>
								</div>

								<div id="step2" class="step row">
									<div class="forms col col-11 cinzac row">
										<div class="col row dados-cadastro">
											<div class="grups row">
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
												<p class="center f12">Alunos devem selecionar o curso técnico que estudam. Funcionários, o setor que atuam</p>
											</div>
											<div class="grups row">
												<label>Gênero</label>
												<select class="select col col-12" name="genero">
													<option value=null disabled selected>---</option>
													<option value="1">Feminino</option>
													<option value="2">Masculino</option>
													<option value="3">Outro</option>
												</select>
											</div>
											<div class="grups row">
												<label>Celular</label>
												<input class="inp col col-12" type="tel" name="celular" maxlength="11">
											</div>
											<div class="grups row">
												<label>Aniversário</label>
												<input class="inp col col-12" type="date" name="aniversario" maxlength="8" required>
											</div>
										</div>
										<div class="row col right col-12">
											<button onclick="cadastro(event, 3);" title="Próximo" class="btn hover small f15 verde col col-1 right circle icon-circle-right"></button>
											<button onclick="cadastro(event, 1);" title="Anterior" class="btn hover small f15 vermelho col col-1 circle icon-circle-left"></button>
										</div>
									</div>
								</div>

								<div id="step3" class="step row">
									<div class="forms col col-11 cinzac row">
										<div class="col row dados-cadastro">
											<figure class="grups row circle overhide col skp-4 foto-perfil big">
												<img name="foto" id="foto" src="img/userg.svg" alt="Perfil" class="img col-12">
											</figure>
											<div class="hideinp row col col-12 azulc rad-5 fbranco center upcase">
												<span><span class="icon-image"></span> Adcionar foto do perfil</span>
												<input class="btn hover pointer" type="file" name="perfil" accept="image/png, image/jpeg" onchange="Previewfoto();" id="perfil">
											</div>
										</div>
										<div class="row col right col-12">
											<button title="Concluir" type="submit" class="btn hover small f15 verde col col-1 right circle icon-user-check"></button>
											<button onclick="cadastro(event, 2);" title="Anterior" class="btn hover small f15 vermelho col col-1 circle icon-circle-left"></button>
										</div>
									</div>
								</div>
							</form>
						</div>						
					</section>
				</div>

				<div class="row col-12">
					<section id="login" class="col col-4 skp-4 login">
						<a href="index.php"><img src="img/logo.png" class="img col-6 skp-3" title="OuvEAJ" alt="OuvEAJ"></a>
						<div class="row">
							<div class="col-12 row center grups">
								<a class="col col-5 fbranco l2 pointer upcase" href="sobre.php">A ouvidoria</a>
								<p class="col col-2 fbranco">|</p>
								<p class="col col-5 fbranco l2 pointer upcase" onclick="index(event, 0); cadastro(event, 1);">Cadastrar-se</p>
							</div>
						</div>
						<form action="php/login.php" method="post">
							<div class="grups row">
								<input class="inp col col-12 big-ib upcase" type="text" name="matricula-login" maxlength="10" placeholder="Matrícula" required autofocus>
							</div>
							<div class="grups row">
								<input class="inp col col-12 big-ib upcase" type="password" name="senha-login" maxlength="16" placeholder="Senha" required>
							</div>
							<div class="grups row">
								<button type="submit" class="btn hover col col-12 f15 big-ib azul fbranco upcase">Entrar</button>
							</div>
						</form>
					</section>
				</div>
			</section>
		</div>
	</div>
</body>
	<script src="js/index.js"></script>
	<script src="js/preview.js"></script>
</html>