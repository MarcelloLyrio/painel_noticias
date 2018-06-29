 <img src="images/cabecalho.png" width="350" height="100">
<?php
require_once("../painel/pages/cls_processando.php");
		
	$rs = new processando;

	$row = $rs->Publicado_mensagem();

	echo '</br>'.getcwd();
	
	$navegador = $_SERVER['HTTP_USER_AGENT'];

	echo "O navegador usado é ".$navegador;


?>
 </body>
