<?php 
    require_once('../resources/session.php');
    require('../resources/connect.php');

    $id_os = $_GET['id_os'];
    
    $sql_OS = "SELECT * FROM OS WHERE ID='$id_os'";
    $res_OS = mysqli_query($connection, $sql_OS) or die(mysqli_error($connection));
    $r_os = mysqli_fetch_assoc($res_OS);

    $abertura = ($r_os['data_abertura']);
    $duracao = ($r_os['prazo']) * 2;

    $previsao = date("d/m/Y", strtotime($abertura."+$duracao hours"));
    $abertura = date("d/m/Y", strtotime($abertura));

    $eletricistas = ($r_os['eletricistas']);

    


    // echo $eletricistas;
    // echo $id_os;

    function atividades($connection, $os) {

        $sql_Atividades = "SELECT * FROM ATIVIDADE WHERE ID_OS='$os';";
        $res_Atividades = mysqli_query($connection, $sql_Atividades) or die(mysqli_error($connection));

        $i = 0;
        while ($r = mysqli_fetch_assoc($res_Atividades)) {
            $descricao[$i] = $r['descricao'];
            $duracao[$i] = $r['duracao'];
            $situacao[$i] = $r['situacao'];
            $duracao_real[$i] = $r['duracao_real'];
            $justificativa[$i] = $r['justificativa'];
            $id[$i] = $r['id'];
            
            ?>

<?php  ?>
            <tr id="atividade-<?php echo $id[0]; ?>">

                <td class="checkbox-finalizada">
                    <div class="form-check">

                        <input type="checkbox" class="form-check-input situacao" name="check[<?php echo $id[$i] ?>]" value="checked" 
                            <?php if ( $situacao[$i] == 1 ) { 
                                echo 'checked onclick="return false;"';
                            } ?>
                        >

                    </div>
                </td>

                <td>

                    <?php echo $descricao[$i];
                        if ( $situacao[$i] == 1 ) { ?>

                            <div class="justificativa">
                                <span>Justificativa:</span>
                                <textarea class="form-control justificativa campo" name="justificativa[<?php echo $id[$i] ?>]" rows="2" readonly><?php echo $justificativa[$i] ?></textarea>
                                <span class="text-danger"></span>
                            </div>

                    <?php }else {?>

                            <div class="justificativa" hidden>
                                <span>Justificativa:</span>
                                <textarea class="form-control justificativa campo" disabled name="justificativa[<?php echo $id[$i] ?>]" rows="2"></textarea>
                                <span class="text-danger"></span>
                            </div>

                    <?php } ?>

                </td>

                <td><span class="duracao" ><?php echo $duracao[$i] ?></span> horas</td>

                <td>

                    <?php
                        if ( $situacao[$i] == 1 ) { 
                            echo '<input type="number" class="form-control duracao_real campo" value="'.$duracao_real[$i].'" name="duracao_real['.$id[$i].']" readonly><span class="text-danger"></span>';
                        } else {
                            echo '<input type="number" class="form-control duracao_real campo" value="" name="duracao_real['.$id[$i].']" disabled><span class="text-danger"></span>';
                        } ?>
                
                </td>

            </tr>

            <?php
            $i++;
        }
        // return $i;
    }
    


    