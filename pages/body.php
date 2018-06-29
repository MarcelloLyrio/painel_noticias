	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    		<div class="modal-dialog modal-lg">
        			<div class="modal-content" id="txtHint" style="font-size:14px;">
           			</div>
            </div>
	</div>

							<?php

								if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) {
									unset($_SESSION['login']);
									unset($_SESSION['senha']);
									header('location:login.php');
								}

								if((isset($_GET['deletar'])) && ($_GET['deletar'] <> '') ){
									$res = new processando();
									$res->Del_mensagem($_GET['deletar']);
								}

								if((isset($_POST['salvar'])) && ($_POST['salvar'] == 'salvar')){
									$res = new processando();
									$res->Cad_mensagem($_POST['titulo'], $_POST['mensagem'], $_POST['data'], $_POST['hora'], $_POST['usuario_msg']);
								}

								if((isset($_POST['gravar'])) && ($_POST['gravar'] == 'gravar')){
									$res = new processando();
									$rs = $res->At_mensagem($_POST['id_mensagem'], $_POST['titulo'], $_POST['mensagem'], $_POST['data'], $_POST['hora'], $_POST['usuario_msg']);
								}

								if((isset($_GET['retirar'])) && ($_GET['retirar'] == 'retirar')){
									$res = new processando();
									$res->Retirar_mensagem();
								}

								if((isset($_GET['editar'])) && ($_GET['editar'] <> '') && (isset($_GET['ed'])) && ($_GET['ed'] <> '')){
									$rs = new processando();
									$result = $rs->Ed_mensagem($_GET['editar']);
								?>



    										<div class="container-fluid col-md-5">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading"> Editor de Mensagens</div>
                                                    <div class="panel-body">
	                									<form class="form-inline" method="post" action="index.php">
					                        					<div class="form-group">
										                                <div class="input-group md-col-8">
                                                                        <label class="sr-only" for="TITULO">Titulo</label>
                                                                        <input type="text" class="form-control" name="titulo" size ="130" value="<?=$result->titulo;?>" placeholder="" aria-describedby="basic-addon1">
                                                                        <span class="input-group-addon" id="basic-addon1">Titulo</span>
                                                                        <input type="hidden" class="form-control" name="data" value="<?php echo date('d/m/y'); ?>">
                                                                        <input type="hidden" class="form-control" name="hora" value="<?php echo date('H:i'); ?>">
                                                                        <input type="hidden" class="form-control" name="usuario_msg" value="<?=$logado;?>">
                                                                        <input type="hidden" class="form-control" name="id_mensagem" value="<?=$result->id_mensagem;?>">
                                                                        </div>
                                                                             </br></br></br>
                                                                        <textarea id="elm1" name="mensagem"><?=$result->mensagem;?></textarea>
                                                                    <script>
                                                                        // Replace the <textarea id="editor1"> with a CKEditor
                                                                        // instance, using default configuration.
                                                                        CKEDITOR.replace( 'elm1' );
                                                                    </script>
                                                                    </br>
                                                                            <div class="clearfix"></div>
										                                <button type="submit" class="btn btn-success" name="gravar" value="gravar" onclick="return confirm('Confirma a atualização da mensagem?')">Gravar</button>
                                                                        <button type="submit" class="btn btn-info" name="novo_limpar" value="">Novo / Limpar</button>

                                                                </div>
                     					                </form>
										     </div>
                                                </div>
                                            </div>

								<?php	

									

								}else{

								

								?>




	<div class="container-fluid col-md-5">
        <div class="panel panel-primary">
            <div class="panel-heading"> Editor de Mensagens</div>
            <div class="panel-body">
	<form class="form-inline" method="post" action="index.php">
		<div class="form-group">

        			<div class="input-group md-col-8">
		        		<label class="sr-only" for="TITULO">Titulo</label>
				        <input type="text" class="form-control" name="titulo" size ="130" value="" placeholder="" aria-describedby="basic-addon1">
				        <span class="input-group-addon" id="basic-addon1">Titulo</span>
                        <div class="clearfix"></div>
				        <input type="hidden" class="form-control" name="data" value="<?php echo date('d/m/y'); ?>">
				        <input type="hidden" class="form-control" name="hora" value="<?php echo date('H:i'); ?>">
				        <input type="hidden" class="form-control" name="usuario_msg" value="<?=$logado; ?>">
			        </div>
			                    </br></br></br>
			            <textarea id="elm1" name="mensagem"></textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'elm1' );
            </script>
			</br>
			            <button type="submit" class="btn btn-success" name="salvar" value="salvar">Salvar</button>
                        <button type="submit" class="btn btn-info" name="novo_limpar" value="">Novo / Limpar</button>
        </div>
	</form>
	</div>
	</div>
    </div>


								<?php } ?>

	<div class="container-fluid col-md-7">
		<div class="panel panel-primary">
			<div class="panel-heading"> Lista de Mensagens</div>
			<div class="panel-body">

                    <table id="example" class="table table-striped " cellspacing="0" width="100%">
                        <thead>
							<tr class="primary">
<!--								<th width="45"><strong>Ativa</strong></th>-->
								<th width="30"><strong>ID</strong></th>
								<th width="500"><strong>Titulo</strong></th>
								<th width="60"><strong>Data</strong></th>
								<th width="60"><strong>Hora</strong></th>
								<th width="90"><strong>Ações</strong></th>

							</tr>
                        </thead>
                        <tbody>
                            <?php
                            $res = new processando();
                            $res->Lst_mensagem();
                            ?>
                        </tbody>
                     </table>



		</div>
	</div>
</div>