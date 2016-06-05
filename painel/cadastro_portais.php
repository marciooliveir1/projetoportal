<?php
include "../classes/portal.class.php";

$portal = new Portal();
$portais = $portal->getAll();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $site = $_POST['site'];
    if($nome!="" && $email!="" && $site != ""){
        
        $portal->nmPortal = $nome;
        $portal->site = $site;
        $portal->email = $email;
        $portal->save();
     echo "Cadastro efetuado com sucesso";
    }

}

?>
<a href="../index.php"><h2>Home</h2></a>
    <body>
    <center>

        <p>Cadastro dos Portais</p>

        <form action="" method="POST">
                    Nome:<br/>
                    <input type="text" name="nome" required="required">
                    <br/>
                    Site:<br/>
                    <input type="text" name="site" required="required">
                    <br/><br/>
                    E-mail:<br/>
                    <input  type="email" name="email" required="required">
                    <br/>
                    <input type="submit" value="Cadastrar">
                    <br/>
                    <br/>
            </form>
        <table cellpadding="0" cellspacing="0" border="1">

            <tr>                                
                <th>Nome</th>
                <th>Site</th>
                <th>Email</th>
                <th>Opções</th>
            </tr>
            <?php foreach($portais as $portal):?>
            <tr>                                
                <td><?=$portal['nm_portal']?></td>
                <td><?=$portal['site']?></td>
                <td><?=$portal['email']?></td>
                <td>
                    <a href="update_portais.php?id=<?=$portal['id_portal']?>">Editar | </a>

                    <a href="delete_portais.php?id=<?=$portal['id_portal']?>">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </center>
    </body>
</html>