<meta charset="UTF-8">
<?php


    function irradiacao($id_cidade) {
        require('connect.php');
        $sql_irradiacao = "SELECT * FROM irradiacao WHERE id_cidade='$id_cidade'";
        $res_irradiacao = mysqli_query($connection, $sql_irradiacao) or die(mysqli_error($connection_irradiacao));
        
        $check=0;

        if (mysqli_num_rows($res_irradiacao)!=0){

            while ($r_irradiacao = mysqli_fetch_assoc($res_irradiacao)) {                 
                $irradiacao[$r_irradiacao['mes']] = floatval ( $r_irradiacao['indice'] );
            }
            // MARCA QUE ACHOU ENTRADA         
            $check=1;
            ?>
            <div class="col-md-3 div-mes preenchido">
            
                <span class="text-danger full-width"></span>
                <div>
                    <label for="jan">Jan:&nbsp;</label>
                    <input name="jan" type="number" class="form-control campo" value="<?php echo $irradiacao['jan']; ?>">
                    <span class="text-danger"></span>
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="fev">Fev:&nbsp;</label>
                    <input name="fev" type="number" class="form-control campo" value="<?php echo $irradiacao['fev']; ?>">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="mar">Mar:&nbsp;</label>
                    <input name="mar" type="number" class="form-control campo" value="<?php echo $irradiacao['mar']; ?>">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="abr">Abr:&nbsp;</label>
                    <input name="abr" type="number" class="form-control campo" value="<?php echo $irradiacao['abr']; ?>">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="mai">Mai:&nbsp;</label>
                    <input name="mai" type="number" class="form-control campo" value="<?php echo $irradiacao['mai']; ?>">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="jun">Jun:&nbsp;</label>
                    <input name="jun" type="number" class="form-control campo" value="<?php echo $irradiacao['jun']; ?>">
                </div>

            </div>
            <div class="col-md-3 div-mes">

                <span class="text-danger full-width"></span>
                <div>
                    <label for="jul">Jul:&nbsp;</label>
                    <input name="jul" type="number" class="form-control campo" value="<?php echo $irradiacao['jul']; ?>">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="ago">Ago:</label>
                    <input name="ago" type="number" class="form-control campo" value="<?php echo $irradiacao['ago']; ?>">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="set">Set:&nbsp;</label>
                    <input name="set" type="number" class="form-control campo" value="<?php echo $irradiacao['set']; ?>">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="out">Out:&nbsp;</label>
                    <input name="out" type="number" class="form-control campo" value="<?php echo $irradiacao['out']; ?>">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="nov">Nov:&nbsp;</label>
                    <input name="nov" type="number" class="form-control campo" value="<?php echo $irradiacao['nov']; ?>">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="dez">Dez:&nbsp;</label>
                    <input name="dez" type="number" class="form-control campo" value="<?php echo $irradiacao['dez']; ?>">
                </div>

            </div>

            <?php
        } else {
            // MARCA QUE NÃO ACHOU ENTRADO
            $check=0;
            ?>

            <div class="col-md-3 div-mes vazio">

                <span class="text-danger full-width"></span>
                <div>
                    <label for="jan">Jan:&nbsp;</label>
                    <input name="jan" type="number" class="form-control campo">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="fev">Fev:&nbsp;</label>
                    <input name="fev" type="number" class="form-control campo">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="mar">Mar:&nbsp;</label>
                    <input name="mar" type="number" class="form-control campo">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="abr">Abr:&nbsp;</label>
                    <input name="abr" type="number" class="form-control campo">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="mai">Mai:&nbsp;</label>
                    <input name="mai" type="number" class="form-control campo">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="jun">Jun:&nbsp;</label>
                    <input name="jun" type="number" class="form-control campo">
                </div>

            </div>
            <div class="col-md-3 div-mes">

                <span class="text-danger full-width"></span>
                <div>
                    <label for="jul">Jul:&nbsp;</label>
                    <input name="jul" type="number" class="form-control campo">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="ago">Ago:</label>
                    <input name="ago" type="number" class="form-control campo">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="set">Set:&nbsp;</label>
                    <input name="set" type="number" class="form-control campo">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="out">Out:&nbsp;</label>
                    <input name="out" type="number" class="form-control campo">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="nov">Nov:&nbsp;</label>
                    <input name="nov" type="number" class="form-control campo">
                </div>

                <span class="text-danger full-width"></span>
                <div>
                    <label for="dez">Dez:&nbsp;</label>
                    <input name="dez" type="number" class="form-control campo">
                </div>

            </div>

            <?php
        }        
        
    }

    function estado($estado) {
        require('connect.php');
        $sql_estado = "SELECT sigla FROM estado WHERE id=$estado";
        $res_estado = mysqli_query($connection, $sql_estado) or die(mysqli_error($connection_estado));
        
        while ($r_estado = mysqli_fetch_assoc($res_estado)) {        
            echo ("<option value='".$r_estado['id']."'>".$r_estado['sigla']."</option>");
        }
    }

    function cidade($cidade) {
        require('connect.php');
        $sql_cidade = "SELECT id, nome FROM cidade WHERE id=$cidade";
        $res_cidade = mysqli_query($connection, $sql_cidade) or die(mysqli_error($connection_cidade));
        
        while ($r_cidade = mysqli_fetch_assoc($res_cidade)) {        
            echo (' <input type=text" class="form-control" style="align-self: flex-end" value="'.$r_cidade['nome'].'" name="'.$r_cidade['id'].'" disabled>');
        }        
    }

?>