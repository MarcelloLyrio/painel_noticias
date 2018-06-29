<?php

include("cls_conexao.php");

class processando extends conexao{


	public $titulo;
	public $mensagem;
	public $data;
	public $hora;
	public $usuario;
	public $db = null;

	public function Cad_mensagem($titulo, $mensagem, $data, $hora, $usuario){
		if(!empty($titulo) && !empty($mensagem) && !empty($data) && !empty($hora) && !empty($usuario)){
			try{
				$db = $this->Conexao();
            			if ($db == true) {
                                	$stmt = $db->prepare("INSERT INTO mensagens (titulo, mensagem, data, hora, usuario_msg) VALUES ( ?, ?, ?, ?, ? )");
                                    $stmt->bindParam(1, $titulo);
                                    $stmt->bindParam(2, $mensagem);
                                    $stmt->bindParam(3, $data);
                                    $stmt->bindParam(4, $hora);
                                    $stmt->bindParam(5, $usuario);
                                    $stmt->execute();
                                     echo "<div id=\"conteudo\" class=\"alert alert-success box-msg\" role=\"alert\">Mensagem:<b> ".$titulo.", </b>cadastrada com sucesso!</div>";
                                   	}else	{
                                    echo "<div id=\"conteudo\" class=\"alert alert-danger box-msg\" role=\"alert\">Mensagen já cadastrada com esse título: ".$titulo."!</div>";
            			            }
            }catch(PDOException $e){
                            echo "<div id=\"conteudo\" class=\"alert alert-warning box-msg\" role=\"alert\">Erro ao cadastrar mensagem!</div>";
            }
		}
	}

	

	public function Lst_mensagem(){

		$db = $this->Conexao();
		$rs = $db->query("SELECT id_mensagem, titulo, data, hora, usuario_msg FROM mensagens ORDER BY id_mensagem DESC");

				if($rs->rowCount() > 0){
					        while($row = $rs->fetch(PDO::FETCH_OBJ)){

							//echo "<tr><td><input type='radio' name='ativado' value='".$row->id_mensagem."'></td>";
							echo "<td>".$row->id_mensagem."</td>";
							echo "<td><a href=\"#\" onclick=\"showCustomer('".$row->id_mensagem."')\" data-toggle=\"modal\" data-target=\".bs-example-modal-lg\">".$row->titulo."</a></td>";
							echo "<td>".$row->data."</td>";
							echo "<td>".$row->hora."</td>";
							//echo "<td>".$row->usuario_msg."</td>";
							echo "<td><a href='?ed=ed&editar=".$row->id_mensagem."' alt='Editar' class='glyphicon glyphicon-pencil'></a>";
							echo " | ";
							echo "<a href='?deletar=".$row->id_mensagem."' alt='Deletar' class='glyphicon glyphicon-trash' onclick=\"return confirm('Confirma exclusão da mensagem?')\"></a>";
                            echo " | ";
							echo "<a href='?action=publicar&ativado=".$row->id_mensagem."' alt='Publicar' id='publicar' class='glyphicon glyphicon-new-window' onclick=\"return confirm('Confirma a publicação da mensagem?')\"></a></td></tr>";
					        }
				}else{
					echo "Não existe nenhuma mensagem cadastrada!																																																																																																																																																																																																																																																																																																																																																																																																				";
				}
	}

    public function slc_mensagem(){

        $db = $this->Conexao();
        $rs = $db->query("SELECT id_mensagem, titulo, data, hora, usuario_msg FROM mensagens ORDER BY id_mensagem DESC");
        $row = $rs->fetchAll(PDO::FETCH_OBJ);
            return $row;

    }
	

	public function Preview_mensagem($id){

				$db = $this->Conexao();
    			$stmt = $db->query("SELECT * FROM mensagens WHERE id_mensagem = ".$id."");
    			$row = $stmt->fetch(PDO::FETCH_OBJ);
    			return $row;
	}


	public function Del_mensagem($id){
				$db = $this->Conexao();
    			$stmt = $db->query("SELECT id_mensagem, titulo FROM mensagens WHERE id_mensagem = ".$id."");
	    		$row = $stmt->fetch(PDO::FETCH_OBJ);

	    		        if((!empty($id)) && ($stmt->rowCount() > 0)){
                                            if ($db == true) {
                        $stmt = $db->prepare("DELETE FROM mensagens WHERE id_mensagem = ? ");
                        $stmt->bindParam(1, $id);
            			$stmt->execute();
                  echo "<div id=\"conteudo\" class=\"alert alert-success box-msg\" role=\"alert\">Mensagem nr: <b>".$row->id_mensagem." - ".$row->titulo."</b>, foi excluida com sucesso!</div>";
				}else{
                 echo "<div id=\"conteudo\" class=\"alert alert-danger box-msg\" role=\"alert\">Erro ao excluir mensagem!</div>";
			}
    		}else{
			    echo "<div id=\"conteudo\" class=\"alert alert-warning box-msg\" role=\"alert\">Esta mensagem não existe ou já foi excluida!</div>";
			}
	}

	public function Ed_mensagem($id){
			$db = $this->Conexao();
    		$rs = $db->query("SELECT id_mensagem, titulo, mensagem, data, hora, usuario_msg FROM mensagens WHERE id_mensagem = ".$id."");
			if($rs->rowCount() > 0){
					$row = $rs->fetch(PDO::FETCH_OBJ);
					return $row;
				}
	}

	public function At_mensagem($id, $titulo, $mensagem, $data, $hora, $usuario){
		if(!empty($titulo) && !empty($mensagem)){
			try{
			$db = $this->Conexao();
                        if ($db == true) {
                            $stmt = $db->prepare("UPDATE mensagens SET titulo = :titulo, mensagem = :mensagem, data = :data, hora = :hora, usuario_msg = :usuario WHERE id_mensagem = :id");
                            $stmt->bindValue(':titulo', $titulo);
                            $stmt->bindValue(':mensagem', $mensagem);
                            $stmt->bindValue(':data', $data);
                            $stmt->bindValue(':hora', $hora);
                            $stmt->bindValue(':usuario', $usuario);
                            $stmt->bindValue(':id', $id);
                            $stmt->execute();
                            echo "<div class=\"alert alert-success box-msg\" id=\"conteudo\" role=\"alert\">Mensagem:<b> ".$titulo.", </b>atualizada com sucesso!</div>";
                        }else{
                            echo "<div class=\"alert alert-danger box-msg\" id=\"conteudo\" role=\"alert\">Erro ao atualizar mensagem!</div>";
			            }
			}catch(PDOException $e){
				echo "<div class=\"alert alert-warning box-msg\" id=\"conteudo\" role=\"alert\">Mensagen já cadastrada com esse título: ".$titulo."!</div>";
			}
		}
	}

	public function Publicar_mensagem($id){
		$db = $this->Conexao();
		$rs = $db->query("DELETE FROM publicado");
		$rs = $db->query("INSERT INTO publicado (id_mensagem, data, hora, usuario_msg) SELECT id_mensagem, '".date('d/m/y')."', '".date('H:i')."', usuario_msg FROM mensagens WHERE id_mensagem = ".$id."");
					/*
					$handle = fopen("C:\\xampp\\htdocs\\painel\\noticias.php", "a+");
					$string = "<img src=\"img/cabecalho.png\" width=\"350\" height=\"100\"><br/>
							<?php
								require_once(\"pages/cls_processando.php\");
								$rs = new processando;
								$row = $rs->Publicado_mensagem();
								echo $row->mensagem;";
					fwrite($handle, $string);
					fclose($handle);
					*/
				$filename = '/home/storage/6/fc/2e/empresafacil/public_html/php/noticias_offline.php';
				if (file_exists($filename)){
				rename('/home/storage/6/fc/2e/empresafacil/public_html/php/noticias_offline.php', '/home/storage/6/fc/2e/empresafacil/public_html/php/noticias.php');
				}
	}

		public function Publicado_mensagem(){		
			$db = $this->Conexao();
            $stmt = $db->query("SELECT m.* FROM publicado p, mensagens m WHERE p.id_mensagem = m.id_mensagem");
            $row = $stmt->fetch(PDO::FETCH_OBJ);
            return $row;
		    }

		public function Retirar_mensagem(){
			$filename = '/home/storage/6/fc/2e/empresafacil/public_html/php/noticias.php';
				if (file_exists($filename)){
				rename('/home/storage/6/fc/2e/empresafacil/public_html/php/noticias.php', '/home/storage/6/fc/2e/empresafacil/public_html/php/noticias_offline.php');
				}
							$db = $this->Conexao();
							$rs = $db->query("DELETE FROM publicado");
                            echo "<meta HTTP-EQUIV='refresh' CONTENT='0.1;URL=index.php'>";
		}

	public function Login($user, $pass){
			$db = $this->Conexao();
			$rs = $db->query("SELECT * FROM usuarios WHERE usuario = '".$user."' AND senha = '". hash('whirlpool', $pass)."'");
				if($rs->rowCount() > 0){
					$row = $rs->fetch(PDO::FETCH_OBJ);
					return $row;
				}
	}
}
?>