<?php
	require_once('session.php');
	$id = $_GET['cuid'];
    $query = mysqli_query($conn,"UPDATE `tb_produk` SET status = 0 WHERE cuid = '$id'") or die(mysqli_error());
    header('location:../product_apigames/');
?>