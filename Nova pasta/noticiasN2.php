<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html lang="pt-br" >
 <head>
   <title>Notícias Empresa Fácil</title>
   <link rel="stylesheet" type="text/css" href="stilo.css" />
</head>
<body >

 <?php
       require_once('nusoap/lib/nusoap.php'); 
	   include ("global/libdb.php");
       if (empty($_GET["CNPJ"]))
       {
         $CNPJ = "99999999999999";
       }
       else
         $CNPJ = $_GET["CNPJ"];

       if (empty($_GET["USER"]))
         $User = "null";
        else
        {
         $User = $_GET["USER"];
         $User = "'$User'";
        }
       if (empty($_GET["VERSAO"]))
         $Versao = "null";
        else
        {
         $Versao = $_GET["VERSAO"];
         $Versao = "'$Versao'";
        }

      if (empty($_GET["NOME"]))
         $NomeUsuario = "null";
        else
        {
         $NomeUsuario = $_GET["NOME"];
         $NomeUsuario ="'$NomeUsuario'";
        }

	    if (empty($_GET["EDICAO"]))
         $Edicao = "null";
        else
        {
         $Edicao = $_GET["EDICAO"];
         //$Edicao ="'$Edicao'";
        }

        if (empty($_GET["SUPORTE"]))
	      $Suporte = false;
	  else
	     {
	        $Suporte = true;
	     }
         try
		  {
	   
			  
			  if ($Suporte == false)
			   {
			   $ws = "http://www.empresafacil.com.br/php/SetVersao.php";	
	           	   $client = new nusoap_client($ws);
	           	   $imput = array("CNPJ" =>$CNPJ,"Versao" => $_GET["VERSAO"]);	 
	               $Resposta = $client->call("SetVersao",$imput);
			  } 
      
			  $User2  = str_replace("'",'',$User);
			  $Edicao = str_replace("'",'',$Edicao);
			  $Versao = str_replace("'",'',$Versao);

			  
			  $server = $_SERVER['SERVER_NAME'];
			  $endereco = $_SERVER ['REQUEST_URI'];
			  $endereco = "http://" . $server . $endereco;

			 /*if ($_GET["VERSAO"] < "3.1"){ 
          			if ($_GET["EDICAO"] == "M"){ 
					include('msgatu31.html');}
			  	else if ($_GET["EDICAO"] == "P"){
					include('msgatu31.html');}
			  	else if ($_GET["EDICAO"] == "N"){
					include('msgatu31.html');}
          
          	 }
             */
          include('publicacao.php');
          
          }
         catch (Exception $e)
         {
          // GravaLog($ACNPJ,$e->getMessage(),$User);
		   echo 'Ocorreu um erro ao carregar as notícias: ',  $e->getMessage(), "\n";
         }
		 
		 

      ?>
 </p>

 </body>

</html>