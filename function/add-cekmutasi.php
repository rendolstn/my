<?php
	require_once('session.php');

    $users = $u['user'];
    $apikey = $_POST['apikey'];
    $merchant_code = $_POST['merchant_code'];
    $status = $_POST['status'];
    $join_date = date('Y-m-d');
    $query = mysqli_query($conn,"UPDATE `tb_tripayapi` SET `api_key` = '$apikey', `merchant_code` = '$merchant_code', `status` = '$status' WHERE cuid = 7") or die(mysqli_error());
    header('location:../cekmutasi/?notif=1');
?>