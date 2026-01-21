<?php
    require_once('session.php');

    $users = $u['user'];
    $nominal = $_POST['nominal'];
    $satuan = $_POST['satuan'];
    $jenisnya = $_POST['product_type'];
    $status = $_POST['status'];
    $postID = $_POST['postID'];

    if($postID == ''){
        for($i=0;$i<COUNT($_POST['kategori']);$i++){
            $kategori = $_POST['kategori'][$i];
                
            $insert = mysqli_query($conn,"INSERT INTO `tb_diskon` (`kategori`, `diskon`, `satuan`, `status`) VALUES ('$kategori','$nominal','$satuan','$status')") or die(mysqli_error());   
        }
        header('location:../diskon/?notif=1');
    }
    else {
        $insert = mysqli_query($conn,"UPDATE `tb_diskon` SET `diskon` = '$nominal', `satuan` = '$satuan', `status` = '$status' WHERE cuid = '$postID'") or die(mysqli_error());
        header('location:../diskon/?catID='.$postID.'&notif=1');
    }
?>