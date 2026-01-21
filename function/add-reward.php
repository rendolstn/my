<?php
    require_once('session.php');

    $users = $u['user'];
    $title = strtolower($_POST['title']);
    $nominal = $_POST['nominal'];
    $kuota = $_POST['kuota'];
    $satuan = $_POST['satuan'];
    $jenisnya = $_POST['product_type'];
    $minOrder = $_POST['min_order'];
    $status = $_POST['status'];
    $postID = $_POST['postID'];

    $query = mysqli_query($conn,"INSERT INTO `tb_reward` (`title`, `nominal`, `min_order`, `kuota`, `satuan`, `jenis`, `status`) VALUES ('$title', '$nominal', '$minOrder', '$kuota', '$satuan', '$jenisnya', '$status')") or die(mysqli_error($conn));
    for($i=0;$i<COUNT($_POST['kategori']);$i++){
        $kategori = $_POST['kategori'][$i];
            
        $insert = mysqli_query($conn,"INSERT INTO `tb_reward_produk` (`title`, `kategori`) VALUES ('$title', '$kategori')") or die(mysqli_error());   
    }
    header('location:../voucher/?notif=1');
?>