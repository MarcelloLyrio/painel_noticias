<?php
include("cls_processando.php");
class usuario extends processando{

	
	
	public $titulo;
	public $mensagem;
	public $data;
	public $hora;
	public $usuario;
	public $db = null;
	
	
	
	
	public function Cad_Usuario($usuario, $senha){
		
	
		if(!empty($usuario) && !empty($senha)){

			try{
							
			$db = $this->Conexao();
			
			
			if ($db == true) {
				$stmt = $db->prepare("INSERT INTO usuarios (usuario, senha) VALUES ( ?, ? )");
				$stmt->bindParam(1, $usuario);
				$stmt->bindParam(2, hash('whirlpool', $senha));
				$stmt->execute();
								
				echo "<div id=\"conteudo\" class=\"alert alert-success box-msg\" role=\"alert\">Usuário:<b> ".$usuario.", </b>cadastrado com sucesso!</div>";
			}		
			else{
                echo "<div id=\"conteudo\" class=\"alert alert-danger box-msg\" role=\"alert\">Erro ao cadastrar usuário!</div>";
				}
			}
		catch(PDOException $e)
			{
				echo "<div id=\"conteudo\" class=\"alert alert-warning box-msg\" role=\"alert\">Usuário já cadastrado!</div>";
			}
		}
	}
	
	public function Lst_usuario(){
		$db = $this->Conexao();
		
		$rs = $db->query("SELECT id_usuario, usuario FROM usuarios"); 
		
				if($rs->rowCount() > 0){
					
					while($row = $rs->fetch(PDO::FETCH_OBJ)){ 
							echo "<tr><td><input type='radio' name='ativado' value='".$row->id_usuario."'></td>";
							echo "<td>".$row->id_usuario."</td>";
							echo "<td>".$row->usuario."</td>";
                            echo "<td><a href='?editar=".$row->id_usuario."' alt='Editar' class='glyphicon glyphicon-pencil'></a>";
                            echo " | ";
                            echo "<a href='?deletar=".$row->id_usuario."' alt='Deletar' class='glyphicon glyphicon-trash' onclick=\"return confirm('Confirma exclusão da mensagem?')\"></a></td></tr>";

                    }
				}else{
					echo "Não existe nenhum usuário cadastrada!";
				}
		
	}
	
	public function Del_usuario($id){

			$db = $this->Conexao();
			
			$stmt = $db->query("SELECT id_usuario, usuario FROM usuarios WHERE id_usuario = ".$id."");
			$row = $stmt->fetch(PDO::FETCH_OBJ);
		
		if((!empty($id)) && ($stmt->rowCount() > 0)){			
			
			
			
			if ($db == true) {
							
				$stmt = $db->prepare("DELETE FROM usuarios WHERE id_usuario = ? ");
 
				$stmt->bindParam(1, $id);
				$stmt->execute();
				echo "<div id=\"conteudo\" class=\"alert alert-success box-msg\" role=\"alert\">Usuário nr: <b>".$row->id_usuario." - ".$row->usuario."</b>, foi excluído com sucesso!</div>";
			
			}		
			else{
				
				echo "<div id=\"conteudo\" class=\"alert alert-danger box-msg\" role=\"alert\">Erro ao excluir usuário!</div>";
			}
			
		}else{
				
				echo "<div id=\"conteudo\" class=\"alert alert-warning box-msg\" role=\"alert\">Este usuário não existe ou já foi excluído!</div>";
			}

		
	}
	
	public function Ed_usuario($id){
		
		$db = $this->Conexao();
		$rs = $db->query("SELECT id_usuario, usuario FROM usuarios WHERE id_usuario = ".$id.""); 
		
				if($rs->rowCount() > 0){
					
					$row = $rs->fetch(PDO::FETCH_OBJ);
		
					return $row;
					
				}
	}
	
	public function At_senha($id, $senha){
		
	
		if(!empty($id) && !empty($senha)){
	
			try{
	
			$db = $this->Conexao();							
			
					if ($db == true) {
				
							$stmt = $db->prepare("UPDATE usuarios SET senha = :senha WHERE id_usuario = :id");
							$pass = hash('whirlpool', $senha);
							$stmt->bindValue(':senha', $pass);
							$stmt->bindValue(':id', $id);
							
							$stmt->execute();
				
							echo "<div id=\"conteudo\" class=\"alert alert-success box-msg\" role=\"alert\">Senha atualizada com sucesso!</div>";
			
						}		
						else{
				
							echo "<div id=\"conteudo\" class=\"alert alert-danger box-msg\" role=\"alert\">Erro ao atualizar senha!</div>";
							}
			}
			catch(PDOException $e)
			{
				echo "<div id=\"conteudo\" class=\"alert alert-warning box-msg\" role=\"alert\">Erro!</div>";
			
			}
		} 
	}
	
	
}
?>