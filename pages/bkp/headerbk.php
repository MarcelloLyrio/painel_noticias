<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>Painel de Mensagens - Empresa Fácil</title>


<link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">

    <!-- Bootstrap Core CSS -->

    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    

   



    <!-- MetisMenu CSS -->

    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">



    <!-- Timeline CSS -->

    <link href="../dist/css/timeline.css" rel="stylesheet">



    <!-- Custom CSS -->

    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">



    <!-- Morris Charts CSS -->

    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">



    <!-- Custom Fonts -->

    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


 

    

<script>

function showCustomer(str) {

  var xhttp;    

  if (str == "") {

    document.getElementById("txtHint").innerHTML = "";

    return;

  }

  xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {

    if (xhttp.readyState == 4 && xhttp.status == 200) {

      document.getElementById("txtHint").innerHTML = xhttp.responseText;

    }

  };

  xhttp.open("GET", "visualizar.php?q=visualizar&id="+str, true);

  xhttp.send();

}

</script>

<script>

function showCustomer2(str) {

  var xhttp;    

  if (str == "") {

    document.getElementById("txtHint").innerHTML = "";

    return;

  }

  xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {

    if (xhttp.readyState == 4 && xhttp.status == 200) {

      document.getElementById("txtHint").innerHTML = xhttp.responseText;

    }

  };

  xhttp.open("GET", "visualizar.php?q=visualizar&desabilitar=disabled&ret=retirar&id="+str, true);

  xhttp.send();

}

</script>

<script LANGUAGE="JavaScript">



function validate(){



if (document.form1.usuario.value=="") {

alert("O Campo usuário não está preenchido!")

return false

}

if (document.form1.senha.value=="") {

alert("O Campo Senha não está preenchido!")

return false

}

if (document.form1.senhaconf.value=="") {

alert("O Campo Confirmar Senha não está preenchido!")

return false

}

if(document.form1.senha.value != document.form1.senhaconf.value) {

alert("As senhas são diferentes, verifque!");

return false;

}

return true

}



</script>


</head>



<body>
<?php



	if(isset($_GET['logout']) && $_GET['logout'] == 'logout'){

		

		unset($_SESSION['login']); 

		//unset($_SESSION['senha']); 

			

		session_destroy();

		header('location:login.php'); 

	}

	

	/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não

	fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal 

	do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito

	o login não será criado a session, então ao verificar que a session não existe a página redireciona

	o mesmo para a index.php. */





	

		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { 

			

			unset($_SESSION['login']); 

			unset($_SESSION['senha']); 

			unset($_SESSION['nivel']); 

			header('location:login.php'); 

		} 

		

		$logado = $_SESSION['login'];



?>





    <div id="wrapper">



        <!-- Navegação -->

        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

					<a class="navbar-brand" href="index.php"><img alt="Brand" src="../images/logoef.png"></a></br></br></br></br>



            </div>

            <!-- /.navbar-header -->

            <div class="navbar-top-links navbar-right">

                <center><h1>Painel <small>de noticiais</small></h1></center>

            </div>

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">

                      <!--<a class="dropdown-toggle" href="#" onclick="showCustomer('<?=$row->id_mensagem?>')" data-toggle="modal" data-target=".bs-example-modal-lg">-->

                     

                        <i class="fa fa-envelope fa-fw"></i>

						<?php

						//include("cls_processando.php");

						include("cls_usuario.php");

						if((isset($_POST['publicar'])) && ($_POST['publicar'] == 'publicar') && (isset($_POST['ativado'])) && ($_POST['ativado'] <> '')){

									$res = new processando();

									$res->Publicar_mensagem($_POST['ativado']);

										
						}
									

									$result = new processando();

									$row = $result->Publicado_mensagem();

									if(isset($row->id_mensagem)){

                                        echo "Publicado: <strong> <a href=\"#\" onclick=\"showCustomer2('".$row->id_mensagem."')\" data-toggle=\"modal\" data-target=\".bs-example-modal-lg\">".$row->titulo."</a></strong>   Em: ".$row->data." - ".$row->hora."hs";	

									}else{

										echo "Nenhuma mensagem publicada!";

										}

						?>

					

                    </a>

                    <!-- /.dropdown-messages -->

                </li>

                <!-- /.dropdown -->

                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                       <?=$logado;?>

                    </a>

                    <ul class="dropdown-menu dropdown-user">

                    	<?php

                    	if((isset($_SESSION['nivel'])) && ($_SESSION['nivel'] == 'M')){

							?>

                        <li><a href="cad_user.php"><i class="fa fa-gear fa-fw"></i> Cadastro de Usuarios</a></li>

                       		<?php

                            }

							?>

                        <li class="divider"></li>

                        <li><a href="index.php?logout=logout"><i class="fa fa-sign-out fa-fw"></i> Sair</a>

                        </li>

                    </ul>

                    <!-- /.dropdown-user -->

                </li>

                <!-- /.dropdown -->

            </ul>

            <!-- /.navbar-top-links -->

        </nav>

		

    </div>

    <!-- /#wrapper -->



    <!-- jQuery -->

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>



    <!-- Bootstrap Core JavaScript -->

    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>



    <!-- Metis Menu Plugin JavaScript -->

    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>



    <!-- Morris Charts JavaScript -->

    <script src="../bower_components/raphael/raphael-min.js"></script>

    <script src="../bower_components/morrisjs/morris.min.js"></script>

    <script src="../js/morris-data.js"></script>



    <!-- Custom Theme JavaScript -->

    <script src="../dist/js/sb-admin-2.js"></script>



</body>



</html>

