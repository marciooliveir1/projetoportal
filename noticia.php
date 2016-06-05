<?php 
//dando os caminhos necessarios
if (!isset($_GET['id'])) header('Location: index.php');
require ('classes/noticia.class.php');
require ('classes/comentarios.class.php');
//criando uma nova noticia
$noticia = new Noticia();
$not = $noticia->getById($_GET['id']);
$comentarios = Comentarios::getByNoticiaIdAll($_GET['id']);
?>
<a href="./index.php"><h2>Home</h2></a>
<body >
    <!--Link da pasta e que será buscado para apresentar a visão da img.jpg-->
    <a href="#"><img src="imgnoticias/<?=$not['id_noticia']?>.jpg" alt=""></a><br/>
    <!--Mostra o titulo de uma noticia informado no cadastro da noticia-->
    <a href="#"><?=$not['titulo']?></a>
    <!--Mostra a data inserida no formulario de cadastro da noticia-->             
        <p><?=$not['data']?></p>
    <!--Mostra o conteudo inserido no formulario de cadastro da noticia-->
        <p><?=$not['conteudo']?></p>
    <!--Link que rediriciona a noticia conforme o link inserido no cadastro-->
        <p><a href="<?=$not['link']?>">Visitar Página da Notícia</a></p>
    <!--Apresenta o nome "Comentarios"--> 
    	<h2>Comentários</h2>
    <!--Apresentara todos os comentarios inseridos na noticia-->
        <?php if (count($comentarios)): foreach ($comentarios as $comentario):?>
    <!--Apresenta a imagem com o diretorio onde essa img.jpg esta armazenada-->
    <a href="#"><img src="images/avatar.jpg" alt=""></a>
    <!--Apresenta o email de quem fez o comentario-->
    <a href="#"><?=$comentario['email']?></a></p>
    <!--Apresenta o comentario-->
    <p><?=$comentario['comentario']?></p> 
        <?php endforeach; else: ?>
    <!--Apresenta todos os comentarios-->
        <p>Nenhum Comentário</p>
        <?php endif; ?>
    <!--Linha que separa os comentarios do formulario-->
        <hr>
    <!--Titulo para deixar o comentario-->                        
    	<h3>Deixe seu Comentário</h3>
    <!--Inicio do formulario e nome onde vai ser armazenado o comentario-->
    	<form action="adicionarcomentario.php" method="POST">
    <!--Titulo para colocar email@email.xxx-->
        E-mail:<br/>
        <input type="email" name="email" class="req"><br/>
    <!--Titulo para colocar o comentario-->       
        Comentário:<br/>
    <!--Aqui é escrito todo o comentário que o usuario queira comentar-->
        <textarea name="comentario" cols="55" rows="10"></textarea>
    <!--Insere o comentario conforme id da noticia-->
        <input type="hidden" name="id_noticia" value="<?=$_GET['id']?>"><br/><br/>
    <!--Campo enviar botao onde envia o comentario-->
        <input type="submit" value="Comentar">
    <!--Fechamento do formulario-->
        </form>
</body>
</html>
