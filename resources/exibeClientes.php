<meta charset="UTF-8">
<?php

function lista() {
    
    require_once('connect.php');
    $sql = "SELECT * FROM cliente";
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    while ($r = mysqli_fetch_assoc($res)) { ?>
        
        <tr>
            <td style="text-align: center">
                <button type="button" class="btn" onclick="window.location.href='NovoOrcamento.html' ">
                    <i class="fas fa-plus-circle"></i>
                </button>
            </td>
            <td> <?php echo $r['cpf'] ?> </td>
            <td> <?php echo $r['nome'] ?> </td>
            <td> <?php echo $r['telefone'] ?> </td>
            <td>
                <button type="button" class="btn visualizar-btn" onclick="window.location.href='DetalhaCliente.php?id=<?php echo $r['id']; ?>'">
                    <span class="fas fa-eye"></span>
                </button>                
            </td>
        </tr>

    <?php } 

}

function detalha() {

    require('connect.php');
    $id = $_GET['id'];
    $sql = "SELECT cliente.*, estado.nome AS estado, cidade.nome AS cidade FROM cliente JOIN cidade ON cliente.id_cidade = cidade.id JOIN estado ON cidade.id_estado = estado.id WHERE cliente.id=".$id;
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    $r = mysqli_fetch_assoc($res); ?>
        
    <h4> <?php echo $r['nome'] ?> </h4>
    <span> <?php echo $r['cpf'] ?> </span>
    <span> <?php echo $r['email'] ?> </span>
    <span> <?php echo $r['telefone'] ?> </span>
    <span> <?php echo $r['estado'] ?> </span>
    <span> <?php echo $r['cidade'] ?> </span>
    <span> <?php echo $r['endereco'] ?> </span>
    <span> <?php echo $r['imovel'] ?> </span>

<?php 
    $id_cidade =  $r['id_cidade'];
    // echo $id_cidade;
    // $_POST($id_cidade);
} 

function checkIrradiacao($id) {

    require('connect.php');
    $sql_irradiacao = "SELECT irradiacao.id_cidade, cidade.id_estado as id_estado FROM irradiacao JOIN cidade ON irradiacao.id_cidade = cidade.id JOIN cliente ON cidade.id = cliente.id_cidade WHERE cliente.id = '$id';";
    $res_irradiacao = mysqli_query($connection, $sql_irradiacao) or die(mysqli_error($connection));

    
    if (mysqli_num_rows($res_irradiacao)!=0){
        echo  "<p id='cadastrado'>Indice de Irradiação Cadastrado <i class='fas fa-check text-success'></i></p>";
    }else {
        $sql = "SELECT cidade.id as id_cidade, cidade.id_estado as id_estado FROM cidade JOIN cliente ON cidade.id = cliente.id_cidade WHERE cliente.id = '$id';";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        $r = mysqli_fetch_assoc($res);
        echo  "<p id='nao-cadastrado'>Indice de Irradiação Não Cadastrado <i class='fas fa-times text-danger'></i><br><a href='./CadastrarIrradiacao.php?cidade=".$r['id_cidade']."&uf=".$r['id_estado']."'>Clique para cadastrar</a></p>";
    }   

}

function clienteContrato($id_contrato) {

    require('connect.php'); 

    $sql = "SELECT cliente.*, estado.nome AS estado, cidade.nome AS cidade FROM contrato JOIN orcamento ON contrato.id_orcamento = orcamento.id JOIN cliente ON orcamento.id_cliente = cliente.id JOIN cidade ON cliente.id_cidade = cidade.id JOIN estado ON cidade.id_estado = estado.id  WHERE contrato.id=".$id_contrato;
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    $r = mysqli_fetch_assoc($res); ?>
        
    <h4> <?php echo $r['nome'] ?> </h4>
    <span> <?php echo $r['cpf'] ?> </span>
    <span> <?php echo $r['email'] ?> </span>
    <span> <?php echo $r['telefone'] ?> </span>
    <span> <?php echo $r['estado'] ?> </span>
    <span> <?php echo $r['cidade'] ?> </span>
    <span> <?php echo $r['endereco'] ?> </span>
    <span> <?php echo $r['imovel'] ?> </span>

<?php }

