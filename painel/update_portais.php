<?php
//Redireciona para o arquivo cadastro_portais.php
if(!isset($_GET['id'])) header('Location: cadastro_portais.php');
//Chamada do portal.class que está dento da pasta classes
require ("../classes/portal.class.php");
$portal = new Portal();
$portais = $portal->getAll();

$portal->get($_GET['id']);
//Metodo de requisição enviado para o servidor
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $site = $_POST['site'];
    if($nome != "" && $email != "" && $site != ""){
        $portal->nmPortal = $nome;
        $portal->site = $site;
        $portal->email = $email;
        $portal->update();
//Redireciona para o arquivo cadastro_portais.php
        header('Location: cadastro_portais.php');

    echo 'Cadastrado com sucesso';
    }
}
?>
    <body>

            <h2>Cadastro - Portais</h2>
            <div class="separator" style="height:39px;"></div>

            <div class="block_registration">
                <form action="" method="POST" class="w_validation">
                    <div class="col_1">
                        <div class="form-group">
                            <label for="usr"><p>Nome<span>*</span>: </p></label>
                            <input required="required"  type="text" name="nome" class="form-control" value="<?=$portal->nmPortal?>" id="usr">
                        </div>

                        <div class="form-group">
                            <label for="usr"><p>E-mail<span>*</span>: </p></label>
                            <input required="required"  type="email" name="email" class="form-control" value="<?=$portal->email?>" id="usr">
                        </div>

                    </div>

                    <div class="col_2">
                        <div class="form-group">
                            <label for="usr"><p>Site<span>*</span>: </p></label>
                            <input required="required"  type="text" name="site" class="form-control" value="<?=$portal->site?>" id="usr">
                        </div>

                    </div>
                    <div class="col-md-2 col-md-offset-5" >
                        <p class="info_text"><?=$msg?></p>
                        <p class="info_text"><input type="submit" class="general_button" value="Atualizar"></p>
                    </div>
                    
                </form>
            </div>

            <div class="line_3" style="margin:42px 0px 0px;"></div>
        </div>                        
    </div>
</div>
</body>
</html>