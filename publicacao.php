<?php

	include('./painel/pages/cls_processando.php');

	$rs = new processando;

	$row = $rs->Publicado_mensagem();

	//echo $row->mensagem;

?>