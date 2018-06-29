  <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Empresa Fácil</title>
    <script src="../js/jQuery-2.2.0.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script language="JavaScript">
            $(window).load(function(){
            $('#conteudo').fadeIn();
            $('#conteudo').fadeOut(6000);
        });
    </script>
    <style>
        .box-msg{
            position: absolute;
            margin: 0 auto;
            width: 100%;
            top: 45px;
            text-align: center; /* Centraliza o texto */
            z-index: 1000; /* Faz com que fique sobre todos os elementos da página */
            box-shadow: 0px 0px 10px black;
        }

    </style>
</head>

<body>
<?php 
	// session_start inicia a sessão 
	session_start();

	// as variáveis login e senha recebem os dados digitados na página anterior 
	if((isset($_POST['login'])) && (isset($_POST['senha']))){
	$login = $_POST['login']; 
	$senha = $_POST['senha']; 
	

	include("cls_processando.php");
	
	$result = new processando();
	
	$rs = $result->Login($login, $senha);
	
	if(($rs) > 0 ) { 
	
		echo $_SESSION['login'] = $rs->usuario;
		echo $_SESSION['nivel'] = $rs->nivel;

		header('location:index.php');
	}
	else{ 
		//unset ($_SESSION['login']);
		//unset ($_SESSION['senha']);
		echo "<div id=\"conteudo\" class=\"alert alert-danger box-msg\" role=\"alert\">Usuário ou senha inválido!</div>";
		} 
		}

            if(isset($_GET['logout']) && $_GET['logout'] == 'logout')
            {
                unset($_SESSION['login']);
                //unset($_SESSION['senha']);
                session_destroy();
             }
?>
		
    <div class="container">
        <div class="row">
		
            <div class="col-md-4 col-md-offset-4">
	
                <div class="login-panel panel panel-default">
				<center><img alt="Brand" src="../images/logo2.fw.png"></center>
                    <div class="panel-heading">
                        <h3 class="panel-title">Painel de Notícias - Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method ="post" action="login.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuario" name="login" type="" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="senha" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Lembrar
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
								<button type="submit" class="btn btn-lg btn-primary btn-block" name="gravar" value="gravar">Entrar</button>
                               <!-- <a href="index.php" class="btn btn-lg btn-primary btn-block">Entrar</a>  -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
