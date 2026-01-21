<?php
	require_once('session.php');
	$id = $_GET['postID'];
    $query = mysqli_query($conn,"UPDATE `tb_user` SET level = 'user' WHERE cuid = '$id'") or die(mysqli_error());
    header('location:../reseller/');
?>