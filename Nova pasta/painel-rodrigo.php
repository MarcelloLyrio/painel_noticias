<!DOCTYPE html>
<html>
  <head>
    <title>Editor de textos TinyMCE</title>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
    <script type="text/javascript" src="./tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
        selector: "textarea#elm1",
        theme: "modern",
        width: 400,
        height: 160,
        plugins: [
             "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
             "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
             "save table contextmenu directionality emoticons template paste textcolor"
       ],
       content_css: "css/content.css",
       toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
       style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
     }); 
    </script>
  </head>
  <body>
<center>
  <table cellspacing="20" cellpadding="6">
  <tr><td valign="top">
<h2>PAINEL DE NOTICIAS</h2>
Opções:
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
// Lê o conteúdo do arquivo
$content1 = file_get_contents("noticiateste.txt");
?>

<form method="post" action="#">
<input type="radio" name="noticia" value="0" <?php if($content == 0) echo "checked"; ?> > Sem mensagem!<br/>
<input type="radio" name="noticia" value="1" <?php if($content == 1) echo "checked"; ?> > Problema na central com Vono <br/>
<input type="radio" name="noticia" value="2" <?php if($content == 2) echo "checked"; ?> > Problema na central com Mobex <br/>
<input type="radio" name="noticia" value="3" <?php if($content == 3) echo "checked"; ?> > Central Normalizada<br/>
<input type="radio" name="noticia" value="4" <?php if($content == 4) echo "checked"; ?> > Mensagem dia 04<br/><br/>
 <input type="radio" name="noticia" value="5" <?php if($content == 5) echo "checked"; ?> >Outras mensagens:<br/>
<textarea id="elm1" name="noticia1"><?php echo $content1; ?></textarea>
<input type="submit" name="enviar" value="Enviar">
</form>
<h5>Painel de Notícias - V 1.3 - .:: Digão ::.</h5>
</td><td valign="top" width="340">
<?php

// Libera o arquivo
fclose($f);

################################### SEM CENTRAL COM VONO   #############################################

if($content == '1'){

rename("noticias_rodrigo.php", "noticias.php");


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
(21) 2401-7563, (21) 99700-1537, (21) 99700-1572</strong>
<br/> também estão disponíveis para contato. 
<br/><br/>
Estamos também disponibilizando os contatos do SKYPE de nossos técnicos para suporte:<br/><br/>
<font color="red">
adriana@empresafacil.com.br<br/> 
alexandre@empresafacil.com.br<br/>
amanda@empresafacil.com.br<br/> 
carlos@empresafacil.com.br<br/>
claudio@empresafacil.com.br<br/>
evanildo@empresafacil.com.br<br/>
goncalves@empresafacil.com.br<br/>
ilber@empresafacil.com.br<br/>
kamilla@empresafacil.com.br<br/>
leandro@empresafacil.com.br<br/>
macedo@empresafacil.com.br<br/>
felipe@empresafacil.com.br<br/>
moises@empresafacil.com.br<br/>
paulo@empresafacil.com.br<br/>
pinheiro@empresafacil.com.br<br/>
rodrigo@empresafacil.com.br<br/>
thiago@empresafacil.com.br<br/>
</font>
<br/>

Aguardamos uma breve solução, e pedimos desculpas pelo transtorno.<br/><br/>
Atenciosamente,<br/><br/>
Equipe Empresa Fácil<br/>
</p>';

}


################################### SEM CENTRAL COM Mobex   #############################################

if($content == '2'){

rename("noticias_rodrigo.php", "noticias.php");


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
(21) 2401-7563, (21) (21) 99700-1537, (21) 99700-1572</strong>
<br/> também estão disponíveis para contato. 
<br/><br/>
Estamos também disponibilizando os contatos do SKYPE de nossos técnicos para suporte:<br/><br/>
<font color="red">
adriana@empresafacil.com.br<br/> 
alexandre@empresafacil.com.br<br/>
amanda@empresafacil.com.br<br/> 
carlos@empresafacil.com.br<br/>
claudio@empresafacil.com.br<br/>
evanildo@empresafacil.com.br<br/>
goncalves@empresafacil.com.br<br/>
ilber@empresafacil.com.br<br/>
kamilla@empresafacil.com.br<br/>
leandro@empresafacil.com.br<br/>
macedo@empresafacil.com.br<br/>
felipe@empresafacil.com.br<br/>
moises@empresafacil.com.br<br/>
paulo@empresafacil.com.br<br/>
pinheiro@empresafacil.com.br<br/>
rodrigo@empresafacil.com.br<br/>
thiago@empresafacil.com.br<br/>
</font>
<br/>

Aguardamos uma breve solução, e pedimos desculpas pelo transtorno.<br/><br/>
Atenciosamente,<br/><br/>
Equipe Empresa Fácil<br/>
</p>';

}


################################### CENTRAL NORMALIZADA   #############################################


if($content == '3'){

rename("noticias_rodrigo.php", "noticias.php");

echo 'Prezados Clientes,</br></br>

A central de atendimento <strong>(21) 2406-9644</strong> foi regularizada pela operadora de telefonia.</br></br>

O número de contingência será desativado.</br></br>

Atenciosamente,</br></br>

Equipe Empresa Fácil
';

}

################################### OUTRAS MENSAGENS   #############################################


if($content == '4'){

rename("noticias_rodrigo.php", "noticias.php");

echo 'Prezados Clientes e Parceiros,</br></br>

 
Comunicamos que no dia <font color="red" size="4">04/07/2014</font>, por conta do feriado na cidade do Rio de Janeiro e do jogo da seleção brasileira, nosso expediente excepcionalmente será das <font color="red" size="4">08:00h</font> às <font color="red" size="4">14:00h</font>.</br></br>


Atenciosamente,</br></br>
 
Equipe Empresa Fácil';

}



if($content == '5'){
	
################################ GRAVA E LE MENSAGENS PERSONALIZADAS ################

// Abre o arquivo para leitura e escrita
$f = fopen("noticiateste.txt", "w");
if (isset($_POST['noticia1']) && $_POST['noticia1'] != '' && $_POST['noticia'] == '5'){
$noticia1 = $_POST['noticia1'];
// Escreve no arquivo
fwrite($f, $noticia1);
}


// Lê o conteúdo do arquivo
$content1 = file_get_contents("noticiateste.txt");


// Libera o arquivo
fclose($f);



	if (file_exists("/home/storage/6/fc/2e/empresafacil/public_html/php/noticias.php")) {

    		echo $content1;

	} else {

		rename("noticias_rodrigo.php", "noticias.php");
		echo $content1;


} 


}

if($content == '0'){

rename("noticias.php", "noticias_rodrigo.php");

}

?>

</td></tr>
</table>
</center>
  </body>
</html>