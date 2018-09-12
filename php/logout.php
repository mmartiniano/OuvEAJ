<?php 

 
// inicia a sessão
session_start();
 

// finaliza a sessão
session_destroy();
 
// retorna para a index.php
header('Location: ../index.php');
 ?>