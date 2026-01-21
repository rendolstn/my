<?php
    require_once('session.php');
    $postID = $_POST['userID'];
    $saldo_aktif = $_POST['saldo_aktif'];
    $saldo_pending = $_POST['saldo_pending'];
    $saldo_payout = $_POST['saldo_payout'];

    $query = mysqli_query($conn,"UPDATE `tb_balance` SET `active` = '$saldo_aktif', `pending` = '$saldo_pending', `payout` ='$saldo_payout' WHERE userID = '$postID'") or die(mysqli_error());
    header('location:../balance/?postID='.$postID.'&notif=2');
?>