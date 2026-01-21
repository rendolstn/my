<?php
    require_once('session.php');
    $postID = $_POST['postID'];
    $image = $_POST['image'];
    $sorted = $_POST['sort'];
    $status = $_POST['status'];

    $query = mysqli_query($conn,"UPDATE `tb_jenis` SET `image` = '$image', `sort` = '$sorted', `status` ='$status' WHERE cuid = '$postID'") or die(mysqli_error());
    header('location:../jenis/?postID='.$postID.'&notif=2');
?>