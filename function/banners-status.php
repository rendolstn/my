<?php
	require_once('session.php');
	$id = $_GET['postID'];
	$status = $_GET['status'];
	if($status == 0){
		$statusnya = 'true';
	}
	else if($status == 1) {
		$statusnya = 'false';
	}
    $query = mysqli_query($conn,"UPDATE `tb_banners` SET status = '$statusnya' WHERE cuid = '$id'") or die(mysqli_error());
    header('location:../popup_product/');
?>