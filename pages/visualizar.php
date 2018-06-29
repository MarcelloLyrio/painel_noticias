<?php
include("cls_processando.php");

session_start();

		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { 
			unset($_SESSION['login']);
			unset($_SESSION['senha']);
			header('location:login.php');
		}

		if((isset($_GET['q'])) && ($_GET['q'] == 'visualizar') || (isset($_GET['desabilitar']))){
			$res = new processando();
			$rs = $res->Preview_mensagem($_GET['id']);
?>

                    <div class="container-fluid col-md-6">
    					<div class="panel panel-primary">
        					<div class="panel-heading">
                                Pré-Visualizar
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
        				<div class="panel-body ">
                                <table>
                                    <tr><td>Título: <b><?=$rs->titulo;?></br><hr></b></td></tr>
                                    <tr><td><center><img src="../images/cabecalho.png" width="385" height="100"></center></td></tr>
                                </table>
            			            <p><?=$rs->mensagem;?></p>
					            <br>	<br>	<br>
                                <hr>
                            <form class="form-inline" method="get" action="#">
                            <input type="hidden" class="form-control" name="editar" value="<?=$rs->id_mensagem;?>">
                            <button type="submit" class="btn btn-warning" name="ed" value="ed">Editar</button>
<?php
	}
			if((isset($_GET['ret'])) && ($_GET['ret'] == 'retirar')) {
                ?>
                <button type="submit" class="btn btn-primary" name="retirar" value="retirar"  onclick="return confirm('Confirma a retirada da mensagem?')">Retirar
                    Mensagem
                </button>
                <?php
            }
		?>
                        </form>
                 </div>
             </div>
        </div>
    </div>