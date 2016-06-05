<?php
// Adicionar a extensao php_soap no php.ini
//Chamando noticia.class que está dentro de classes
require ('../classes/noticia.class.php');
//Chamando portal.class que está dentro de classes
require ('../classes/portal.class.php');
//Coloque o endereco na sua maquina local
$server = new SoapServer(null, array('uri' => 'http://localhost/parcialnoticias/webservice/'));  // ex.: http://localhost/soap/
//Função que busca determinada pesquisa
	  		function getSearch($palavraChave){
	  			$noticia = new Noticia();
	  			$noticias = $noticia->search($palavraChave);
//Retorna as noticias
	  			return $noticias;
	  		}
	  		function getByPortalId($id){
	  			$noticia = new Noticia();
	  			$resultado = $noticia->getByPortalId($id);
//Retorna o resultado	  			
	  			return $resultado;
	  		}
	  		function getByNoticiaId($id){
	  			$noticia = new Noticia();
	  			$resultado = $noticia->getById($id);

	  			return $resultado;
	  		}
	  		function getAllNoticias(){
	  			$noticia = new Noticia();
	  			$noticias = $noticia->getAll();

	  			return $noticias;
	  		}
	  		function getAllPortais(){
	  			$portal = new Portal();
	  			$portais = $portal->getAll();
	  			return $portais;
	  		}

	  		

//registro do servico na instancia
$server->addFunction("getSearch");
$server->addFunction("getByPortalId");
$server->addFunction("getByNoticiaId");
$server->addFunction("getAllNoticias");
$server->addFunction("getAllPortais");



// chamada do metodo para atender as requisicoes do servico
// Executa o método e mostra a lista de noticias
if ($_SERVER["REQUEST_METHOD"]== "POST") {
		$server->handle();

} else {
	$functions = $server->getFunctions();
	print "Métodos disponíveis no serviço:";
	print "<hr />";
	print " <ul>";
	foreach ($functions as $func) {
		print "<li>$func</li>";
	}
	print "</ul>";
	
}
?>
