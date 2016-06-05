<?php
//Chamada da noticia.class que está dentro de classes
require ('../classes/noticia.class.php');
//Metodo de requisição enviado para o servidor
if($_SERVER['REQUEST_METHOD'] == "POST"){
  move_uploaded_file($_FILES['arquivo']['tmp_name'], "xml/noticias.xml");
  $doc = new DOMDocument();
  $doc->preserveWhiteSpace=false;
  $doc->formatOutput=true;
  $doc->load('xml/noticias.xml');
  $noticias = $doc->getElementsByTagName( "noticia" );
  foreach( $noticias as $noticia )
  {
    $not = new Noticia();
    $not->idPortal = $noticia->getElementsByTagName( "idPortal" )->item(0)->nodeValue;
    $not->titulo = $noticia->getElementsByTagName( "titulo" )->item(0)->nodeValue;
    $not->data = $noticia->getElementsByTagName( "data" )->item(0)->nodeValue;
    $not->conteudo = $noticia->getElementsByTagName( "conteudo" )->item(0)->nodeValue;
    $not->gravata = substr($noticia->getElementsByTagName( "conteudo" )->item(0)->nodeValue, 0, 50);
    $not->link = $noticia->getElementsByTagName( "link" )->item(0)->nodeValue;
    $not->save();
  }
   echo "Cadastro efetuado com sucesso!";
  }
?>
    <body>
    <!--Link para retornar para pagina principal-->
    <a href="../index.php"><h2>Home</h2></a>
        <hr>
          <p>Importa arquivo xml de Notícias</p>
              <form action=""  method="post">
                          <label><p>Escolher arquivo XML: </p></label>
                          <input type="file" name="arquivo"><br/><br/>
                          <input type="submit" value="Enviar">
              </form>          
    </body>
</html>