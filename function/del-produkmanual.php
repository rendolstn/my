<?php
	require_once('session.php');
	$id = $_GET['cuid'];
	$abc = $_GET['abc'];
	if($abc == 1 || $abc == 2){
		$query = mysqli_query($conn,"DELETE FROM `tb_produk` WHERE cuid = '$id'") or die(mysqli_error());
	}
	else {
		$query = mysqli_query($conn,"DELETE FROM `tb_prepaid` WHERE cuid = '$id'") or die(mysqli_error());
	}
    
    header('location:../product_manual/');
?>