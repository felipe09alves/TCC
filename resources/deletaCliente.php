<meta charset="UTF-8">
<?php

require_once('connect.php');

$sql = "DELETE FROM cliente WHERE id=".$_GET['id'];
$res = mysqli_query($connection, $sql) or die(mysqli_error($connection));


if ($res) {    
    header( "Location: ../template/Cliente.php" ); /* Redirect browser */
    exit();
} else {
    $fmsg = "Data not deleted, please try again later.";
}

if (isset($fmsg)) { ?>
    <div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div>
<?php } ?>

?>

