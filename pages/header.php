<?php



        if(!isset ($_SESSION['login']) || $_SESSION['login'] == "")
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            unset($_SESSION['nivel']);
            header('location:login.php');
        }

        $logado = $_SESSION['login'];


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Painel de Mensagens - Empresa Fácil</title>

    <script src="../js/jQuery-2.2.0.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
      <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="./ckeditor/ckeditor.js"></script>
    <script language="JavaScript">
        $('a').click(function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                type: "GET",
                url: url,
                async: true
            });
            return false;
        });
        $(window).load(function(){
            $('#conteudo').fadeIn();
            $('#conteudo').fadeOut(6000);
        });
    </script>
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

<style>
    footer {
        position: fixed;
        background-color: #d8ecf7;
        bottom: 0;
        height: 40px;
        width: 100%;
      /* box-shadow: 0px 0px 10px black; */
        z-index: 1;
    }
    .center-block {
        display: block;
       float: right;
        margin-right: 20px;
        padding: 10px;
    }
    .box-msg{
        margin-right: auto;
        margin-left: auto;
        width: 50%;
         position: absolute;
        left: 25%;
       top: 55px;
        text-align: center; /* Centraliza o texto */
        z-index: 1000; /* Faz com que fique sobre todos os elementos da página */
        box-shadow: 0px 0px 10px black;
    }
    .pull-left {
           float: left !important;
       }
    .pull-right {
        float: right !important;
    }
    .element {
       .pull-left();
       }
    .another-element {
    .pull-right();
    }
</style>
</head>
<body>


    <div id="wrapper">
        <!-- Navegação -->
        <nav class="navbar navbar-light" style="background-color: #d8ecf7;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="center-block"><a href="index.php"><img alt="Brand" src="../images/logoef.png"></a></div>
            </div>
                   <!-- /.navbar-header -->
             <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <i class="fa fa-envelope fa-fw"></i>
						<?php
						include("cls_usuario.php");
						if((isset($_GET['action'])) && ($_GET['action'] == 'publicar') && (isset($_GET['ativado'])) && ($_GET['ativado'] <> '')){
									$res = new processando();
									$res->Publicar_mensagem($_GET['ativado']);
						}
									$result = new processando();
									$row = $result->Publicado_mensagem();
									if(isset($row->id_mensagem)){
                                        echo "Publicado: <strong> <a href=\"#\" onclick=\"showCustomer2('".$row->id_mensagem."')\" data-toggle=\"modal\" data-target=\".bs-example-modal-lg\" >".$row->titulo."</a></strong>   Em: ".$row->data." - ".$row->hora."hs";
									}else{
										echo "Nenhuma mensagem publicada!";
									}
						?>

                    <!-- </a>/.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?=$logado;?> <i class="fa fa-angle-down "></i></a>

                            <ul class="dropdown-menu dropdown-user">
                                	<?php	if((isset($_SESSION['nivel'])) && ($_SESSION['nivel'] == 'M')){	?>
                                    <li><a href="cad_user.php"><i class="fa fa-gear fa-fw"></i> Cadastro de Usuarios</a></li>
                  		            <?php  } ?>
                                    <li class="divider"></li>
                                    <li><a href="login.php?logout=logout"><i class="fa fa-sign-out fa-fw"></i> Sair</a></li>
                            </ul>

                    </li>
                    <!-- /.dropdown -->
                               </ul>
            <!-- /.navbar-top-links -->
        </nav>
    </div>