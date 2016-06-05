<?php
//Chamando requisicao da conexao ao banco
require ('database.class.php');
//Classe da imagem
class Imagem{
//Variavel que recebe dados
	private $idImage = "";
//Variavel que recebe dados
	public $idNoticia = "";
//Variavel que recebe dados
	public $imagem = "";
//Variavel que recebe dados
	public $destaque = "";
//Função responsavel por salvar imagem 
	public function save(){
		$banco = new Database();
//Insere todos os dados no banco de dados
		$consulta = $banco->db->prepare("INSERT INTO imagens (id_noticia, imagem, destaque) VALUES (?, ?, ?)");
//Executa, e mostra todos os dados inseridos no banco
		$consulta->execute(array($this->idNoticia, $this->imagem, $this->destaque));
//Retorna resultado da consulta no banco
		return $resultado = $consulta->fetch();
	}
//Função que mostra o id da imagem
	public function get($id){
		$banco = new Database();
//Consulta o banco de dados e seleciona todas as imagens 
		$consulta = $banco->db->prepare("SELECT * FROM imagens WHERE id_imagem=?");
//Executa um array dos id da imagem
		$consulta->execute(array($id));
//Retorna o resultado da consulta ao banco de dados
		return $resultado = $consulta->fetch();
	}
//Função que altera os dados no banco
	public function update(){

	}
//Mostra todos os dados inseridos na noticia
	public function getAll($idNoticia){
		$banco = new Database();
//Consulta o banco de dados e seleciona todas as imagens  e altera
		$consulta = $banco->db->prepare("SELECT * FROM imagens WHERE id_noticia=?");
//Retorna um array da noticia
		$consulta->execute(array($idNoticia));
//Retorna o resultadp da consulta ao banco de dados
		$imagens = array();
//Retorna o resultado da consulta ao banco de dados
		while ($resultado = $consulta->fetch()) {
			$imagens[] = $resultado;
		}
//Retorna o resultado da consulta ao banco de dados
		return $imagens;
	}
}
?>