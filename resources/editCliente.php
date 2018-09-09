<meta charset="UTF-8">
<?php

function exibe() {

    require_once('connect.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM cliente WHERE id=".$id;
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    $r = mysqli_fetch_assoc($res);
    ?>

    <!-- <form method="post" onsubmit="altera()" class="main"> -->
        <h1 class="titulo">Alterar Cliente</h1>            
        <div class="row">
            <div class="col-md-1"></div>
            <div class="form-group col-md-6">
                <label for="nome">Nome:</label><span class="text-danger"></span>
                <input type="text" class="form-control campo" name="nome" value="<?php echo $r['nome']; ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="cpf">CPF:</label><span class="text-danger"></span>
                <input type="text" class="form-control campo" name="cpf" placeholder="000.000.000-00" value="<?php echo $r['cpf']; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="form-group col-md-6">
                <label for="email">e-mail:</label><span class="text-danger"></span>
                <input type="text" class="form-control campo" name="email" placeholder="e-mail" value="<?php echo $r['email']; ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="fone">Telefone:</label><span class="text-danger"></span>
                <input type="text" class="form-control campo" name="telefone" placeholder="(xx) xxxx-xxxx" value="<?php echo $r['telefone']; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="form-group col-md-2">
                <label for="uf">Estado:</label><span class="text-danger"></span>
                <select type="text" class="form-control campo" name="uf" placeholder="UF">
                    <option hidden selected value="<?php echo $r['uf']; ?>"><?php echo $r['uf']; ?></option>
                    <option value="DF">DF</option>
                    <option value="MG">MG</option>
                </select>
            </div>
            <div class="form-group col-md-7">
                <label for="cidade">Cidade:</label><span class="text-danger"></span>
                <input type="text" class="form-control campo" name="cidade" placeholder="Cidade" value="<?php echo $r['cidade']; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="form-group col-md-9">
                <label for="endereco">Endereço:</label><span class="text-danger"></span>
                <input type="text" class="form-control campo" name="endereco" placeholder="Endereço" value="<?php echo $r['endereco']; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="form-group col-md-9">
                <label for="imovel">Imóvel:</label><span class="text-danger"></span>
                <select type="text" class="form-control campo" name="imovel">
                    <option hidden selected value="<?php echo $r['imovel']; ?>"><?php echo $r['imovel']; ?></option>
                    <option value="comercial">Comercial</option>
                    <option value="residencial">Residencial</option>
                    <option value="rural">Rural</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7"></div>
            <div class="col-md-3" style="text-align: right">
                <button id="cadastrar" href="" type="submit" role="button" class="btn btn-outline-primary">
                    <i class="fas fa-pen"></i>&nbsp;Salvar Alterações
                </button>
            </div>
        </div>
    <!-- </form> -->

<?php
}

function altera() {

    require_once('connect.php');

    if (isset($_POST) & !empty($_POST)) {
        $nome = ($_POST['nome']);
        echo ($_POST['nome']);
        $cpf = ($_POST['cpf']);
        $email = ($_POST['email']);
        $telefone = ($_POST['telefone']);
        $uf =  ($_POST['uf']);
        $cidade =  ($_POST['cidade']);
        $endereco =  ($_POST['endereco']);
        $imovel =  ($_POST['imovel']);
    }

    $sql = "UPDATE cliente SET CPF = '$cpf', NOME = '$nome', EMAIL = '$email', TELEFONE = '$telefone', UF = '$uf', CIDADE = '$cidade', ENDERECO = '$endereco', IMOVEL =  '$imovel' WHERE CPF=".$cpf;
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if ($res) {
        $sql = "SELECT id FROM cliente WHERE CPF='".$cpf."'";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $r = mysqli_fetch_assoc($res);
        header( "Location: ../template/DetalhaCliente.php?id=".$r['id'] ); /* Redirect browser */
        exit();
    } else {
        $fmsg = "Data not inserted, please try again later.";
    } 
    
    if (isset($fmsg)) { ?>
        <div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div>
    <?php  } 

}


?>