<?php
//Class do meu banco
class Database{
//Variavel $database recebe nome do banco
	private $database = "jango";
//Nome do usuario do banco
	private $user = "postgres";
//Senha do banco postgres
	private $pass = "12345";
//Variavel $db recebe nome do banco
	public  $db = '';
//Função cresposavel por construir aplicação de conexao entre banco e navegador	
	function __construct(){
		try {
//Retorna dados do banco e sua respectivas configurações
		    return $this->db = new PDO("pgsql:host=localhost dbname={$this->database} user={$this->user} password={$this->pass}");
		} catch (PDOException $e) {
		    print $e->getMessage();
		}
	}

}