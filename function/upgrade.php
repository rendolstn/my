<?php
	require_once('session.php');
    
    $upgrade = $_POST['upgrade'];
    if($upgrade == 0){
        $qty = 0;
    }
    else {
        $qty = $_POST['qty'];
    }
    
    $query = mysqli_query($conn,"UPDATE `tb_seo` SET `upgrade` = '$qty' WHERE cuid = 1") or die(mysqli_error());
    header('location:../upgrade/?notif=1');
?>