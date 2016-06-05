<?php 
//Chamando requisicao da conexao ao banco
require ('database.class.php');
//Classe da noticia
class Noticia{
	public $idNoticia = "";
	public $idPortal = "";
	public $titulo = "";
	public $data = "";
	public $gravata = "";
	public $conteudo = "";
	public $link = "";
//Mostra todos os dados inseridos na noticia
	public function getAll(){
		$banco = new Database();
//Mostra todos os dados do banco da noticia
		$consulta = $banco->db->query("SELECT * FROM noticia ORDER BY id_noticia DESC");
//Executa um array das noticias
		$noticias = array();
//Mostra um array do resultado da consulta ao banco de dados
		while($resultado = $consulta->fetch()) {
//Resultado das noticias
			$noticias[] = $resultado;
		}
//Retorna as noticias 
		return $noticias;	
	}
//Mostra os id das noticias
	public function getById($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM noticia WHERE id_noticia=?");
		$consulta->execute(array($id));

		return $resultado = $consulta->fetch();	
	}	
//Salva os dados no banco de dados
	public function save(){
		$banco = new Database();
		$consulta = $banco->db->prepare("INSERT INTO noticia (id_portal, titulo, data, gravata, conteudo, link) VALUES (?, ?, ?, ?, ?, ?) RETURNING id_noticia");
		$consulta->execute(array($this->idPortal, $this->titulo, $this->data, $this->gravata, $this->conteudo, $this->link));
		$resultado = $consulta->fetch();
//Retorna o resultado depois que salva no banco
		return $resultado[0];
		}
//Seleciona por id a noticia
	public function get($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM noticia WHERE id_noticia=?");
		$consulta->execute(array($id));
		$resultado = $consulta->fetch();
//Variaveis que recebem os dados
		$this->idNoticia = $resultado['id_noticia'];
		$this->idPortal = $resultado['id_portal'];
		$this->titulo = $resultado['titulo'];
		$this->data = $resultado['data'];
		$this->gravata = $resultado['gravata'];
		$this->conteudo = $resultado['conteudo'];
		$this->link = $resultado['link'];

	}
//Função que altera os dados
	public function update(){
		$banco = new Database();
		$consulta = $banco->db->prepare("UPDATE noticia SET id_portal=?, titulo=?, data=?, gravata=?, conteudo=?, link=? WHERE id_noticia=?");
		$consulta->execute(array($this->idPortal, $this->titulo, $this->data, $this->gravata, $this->conteudo, $this->link, $this->idNoticia));
//Retorna o resultado da consulta
		return $resultado = $consulta->fetch();		
	}
//Função que delete toda a noticia
	public function delete($id){	
		$banco = new Database();
		$consulta = $banco->db->prepare("DELETE FROM noticia WHERE id_noticia=?");
		$consulta->execute(array($id));
		return true;		
	}
//Função que procura qualquer dado na aplicacao 
	public function buscar($encontrar){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM noticia WHERE conteudo ILIKE ? OR titulo ILIKE ? ORDER BY id_noticia DESC");
		$consulta->execute(array("%".$encontrar."%", "%".$encontrar."%"));
		$noticias = array();
		while ($res = $consulta->fetch()) {
			$noticias[] = $res;
		}
		return $noticias;
	}
}
?>