<?php
//É aqui que tem toda a logica da noticia
include "../classes/noticia.class.php";
//É aqui que tem toda a logica do portal
include "../classes/portal.class.php";
//É aqui que tem toda a logica da imagem
include "../classes/imagem.class.php";
//Armazena o portal
$portal = new Portal();
//Apresenta todos os portais
$portais = $portal->getAll();
//Armazena a noticia
$noticia = new Noticia();
//Apresenta todas as noticias
$noticias = $noticia->getAll();
//solicita e envio um dado no servidor
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Seleciona um portal cadastrado no banco dados
    $id_portal = $_POST['portal'];
    //Grava o titulo no banco dados
    $titulo = $_POST['titulo'];
    //Grava o conteudo da noticia no banco dados
    $conteudo = $_POST['conteudo'];
    //Grava a data da noticia no banco dados
    $data = $_POST['data'];
    //Grava o link da noticia no banco dados
    $link = $_POST['link'];

    //Linha responsável para verificar se todoso os campos foram preenchidos
    if($id_portal !="" && $titulo !="" && $conteudo !="" && $data !="" && $link !=""){
    //É essa linha que vai gravar os dados no banco dados   
        $noticia->idPortal = $id_portal;
    //É essa linha que vai gravar titulo no banco dados 
        $noticia->titulo = $titulo;
    //É essa linha que vai gravar a data no banco dados 
        $noticia->data = $data;
    //É essa linha que vai gravar o conteudo no banco dados 
        $noticia->conteudo = $conteudo;
    //É essa linha que vai gravar o link no banco dados 
        $noticia->link = $link;
    //É essa linha que vai gravar a gravata no banco dados 
        $noticia->gravata = substr($conteudo, 0, 200);
    //É essa linha que vai salvar os dados da noticia no banco dados 
        $res = $noticia->save();
    //Campo onde busca grava a imagem.jpg na pasta imgnoticias
        move_uploaded_file($_FILES['imagem']['tmp_name'], "../imgnoticias/".$res.".jpg");
    //Mensagem que retorna quando efetuada com sucesso
       echo "Noticia inserida com sucesso.";
    }        
}
?>
<!--Link para retornar para pagina principal-->
<a href="../index.php"><h2>Home</h2></a>
<hr>
    <body>
<center>
    <!--Descrição do Titulo Cadastro de Noticias-->
    <p>Cadastro de Notíciais</p>
    <!--Inicio do form-->
    <form action="" method="POST">
    <!--Titulo Portal-->
    Portal:<br/>
    <!--Inicio do select com nome dos portais cadastrados-->
        <select name="portal">
    <!--Insert dos portais no portal-->
            <?php foreach($portais as $portal): ?>
    <!--Busca um portal com o id e nome portal(nm_portal)-->
            <option value="<?=$portal['id_portal']?>"><?=$portal['nm_portal']?></option><br?>
        <?php endforeach; ?>
    <!--Final do select portal-->
        </select><br/>
    <!--Titulo da Noticia-->
    Título:<br/>
    <!--Inserir o titulo da noticia-->
        <input type="text" name="titulo" required="required"><br/>
    <!--Nome do Campo-->
    Conteúdo:<br/>
    <!--Inserir o conteudo da noticia-->
        <textarea name="conteudo" value="" rows="10" cols="30" required="required"></textarea><br/>
    <!--Nome do Campo-->
    Data:<br/>
    <!--Inserir a data da noticia-->
    <input type="date" name="data" required="required"><br/>
    <!--Nome do Campo-->
    Link:<br/>
    <!--Inserir o link da noticia http://globo.com/arquivo.html-->
        <input type="url" name="link" required="required"><br/>
    <!--Nome do Campo-->
    Imagem:<br/>
    <!--Inserir a imagem.jpg da noticia-->
        <input type="file" name="imagem" required="required"><br/>
    <!--Botao que envia todos os dados dos campos do formulario-->
        <input type="submit" value="Cadastrar">
    <!--Fim do formulario-->
</form> 
</center>
    <!--Inicio da tabela que vai apresentar as noticias-->           
<table cellpadding="0" cellspacing="0" border="1">
<!--Inicio da linha da tabela-->
<tr>
<!--Inicio do menu da linha da tabela-->                                
    <th>Portal</th>
    <th>Data</th>
    <th>Título</th>
    <th>Gravata</th>
    <th>Conteúdo</th>
    <th>Link</th>
<!--Fim do menu da linha da tabela-->
    <th>Opções</th>
<!--Fim da linha da tabela-->
</tr>
<!--Apresenta as noticias na tabela noticia-->
<?php foreach ($noticias as $noticia): ?>
<!--Inicio da linha da tabela-->
<tr>
<!--Inicio da coluna da tabela-->
    <td><?php echo Portal::getName($noticia['id_portal']) ?></td>
<!--Linha que apresenta as datas-->
    <td><?=$noticia['data']?></td>
<!--Linha que apresenta os titulos-->
    <td><?=$noticia['titulo']?></td>
<!--Linha que apresenta as gravatas da noticias-->
    <td><?=$noticia['gravata']?></td>
<!--Linha que apresenta os conteudos-->
    <td><?=$noticia['conteudo']?></td>
<!--Linha que apresenta os links da noticias-->
    <td><?=$noticia['link']?></td>
<!--Linha que apresenta os link de editar e deletar noticias-->
    <td>
<!--Link do arquivo editar noticias-->
        <a href="update_noticias.php?id=<?=$noticia['id_noticia']?>">Editar | </a>
        <!--Link do arquivo excluir noticias-->
        <a href="delete_noticias.php?id=<?=$noticia['id_noticia']?>">Excluir</a>
    </td>
<!--Fim das linhas da tabela-->   
</tr>
<?php endforeach; ?>
<!--Fechamento da Tabela-->
</table>
    </body>
</html>