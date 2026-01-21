<?php
    require_once('session.php');
    $id = $_GET['cuid'];
    $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_transaksi` WHERE cuid = '$id'") or die(mysqli_error());
    $s1 = mysqli_fetch_array($sql_1);
    $usersID = $s1['userID'];
    $amounts = $s1['total'];
    $trxID = $s1['kd_transaksi'];
    $created_date = date('Y-m-d H:i:s');
    
    $update = mysqli_query($conn,"UPDATE `tb_transaksi` SET `status` = 1 WHERE `cuid` = '$id'") or die(mysqli_error($conn));
    $update = mysqli_query($conn,"UPDATE `tb_tripay` SET `status` = 'PAID', paid_time = '$created_date' WHERE `merchant_ref` = '$trxID'") or die(mysqli_error($conn));
    $updateBalance = mysqli_query($conn,"UPDATE `tb_balance` SET `active` = active + '$amounts' WHERE `userID` = '$usersID'") or die(mysqli_error($conn));
    header('location:../topup/');
?>