<?php
	require_once('session.php');
	$postID = $_GET['postID'];
	$jenisnya = $_GET['jenis'];
	if($jenisnya == 1){
		$delete = mysqli_query($conn,"DELETE FROM `tb_produk` WHERE jenis  = '$postID' AND product_type = 1") or die(mysqli_error($conn));
	}
	else if($jenisnya == 2){
		$delete = mysqli_query($conn,"DELETE FROM `tb_prepaid` WHERE jenis  = '$postID'") or die(mysqli_error($conn));
	}
	else if($jenisnya == 3){
		$delete = mysqli_query($conn,"DELETE FROM `tb_produk_social` WHERE jenis  = '$postID'") or die(mysqli_error($conn));
	}
	else if($jenisnya == 4){
		$delete = mysqli_query($conn,"DELETE FROM `tb_produk` WHERE jenis  = '$postID' AND product_type = 2") or die(mysqli_error($conn));
	}
	else if($jenisnya == 5){
		$delete = mysqli_query($conn,"DELETE FROM `tb_pascabayar` WHERE jenis  = '$postID'") or die(mysqli_error($conn));
	}
    
    header('location:../service/?notif=2');
?>