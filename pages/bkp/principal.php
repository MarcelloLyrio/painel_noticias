<!DOCTYPE HTML>
 <html lang="pt-br">
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

</head>
<body>
	 <header>        <!-- inicio header -->

         <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
             <div class="row">
                 <div class="col-md-4"><a class="navbar-brand" href="index.php"><img alt="Brand" src="../images/logoef.png"></a></div>
                 <div class="col-md-4">
                     <div class="page-header">
                         <h1>Adm <small>Notícias</small></h1>
                     </div>
                 </div>
                 <div class="col-md-4">
                     <?php
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
                 </div>
             </div>
	    </nav>
	</header>           <!-- fim header -->

	<section>
        <div class="row ">
            <div class="col-md-6">

                    <form class="form-inline" method="post" action="index.php">
                        <div class="form-group">
                            <div class="input-group md-col-6">
                                <label class="sr-only" for="TITULO">Titulo</label>
                                <input type="text" class="form-control" name="titulo" size ="130" value="<?=$result->titulo;?>" placeholder="" aria-describedby="basic-addon1">
                                <span class="input-group-addon" id="basic-addon1">Titulo</span>
                                <input type="hidden" class="form-control" name="data" value="<?php echo date('d/m/y'); ?>">
                                <input type="hidden" class="form-control" name="hora" value="<?php echo date('H:i'); ?>">
                                <input type="hidden" class="form-control" name="usuario_msg" value="<?=$logado;?>">
                                <input type="hidden" class="form-control" name="id_mensagem" value="<?=$result->id_mensagem;?>">
                            </div>
                            </br></br></br>
                            <textarea id="editor1" rows="10" cols="80" name="mensagem"><?=$result->mensagem;?></textarea>
                                                     </br>
                            <button type="submit" class="btn btn-success" name="gravar" value="gravar" onclick="return confirm('Confirma a atualização da mensagem?')">Gravar</button>
                            <button type="submit" class="btn btn-info" name="novo_limpar" value="">Novo / Limpar</button>
                        </div>
                    </form>
                </div>

            <div class="col-md-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading"> Noticiais Salvas</div>
                        <div class="panel-body">
                            <div class="table-overflow">
                                <table class="table table-striped">
                                    <tr>
                                        <td width="45"><strong>Ativa</strong></td>
                                        <td width="30"><strong>ID</strong></td>
                                        <td width="500"><strong>Titulo</strong></td>
                                        <td width="60"><strong>Data</strong></td>
                                        <td width="60"><strong>Hora</strong></td>
                                        <td width="200"><strong>Usuário</strong></td>
                                        <td width="30"></td>
                                        <td width="30"></td>
                                        <td width="30"></td>
                                    </tr>
                                    <tr>
                                        <?php
                                       $res = new processando();
                                        $res->Lst_mensagem();
                                        ?>
                                    </tr>
                                </table>
                            </div>
                            </br>
                  
                    </div>
                </div>
            </div>
        </div>
	</section>

	<footer class=".container" style="background-color: #e3f2fd;">
        <div class="row">
            <div class="col-md-4"><p>Copyright 2015 Código Fonte©</p></div>
            <div class="col-md-4">.col-md-4</div>
            <div class="col-md-4"><p>Versão 2.0</p></div>
        </div>

	</footer>
     <!-- jQuery 3 -->
     <script src="../bower_components/jquery/dist/jquery.min.js"></script>
     <script src="../bower_components/ckeditor/ckeditor.js"></script>
     <script>
         $(function () {
             // Replace the <textarea id="editor1"> with a CKEditor
             // instance, using default configuration.
             CKEDITOR.replace('editor1')
             //bootstrap WYSIHTML5 - text editor
             $('.textarea').wysihtml5()
         })
     </script></body>
</html>