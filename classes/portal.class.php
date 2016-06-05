<?php 
//Chamando requisicao da conexao ao banco
require ('database.class.php');
//Classe portal
class Portal{
	private $idPortal = "";
	public $nmPortal = "";
	public $site = "";
	public $email = "";

//Função apresenta todos os portais
	public function getAll(){
		$banco = new Database();
//Seleciona todos os portais e ordena pelo nome
		$consulta = $banco->db->query("SELECT * FROM portal ORDER BY nm_portal");
//Mnonta um array com os portais da tabela portal
		$portais = array();
//Apresenta o resultado da consulta
		while($resultado = $consulta->fetch()){
//Da tabela portal mostra o resultado		  
			$portais[] = $resultado;
		}
//Retorna portais da tabela portal
		return $portais;
	}
//Função que prepara uma seleção com o id do portal
	public function getById($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM portal WHERE id_portal=?");
//Executa um array dos id
		$consulta->execute(array($id));
//Retorna o resultado da consulta
		return $resultado = $consulta->fetch();	
	}
//Função que salva os dados no banco de dados
	public function save(){
		$banco = new Database();
//Insere na tabela portal os valores de (nm_portal, site, email)
		$consulta = $banco->db->prepare("INSERT INTO portal (nm_portal, site, email) VALUES (?, ?, ?)");
//Executa um array e apresenta uma lista com nmPortal, site, email
		$consulta->execute(array($this->nmPortal, $this->site, $this->email));
//Retorna o resultado da consulta no banco de dados
		return $resultado = $consulta->fetch();
		}
//Função que busca o if do portal
	public function get($id){
		$banco = new Database();
//Seleciona da tabela portal o id_portal
		$consulta = $banco->db->prepare("SELECT * FROM portal WHERE id_portal=?");
//Executa um arry do id portal		
		$consulta->execute(array($id));
//Retorna o resultado da consulta
		$resultado = $consulta->fetch();
		$this->idPortal = $resultado['id_portal'];
		$this->nmPortal = $resultado['nm_portal'];
		$this->site = $resultado['site'];
		$this->email = $resultado['email'];	
	}
//Função que altera os dados modificados no banco de dados
	public function update(){
		$banco = new Database();
//Seleciona todos os dados do portal e altera todos os dados
		$consulta = $banco->db->prepare("UPDATE portal SET nm_portal=?, site=?, email=? WHERE id_portal=?");
//Executa um array de todos os dados do portal
		$consulta->execute(array($this->nmPortal, $this->site, $this->email, $this->idPortal));
//Retorna o resultado da consulta
		return $resultado = $consulta->fetch();
	}
//Função que delato todos os dados do id portal
	public function delete($id){
		$banco = new Database();
//Prepara todos os campos e deleta
		$consulta = $banco->db->prepare("DELETE FROM portal WHERE id_portal=?");
//Executa um array do id portal
		$consulta->execute(array($id));
//Retorna verdadeiro
		return true;		
	}
//Função que seleciona o id do nome
	public static function getName($id){
		$banco = new Database();
//Prepara seleção do nome 
		$consulta = $banco->db->prepare("SELECT nm_portal FROM portal WHERE id_portal=?");
//Executa um array do id portal
		$consulta->execute(array($id));
//Resultado da consulta
		$resultado = $consulta->fetch();
//Retorna o resultado da consulta
		return $resultado[0];
	}
}
?>