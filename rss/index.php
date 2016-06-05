<?php
require ("../classes/noticia.class.php");

// Chamamos a classe
$rss = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss></rss>');
$rss->addAttribute('version', '2.0');
// Cria o elemento dentro do rss
$canal = $rss->addChild('channel');
// Adiciona sub-elementos ao elemento 
$canal->addChild('title', 'Teste - RSS');
$canal->addChild('link', 'http://www.xxx.com/');
$canal->addChild('description', 'Últimas 10 notícias via rss!');

$noticia = new Noticia();
$noticias = $noticia->getAll();
$cont = 1;
foreach ($noticias as $noticia) {
	if($cont <=10){
		// Cria  elemento dentro 
		$titulo = $noticia['titulo'];
		$link = $noticia['link'];
		$gravata = $noticia['gravata'];
		$data = $noticia['data'];

		$item = $canal->addChild('item');
		// Adiciona sub-elementos ao elemento <item>
		$item->addChild('title', $titulo);
		$item->addChild('link', $link);
		$item->addChild('description', $gravata);
		$item->addChild('pubDate', $data);
	}
	$cont++;
}



// Define o tipo de conteúdo e o charset
header("content-type: application/rss+xml; charset=utf-8");

// Entrega o conteúdo do RSS completo:
echo $rss->asXML();
exit;
?>