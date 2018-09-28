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
    $sql = "SELECT cliente.*, estado.nome AS estado, cidade.nome AS cidade FROM cliente JOIN estado ON cliente.id_estado = estado.id JOIN cidade ON cliente.id_cidade = cidade.id WHERE cliente.id=".$id;
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

<?php } ?>