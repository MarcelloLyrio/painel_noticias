<?php
session_start();
include("header.php");?>

<?php
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { 
			
			unset($_SESSION['login']); 
			unset($_SESSION['senha']); 
			header('location:login.php'); 
		} 						

						
								if((isset($_GET['deletar'])) && ($_GET['deletar'] <> '')){
									$res = new usuario();
									$res->Del_usuario($_GET['deletar']);
								
								}
							
								
								if((isset($_POST['salvar'])) && ($_POST['salvar'] == 'salvar') && (isset($_POST['senha'])) && ($_POST['senha'] <> '')){
									$res = new usuario();
									$res->Cad_usuario($_POST['usuario'], $_POST['senha']);
									
								}
								
								if((isset($_POST['gravar'])) && ($_POST['gravar'] == 'gravar') && (isset($_POST['senha'])) && ($_POST['senha'] <> '') && (isset($_POST['id_usuario'])) && ($_POST['id_usuario'] <> '')){
									$res = new usuario();
									$rs = $res->At_senha($_POST['id_usuario'], $_POST['senha']);
									
									
								}
								
								if((isset($_GET['editar'])) && ($_GET['editar'] <> '') ){
									
									$rs = new usuario();
									$result = $rs->Ed_usuario($_GET['editar']);
								?>

	
	<div class="container-fluid col-md-6">
                <div class="panel panel-primary">
                                    <div class="panel-heading"> Editar Usuários</div>
                <div class="panel-body">
	                   <form class="form-horizontal" method="post" action="cad_user.php" name="form1" id="form1">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label" style=" font-size:14px;">Usuário</label>
                                <div class="col-sm-5">
                                <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuário" value="<?=$result->usuario;?>">
                                <input type="hidden" name="id_usuario" class="form-control" id="id_usuario" placeholder="" value="<?=$result->id_usuario;?>">
                                </div>
                            </div><br>
                      		<center><h4>Digite a nova senha.</h4></center><br>
                        <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label" style=" font-size:14px;">Senha</label>
    <div class="col-sm-10">
        <div class="input-group col-md-6 f-left">
					<input class="password form-control" id="senha" placeholder="Senha" data-component="password-strength" data-monitor-id="password-strength-monitor" type="password" name="senha">
					<a class=" input-group-addon toggle-pass ico-eye" data-classtoggle="ico-eye,ico-eye-blocked" data-target="#senha" href="#"></a>
		</div>
 
				<div class="password-strength">
					<p style=" font-size:14px;">Força da senha</p>
					<div id="password-strength-monitor" class="monitor"></div>
				</div>
		</div>
	</div>
    
      <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label" style=" font-size:14px;">Confirmar Senha</label>
    <div class="col-sm-10">
        <div class="input-group col-md-6 f-left">
					<input class="password form-control" id="senhaconf" placeholder="Confirme a senha" type="password" name="senhaconf">
					<a class=" input-group-addon toggle-pass ico-eye" data-classtoggle="ico-eye,ico-eye-blocked" data-target="#senhaconf" href="#"></a>
				</div>
			</div>
    </div>
   <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
     <button type="submit" class="btn btn-success" name="gravar" value="gravar" onClick="return validate()">Gravar</button>
     <button type="submit" class="btn btn-info" name="novo_limpar" value="">Novo / Limpar</button>
    </div>
  </div>
</form>
	</div>
        </div>
    </div>

								
								<?php	
									
								}else{
								?>


			<div class="container-fluid col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading"> Cadastrar Usuários</div>
                    <div class="panel-body">
				<form class="form-horizontal" method="post" action="cad_user.php" name="form1" id="form1">

  			<div class="form-group">

    <label for="inputEmail3" class="col-sm-2 control-label" style=" font-size:14px;">Usuário</label>
    			<div class="col-sm-6">
						
						      <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuário">
    			</div>
  			</div>
  
  			<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label" style=" font-size:14px;">Senha</label>
    			<div class="col-sm-10">
	        		<div class="input-group col-md-6 f-left">
							<input class="password form-control" id="senha" placeholder="Senha" data-component="password-strength" data-monitor-id="password-strength-monitor" type="password" name="senha">
					<a class="input-group-addon toggle-pass ico-eye" data-classtoggle="ico-eye,ico-eye-blocked" data-target="#senha" href="#"></a>
					</div>
 							<div class="password-strength">
								<p style=" font-size:14px;">Força da senha</p>
							<div id="password-strength-monitor" class="monitor"></div>
                            </div>
				</div>
			</div>
			<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label" style=" font-size:14px;">Confirmar Senha</label>
    			<div class="col-sm-10">
        			<div class="input-group col-md-6 f-left">
							<input class="password form-control" id="senhaconf" placeholder="Confirme a senha" type="password" name="senhaconf">
					<a class=" input-group-addon toggle-pass ico-eye" data-classtoggle="ico-eye,ico-eye-blocked" data-target="#senhaconf" href="#"></a>
					</div>
                    
				</div>
		    </div>
    
   				<div class="form-group">
    				<div class="col-sm-offset-2 col-sm-10">
     			<button type="submit" class="btn btn-success" name="salvar" value="salvar" onClick="return validate()">Salvar</button>
    				</div>
  				</div>
		</form>
	</div>
	</div>
            </div>
<?php } ?>
	<div class="container-fluid col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading"> Lista de usuários</div>
			<div class="panel-body">
			<form class="form-inline" method="post" action="#">
				<div class="table-overflow">
                    <table id="example" class="table table-striped " cellspacing="0" width="100%">
							<thead>
								<th width="45"><strong>#</strong></th>
								<th width="30"><strong>Id</strong></th>
								<th width="500"><strong>Usuário</strong></th>
                                <th width="80"><strong>Ações</strong></th>

								</thead>
                        <tbody>
								<?php
								$res = new usuario();
								$res->Lst_usuario();
								?>
                        </tbody>
					</table>
				</div>
				</form>
		</div>

	</div>
    </div>
<a href="index.php"><button type="button" class="btn btn-default">Voltar</button></a>
        <footer>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4"><div class="center-block">Versão: 2.0</div></div>
            </div>
        </footer>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
        <script>
            $(document).ready(function(){
                $('#example').DataTable({
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "Desculpe, nada encontrado!",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "Nenhum registro encontrado!",
                        "search":         "Pesquisar:",
                        "next":       "Próximo",
                        "previous":   "Anterior",
                        "infoFiltered": "(filtrado de um total de _MAX_ registros)"
                    }
                });
            });
        </script>
