<?php

class conexao{

    private $host = 'localhost';

	private $user = 'root';

	private $senha = 'l015077';

	private $dbname = 'painel';

	private $porta = '3306';

		

		public function Conexao(){

		

	

		try {

			

				$db  =  new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";port=".$this->porta."", "".$this->user."", "".$this->senha."");

				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				//echo "PDO connection object created";

				return $db;

			}

		catch(PDOException $e)

			{

				echo $e->getMessage();

			}

		}



}

?>