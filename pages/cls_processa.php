<?php
class processar{

	public $titulo;
	public $mensagem;
	public $data;
	public $hora;
	public $usuario;
	
	
	public function Cad_mensagem($titulo, $mensagem, $data, $hora, $usuario){
		// open in read-write mode
		$db = dbase_open('./db/MENSAGENS.dbf', 2);

		if ($db) {
			$record_numbers = dbase_numrecords($db);
			$record_numbers++;		
			$ativo = "";
			
			if(!empty($titulo) && !empty($mensagem) && !empty($data) && !empty($hora) && !empty($usuario)){
			dbase_add_record($db, array(
					$record_numbers,
					$data,
					$hora,
					$titulo,
					$mensagem,
					$ativo,
					$usuario));
					
			}		
			dbase_close($db);
		}
	}
	
	public function Lst_mensagem(){
		
		$db = dbase_open('./db/MENSAGENS.dbf', 0);

		if ($db) {
				
				$record_numbers = dbase_numrecords($db);
  
				for ($i = 1; $i <= $record_numbers; $i++) {
      
						$row = dbase_get_record_with_names($db, $i);
								
								if ($record_numbers <> 0) {
          
										echo "<tr><td>
											<input type='radio' name='ativado' value='".$row['ID_MSG']."'>
											</td>
											<td>".$row['ID_MSG']."</td>
											<td>".$row['TITULO']."</td>
											<td>".$row['DATA']."</td>
											<td>".$row['HORA']."</td>
											<td>".$row['USER_MSG']."</td></tr>";
								
								}
								else{
										echo "Não existem mensagens para exibir!";
								}
				}
		}
	}
	
	public function Del_mensagem($id){
		
		$db = dbase_open('./db/MENSAGENS.dbf', 2);
		
		dbase_delete_record ( $db , $id );
		
		dbase_pack($db);
		
		dbase_close($db);
		
	}
	
	public function Exibir_mensagem($id){
		
		$db = dbase_open('./db/MENSAGENS.dbf', 2);
		
		$record_numbers = dbase_numrecords($db);
  
				for ($i = 1; $i <= $record_numbers; $i++) {
      
						$row = dbase_get_record_with_names($db, $i);
								
								if ($row['ID_MSG'] == $id) {
																						
											//unset($row['deleted']);
											
											return $row;
											
											dbase_close($db);
											
											break; 
								}
		
						
				}
		
	}

	
	public function Ed_mensagem($id){
		
		$db = dbase_open('./db/MENSAGENS.dbf', 2);
		
		$record_numbers = dbase_numrecords($db);
  
				for ($i = 1; $i <= $record_numbers; $i++) {
      
						$row = dbase_get_record_with_names($db, $i);
								
								if ($row['ID_MSG'] == $id) {
																						
											unset($row['deleted']);

											$row['TITULO'] = $titulo;
											
											$row['MENSAGEM'] = $mensagem;
											
																			
											dbase_replace_record($db, $row, 1);
											
											dbase_close($db);
								}
		
		
				}
		
  
		
		
		return $row;
		
	}

}
?>