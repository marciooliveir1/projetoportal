<?php 
include 'include/principal.php';
include 'classes/noticia.class.php';

$noticia = new Noticia();

$noticias = $noticia->getAll();

 ?>
    <body>
    <center>
        <?php foreach ($noticias as $not): ?>
                <a href="noticia.php?id=<?=$not['id_noticia']?>">
                    <img src="imgnoticias/<?=$not['id_noticia']?>.jpg" width="120" height="90" alt="">
                    <span></span>
                </a>
                <a href="noticia.php?id=<?=$not['id_noticia']?>"><?=$not['gravata']?>...</a></p>
                <p><?=$not['data']?></p>
        <?php endforeach; ?> 
        </center>            
    </body>
</html>
