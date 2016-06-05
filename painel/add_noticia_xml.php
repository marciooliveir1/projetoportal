<?php 
//Chamada para noticias.class que está dentro de classes
require ('../classes/noticia.class.php');
//Metodo de requisição enviado para o servidor
if($_SERVER['REQUEST_METHOD'] == "POST"){
//Upload de arquivos para a pasta xml/noticias.xml
	move_uploaded_file($_FILES['arquivo']['tmp_name'], "xml/noticias.xml");
	$doc = new DOMDocument();
  $doc->preserveWhiteSpace=false;
  $doc->formatOutput=true;
  $doc->load('xml/noticias.xml');

  $noticias = $doc->getElementsByTagName( "noticia" );
  foreach( $noticias as $noticia )
  {
    $not = new Noticia();
//Variavel que armazena o id do portal
    $not->idPortal = $noticia->getElementsByTagName( "idPortal" )->item(0)->nodeValue;
//Variavel que armazena o titulo
    $not->titulo = $noticia->getElementsByTagName( "titulo" )->item(0)->nodeValue;
//Variavel que armazena a data
    $not->data = $noticia->getElementsByTagName( "data" )->item(0)->nodeValue;
//Variavel que armazena o conteudo
    $not->conteudo = $noticia->getElementsByTagName( "conteudo" )->item(0)->nodeValue;
//Variavel que armazena a gravata
    $not->gravata = substr($noticia->getElementsByTagName( "conteudo" )->item(0)->nodeValue, 0, 50);
//Variavel que armazena o link
    $not->link = $noticia->getElementsByTagName( "link" )->item(0)->nodeValue;
//Salva toda a noticia
    $not->save();
  }
//Redireciona para o arquivo importararquivoxml.php
  header('Location: importararquivoxml.php');
}else{
  header('Location: importararquivoxml.php');
}
 ?>