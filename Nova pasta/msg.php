<?php

require_once("pages/cls_processando.php");

$rs = new processando;

$row = $rs->Publicado_mensagem();

//$data = array('msg' => $row);
echo json_encode($row);


$output = shell_exec('set COMPUTERNAME');
$name_pc = explode('=', $output);
echo "<pre>Nome do servidor: ". $name_pc[1]."</pre>";
echo "<pre>saida: ".utf8_decode($output)."</pre>";
$cmd = 'php chat-server.php';
echo "<pre>".shell_exec($cmd)."</pre>";