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
    echo $id_cidade;
    // $_POST($id_cidade);
} 

    function checkIrradiacao($id_cidade) {

        require('connect.php');
        $sql_irradiacao = "SELECT irradiacao.id_cidade FROM irradiacao JOIN cidade ON irradiacao.id_cidade = cidade.id JOIN cliente ON cidade.id = cliente.id_cidade WHERE cliente.id = '$id_cidade';";
        $res_irradiacao = mysqli_query($connection, $sql_irradiacao) or die(mysqli_error($connection));

        if (mysqli_num_rows($res_irradiacao)!=0){
            echo  "<p id='cadastrado'>Indice de Irradiação Cadastrado <i class='fas fa-check text-success'></i></p>";
        }else {
            echo  "<p id='nao-cadastrado'>Indice de Irradiação Não Cadastrado <i class='fas fa-times text-danger'></i><br><a href=''>Clique para cadastrar</a></p>";
        }   

    }

?>