<?php
// Abre o arquivo para leitura e escrita
$f = fopen("arquivoteste.txt", "rw+");

if (isset($_POST['noticia']) && $_POST['noticia'] != ''){
$noticia = $_POST['noticia'];
// Escreve no arquivo
fwrite($f, $noticia);
}
// Lê o conteúdo do arquivo
$content = file_get_contents("arquivoteste.txt");
// Libera o arquivo
fclose($f);


// Abre o arquivo para leitura e escrita
$g = fopen("noticiateste.txt", "r");
// Lê o conteúdo do arquivo
$content1 = file_get_contents("noticiateste.txt");
// Libera o arquivo
fclose($g);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html lang="pt-br" >
 <head>
   <title>Notícias Empresa Fácil</title>
  <!-- <link rel="stylesheet" type="text/css" href="estilo.css" /> -->
   <meta http-equiv='refresh' content='1800'>
</head>
<body >
<!-- <img src="img/cabecalhoNATAL2.png" width="350" > -->
<br/>

<?php

################################### SEM CENTRAL COM VONO   #############################################

if($content == '1'){

echo '
<p>
Prezados Clientes,<br/><br/>

Em função de problemas técnicos junto a operadora de telefonia, nossa central telefonica <font color="red" size="4"><strong>(21 2406-9644)</strong></font> se encontra instável.
<strong><h5>
CASO HAJA ALGUMA DIFICULDADE EM NOS CONTATAR PELO NR. <font color="red" size="4">(21) 2406-9644</font>, FAVOR TENTAR AS SEGUINTES OPÇÕES:
</strong></h5>

Caso necessitem de suporte <strong>URGENTE</strong>,
favor enviar email para <font color="red"><a href="mailto:suporte@empresafacil.com.br">suporte@empresafacil.com.br</a></font>, 
que entraremos em contato o mais rápido possível.

<strong><h5>
NÚMERO DE CONTINGÊNCIA: <font color="red" size="4">(21) 4063-8811</font> ( ATENÇÃO! Esse número só entra em operação em caso de pane do recurso principal )
</h5></strong>

Os telefones: <br/><strong>
(21) 3309-3335, (21) 3439-6037, (21) 2401-3212, <br/>
(21) 2401-7563, (21) 99700-1453, (21) 99700-1850, (21) 98450-0072</strong>
<br/> também estão disponíveis para contato. 
<br/><br/>
Estamos também disponibilizando os contatos do SKYPE de nossos técnicos para suporte:<br/><br/>
<font color="red">
adriana@empresafacil.com.br<br/>
amanda@empresafacil.com.br<br/> 
carlos@empresafacil.com.br<br/>
evanildo@empresafacil.com.br<br/>
goncalves@empresafacil.com.br<br/>
ilber@empresafacil.com.br<br/>
kamilla@empresafacil.com.br<br/>
melquisedeque@empresafacil.com.br<br/>
roberto@empresafacil.com.br<br/>
rodrigo@empresafacil.com.br<br/>
alexandre@empresafacil.com.br<br/>
alex@empresafacil.com.br<br/>
felipe@empresafacil.com.br<br/>
vilar@empresafacil.com.br<br/>
leandro@empresafacil.com.br<br/>

</font>
<br/>

Aguardamos uma breve solução, e pedimos desculpas pelo transtorno.<br/><br/>
Atenciosamente,<br/><br/>
Equipe Empresa Fácil<br/>
</p>';

}


################################### SEM CENTRAL COM Mobex   #############################################

if($content == '2'){

echo '
<p>
Prezados Clientes,<br/><br/>

Em função de problemas técnicos junto a operadora de telefonia, nossa central telefonica <font color="red" size="4"><strong>(21 2406-9644)</strong></font> se encontra instável.
<strong><h5>
CASO HAJA ALGUMA DIFICULDADE EM NOS CONTATAR PELO NR. <font color="red" size="4">(21) 2406-9644</font>, FAVOR TENTAR AS SEGUINTES OPÇÕES:
</strong></h5>

Caso necessitem de suporte <strong>URGENTE</strong>,
favor enviar email para <font color="red"><a href="mailto:suporte@empresafacil.com.br">suporte@empresafacil.com.br</a></font>, 
que entraremos em contato o mais rápido possível.

<strong><h5>
NÚMERO DE CONTINGÊNCIA: <font color="red" size="4">(21) 4063-6434</font> ( ATENÇÃO! Esse número só entra em operação em caso de pane do recurso principal )
</h5></strong>

Os telefones: <br/><strong>
(21) 3309-3335, (21) 3439-6037, (21) 2401-3212, <br/>
(21) 2401-7563, (21) 99700-1453, (21) 99700-1850, (21) 98450-0072</strong>
<br/> também estão disponíveis para contato. 
<br/><br/>
Estamos também disponibilizando os contatos do SKYPE de nossos técnicos para suporte:<br/><br/>
<font color="red">
adriana@empresafacil.com.br<br/>
amanda@empresafacil.com.br<br/>
carlos@empresafacil.com.br<br/>
evanildo@empresafacil.com.br<br/>
goncalves@empresafacil.com.br<br/>
ilber@empresafacil.com.br<br/>
kamilla@empresafacil.com.br<br/>
melquisedeque@empresafacil.com.br<br/>
roberto@empresafacil.com.br<br/>
rodrigo@empresafacil.com.br<br/>
alexandre@empresafacil.com.br<br/>
alex@empresafacil.com.br<br/>
felipe@empresafacil.com.br<br/>
vilar@empresafacil.com.br<br/>
leandro@empresafacil.com.br<br/>

</font>
<br/>

Aguardamos uma breve solução, e pedimos desculpas pelo transtorno.<br/><br/>
Atenciosamente,<br/><br/>
Equipe Empresa Fácil<br/>
</p>';

}


################################### CENTRAL NORMALIZADA   #############################################


if($content == '3'){

echo 'Prezados Clientes,</br></br>

A central de atendimento <strong>(21) 2406-9644</strong> foi regularizada pela operadora de telefonia.</br></br>

O número de contingência será desativado.</br></br>

Atenciosamente,</br></br>

Equipe Empresa Fácil
';

}


################################### CENTRAL NORMALIZADA   #############################################


if($content == '4'){

echo '
Prezados Clientes e Parceiros,</br></br>
 
Comunicamos que no dia <font color="red" size="4">04/07/2014</font>, por conta do feriado na cidade do Rio de Janeiro e do jogo da seleção brasileira, nosso expediente excepcionalmente será das <font color="red" size="4">08:00h</font> às <font color="red" size="4">14:00h</font>.</br></br>


Atenciosamente,</br></br>
 
Equipe Empresa Fácil';

}
################################### MENSAGEM PERSONALIZADA   #############################################
if($content == '5'){

echo $content1;

}


?>


 </body>

</html>