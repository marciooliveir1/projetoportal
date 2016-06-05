
<?php 

if ($_SERVER['REQUEST_METHOD'] != 'POST') header('Location: index.php');
require ('classes/noticia.class.php');

$noticia = new Noticia();

$noticias = $noticia->buscar($_POST['encontrar']);

 ?>

<body>
<li><a href="index.php"><h2>Home</h2></a></li>
<hr>
    	<?php  if (count($noticias)): foreach ($noticias as $not): ?>
			<a href="noticia.php?id=<?=$not['id_noticia']?>" class="w_hover">
					<img src="imgnoticias/<?=$not['id_noticia']?>.jpg" width="70" height="50" alt="">
            <a href="noticia.php?id=<?=$not['id_noticia']?>"><?=$not['gravata']?>...</a></p>
				<div class="date"><p><?=$not['data']?></p>
    <?php endforeach; else:?>  
    <h2>Nenhum Resultado Encontrado.</h2> 
    <?php endif; ?>          
    	<h4>Todos os Destaques</h4>                   
	</body>
</html>