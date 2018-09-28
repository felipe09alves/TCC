<meta charset="UTF-8">
<?php

require_once('connect.php');

$id = $_GET['id'];
$sql = "SELECT cliente.*, estado.sigla AS estado, cidade.nome AS cidade FROM cliente JOIN estado ON cliente.id_estado = estado.id JOIN cidade ON cliente.id_cidade = cidade.id WHERE cliente.id=".$id;
$res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$r = mysqli_fetch_assoc($res);
?>


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
            <option hidden selected value="<?php echo $r['id_estado']; ?>"><?php echo $r['estado']; ?></option>
            
            <?php 
            $sql_estado = "SELECT * FROM estado";
            $res_estado = mysqli_query($connection, $sql_estado) or die(mysqli_error($connection_estado));

            while ($r_estado = mysqli_fetch_assoc($res_estado)) { 
                
                echo ("<option value='".$r_estado['id']."'>".$r_estado['sigla']."</option>");
            }
            ?>

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
    
