<?php
	require_once('session.php');
	$id = $_GET['postID'];
	$status = $_GET['populer'];
	if($status == 0){
		$statusnya = 1;
		$getPopuler = mysqli_query($conn,"SELECT * FROM `tb_kategori` WHERE populer = 1 ORDER BY sort DESC LIMIT 1") or die(mysqli_error());
		$gpp = mysqli_num_rows($getPopuler);
		if($gpp == 0){
		    $sorts = 1;
		}
		else {
		   $gp = mysqli_fetch_array($getPopuler);
		   $sorts = $gp['sort'] + 1; 
		}
	}
	else if($status == 1) {
		$statusnya = 0;
		$sorts = 0;
	}
    $query = mysqli_query($conn,"UPDATE `tb_kategori` SET `populer` = '$statusnya', `sort` = '$sorts' WHERE cuid = '$id'") or die(mysqli_error());
    header('location:../category/');
?>