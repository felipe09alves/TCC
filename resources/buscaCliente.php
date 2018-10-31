
<?php

    $busca = $_GET['campo-busca'];
    require_once('connect.php');
    
    $sql = "SELECT * FROM cliente WHERE LOWER(nome) LIKE LOWER(_utf8'%$busca%') collate utf8_general_ci;";
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($res)) {
        lista($res);
    } else {         
        $sql = "SELECT * FROM cliente where cpf='$busca'";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        if (mysqli_num_rows($res)) {
            lista($res);
        }else {
            echo ("<h4>Nenhum registro encontrado.</h4>");
        }            
    }

    function lista($res) { ?>

        <table class="table-hover table-responsive animate-bottom">
            <thead>
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            <?php while ($r = mysqli_fetch_assoc($res)) { ?>
                
                <tr>
                    <td style="vertical-align: middle"> <?php echo $r['cpf'] ?> </td>
                    <td style="vertical-align: middle"> <?php echo $r['nome'] ?> </td>
                    <td style="vertical-align: middle"> <?php echo $r['telefone'] ?> </td>
                    <td style="vertical-align: middle">
                        <button type="button" class="btn visualizar-btn" onclick="window.location.href='DetalhaCliente.php?id=<?php echo $r['id']; ?>'">
                            <span class="fas fa-eye"></span>
                        </button>                
                    </td>
                </tr>

            <?php } ?>

            </tbody>
        </table>

<?php
    }
?>