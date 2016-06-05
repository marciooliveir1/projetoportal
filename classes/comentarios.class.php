<?php 
//Conexao com o banco
require_once ('database.class.php');
//Apresenta todos os dados do comentario
class Comentarios{
	private $idComentario = "";
	public $idNoticia = "";
	public $comentario = "";
	public $email = "";
//Mostra todos os comentarios 
	public function getAll(){
		$banco = new Database();
		$consulta = $banco->db->query("SELECT * FROM comentarios");
		$comentarios = array();
		while($resultado = $consulta->fetch()){
			$comentarios[] = $resultado;
		}	
//Retorna todos os comentario		
		return $comentarios;
	}
//Apresenta todos os comentario daquela noticia(id)
	public static function getByNoticiaIdAll($id){
		$banco = new Database();
//Executa uma consulta e prepara uma seleção de todos comentario
		$consulta = $banco->db->prepare("SELECT * FROM comentarios WHERE id_noticia=? ORDER BY id_comentario");
//Executa a consulta e mostra um array dos id comentarios
		$consulta->execute(array($id));
//Mostra todos os comentario de uma determinada noticia
		$comentarios = array();
//Apresenta um resultado da consulta feita no banco
		while($resultado = $consulta->fetch()){
//Comentarios são mostrados conforme o resultado dos comentarios
			$comentarios[] = $resultado;
		}
		//retorna os comentarios 			
		return $comentarios;	
	}
//Salva todos os campos do formulario na tabela comentarios do banco de dados
	public function save(){
		$banco = new Database();
//Consulta o banco e insere os dados da tabela comentario em noticias
		$consulta = $banco->db->prepare("INSERT INTO comentarios (id_noticia, comentario, email) VALUES (?,?,?)");
//Executa um array das noticias e apresenta o comentario
		$consulta->execute(array($this->idNoticia, $this->comentario, $this->email));
//Retorna o resultado da consulta
		return $resultado = $consulta->fetch();	
	}
//Seleciona a tabela comentarios e apresenta o id_comentario
	public function get($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM comentarios WHERE id_comentario=?");
		$consulta->execute(array($id));
		$resultado = $consulta->fetch();	
//Variaveis para serem gravados no banco 
		$this->idComentario = $resultado['id_comentario'];
		$this->idNoticia = $resultado['id_noticia'];
		$this->comentario = $resultado['comentario'];
		$this->email = $resultado['email'];
	}
//Altera todos os campos da tabela 
	public function update(){
		$banco = new Database();
		$consulta = $banco->db->prepare("UPDATE comentarios SET id_noticia=?, comentario=?, email=? WHERE id_comentario=?");
		$consulta->execute(array($this->idNoticia, $this->comentario, $this->email, $this->idComentario));
//Retorna o resultado 
		return $resultado = $consulta->fetch();	
	}
}
?>