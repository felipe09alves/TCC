
<?php

    $busca = $_GET['campo-busca'];
    $uf = $_GET['uf'];
    require('connect.php');
    
    $sql = "SELECT * FROM cidade WHERE id_estado = '$uf' AND LOWER(nome) LIKE LOWER(_utf8'%$busca%') collate utf8_general_ci;";
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($res)) {
        lista($res);
    } else {
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
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Irradiação</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            <?php while ($r = mysqli_fetch_assoc($res)) { ?>
                
                <tr>
                    <td style="vertical-align: middle; text-align: center;"> <?php buscaEstado ($r['id_estado']); ?> </td>
                    <td style="vertical-align: middle;"> <?php echo $r['nome'] ?> </td>                   
                    <td style="vertical-align: middle; text-align: center;">
                        <!-- <i class="fas fa-"></i> -->
                        <?php echo checkIrradiacao($r['id']) ?>
                    </td>
                    <td style="vertical-align: middle">
                        <button type="button" class="btn visualizar-btn" onclick="window.location.href='CadastrarIrradiacao.php?cidade=<?php echo $r['id'].'&uf='.$r['id_estado']; ?>'">
                            <span class="fas fa-eye"></span>
                        </button>
                    </td>
                </tr>

            <?php } ?>

            </tbody>
        </table>

<?php
    }

    function buscaEstado ($id_estado) {

        require('connect.php');
        $sql = "SELECT * FROM estado WHERE id = '$id_estado'";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        $r = mysqli_fetch_assoc($res);

        echo $r['sigla'];

    }

    function checkIrradiacao($id_cidade) {

        require('connect.php');
        $sql_irradiacao = "SELECT * FROM irradiacao WHERE id_cidade = '$id_cidade';";
        $res_irradiacao = mysqli_query($connection, $sql_irradiacao) or die(mysqli_error($connection));

        if (mysqli_num_rows($res_irradiacao)!=0){
            return  "<i class='fas fa-check text-success'></i>";
        }else {
            return  "<i class='fas fa-times text-danger'></i>";
        }   

    }
?>