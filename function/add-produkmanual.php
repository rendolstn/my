<?php
require_once('session.php');

$author = $u['full_name'];
$data = array('?php','select * from','join','inner join','left join','where = ','where=','disctint','<script>','</script>');
$created_date = date('Y-m-d');
$productCode = $_POST['productCode'];
$productName = $_POST['title'];                  
$harga_modal = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['harga_modal']);
$harga_jual = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['harga_jual']);
$harga_reseller = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['harga_reseller']);
$postID = $_POST['postID'];

if($postID == ''){
    $product_type = $_POST['product_type'];
    $productCat = $_POST['kategori'];
    $sql_3 = mysqli_query($conn,"SELECT * FROM `tb_kategori` WHERE cuid = '$productCat'") or die(mysqli_error());
    $s3 = mysqli_fetch_array($sql_3);
    $kategori = $s3['kategori'];
    $slug = $s3['slug'];
    $gamber = $s3['image'];
    $sql_jeniss = mysqli_query($conn,"SELECT * FROM `tb_jenis` WHERE cuid = '$product_type'") or die(mysqli_error());
    $sjj = mysqli_fetch_array($sql_jeniss);
    $jenisnyaa = $sjj['jenis'];
    if($jenisnyaa == 'Game'){
        $getProduk = mysqli_query($conn,"SELECT * FROM `tb_produk` WHERE jenis = 10 ORDER BY cuid DESC LIMIT 1") or die(mysqli_error());
        $gp = mysqli_num_rows($getProduk);
        if($gp == 0){
            $produkID = 100001;
        }
        else {
            $gpp = mysqli_fetch_array($getProduk);
            $produkID = $gpp['cuid'] + 1;
        }
        $query = mysqli_query($conn,"INSERT INTO `tb_produk` (`cuid`,`slug`, `code`, `title`, `kategori`, `harga_modal`, `harga_jual`, `harga_reseller`, `image`, `currency`, `status`, `created_date`, `jenis`, `product_type`) VALUES ('$produkID', '$slug','$productCode','$productName','$kategori','$harga_modal','$harga_jual','$harga_reseller','$gamber','','1','$created_date',10,'$product_type')") or die(mysqli_error($conn));
    }
    else if($jenisnyaa == 'Kartu Hadiah'){
        $getProduk = mysqli_query($conn,"SELECT * FROM `tb_produk` WHERE jenis = 10 ORDER BY cuid DESC LIMIT 1") or die(mysqli_error());
        $gp = mysqli_num_rows($getProduk);
        if($gp == 0){
            $produkID = 100001;
        }
        else {
            $gpp = mysqli_fetch_array($getProduk);
            $produkID = $gpp['cuid'] + 1;
        }
        $query = mysqli_query($conn,"INSERT INTO `tb_produk` (`cuid`,`slug`, `code`, `title`, `kategori`, `harga_modal`, `harga_jual`, `harga_reseller`, `image`, `currency`, `status`, `created_date`, `jenis`, `product_type`) VALUES ('$produkID', '$slug','$productCode','$productName','$kategori','$harga_modal','$harga_jual','$harga_reseller','$gamber','','1','$created_date',10,'$product_type')") or die(mysqli_error($conn));
    }
    else if($jenisnyaa == 'Pulsa'){
        $getProduk = mysqli_query($conn,"SELECT * FROM `tb_prepaid` WHERE jenis = 10 ORDER BY cuid DESC LIMIT 1") or die(mysqli_error());
        $gp = mysqli_num_rows($getProduk);
        if($gp == 0){
            $produkID = 100001;
        }
        else {
            $gpp = mysqli_fetch_array($getProduk);
            $produkID = $gpp['cuid'] + 1;
        }
        $query = mysqli_query($conn,"INSERT INTO `tb_prepaid` (`cuid`, `slug`, `code`, `title`, `kategori`, `brand`, `harga_modal`, `harga_jual`, `harga_reseller`, `image`, `status`, `created_date`, `jenis`, `product_type`) VALUES ('$produkID', '$slug','$productCode','$productName', 'Pulsa','$kategori','$harga_modal','$harga_jual','$harga_reseller','$gamber','1','$created_date',10,'$product_type')") or die(mysqli_error($conn));
    }
    else if($jenisnyaa == 'Emoney'){
        $getProduk = mysqli_query($conn,"SELECT * FROM `tb_prepaid` WHERE jenis = 10 ORDER BY cuid DESC LIMIT 1") or die(mysqli_error());
        $gp = mysqli_num_rows($getProduk);
        if($gp == 0){
            $produkID = 100001;
        }
        else {
            $gpp = mysqli_fetch_array($getProduk);
            $produkID = $gpp['cuid'] + 1;
        }
        $query = mysqli_query($conn,"INSERT INTO `tb_prepaid` (`cuid`, `slug`, `code`, `title`, `kategori`, `brand`, `harga_modal`, `harga_jual`, `harga_reseller`, `image`, `status`, `created_date`, `jenis`, `product_type`) VALUES ('$produkID', '$slug','$productCode','$productName', 'E-Money','$kategori','$harga_modal','$harga_jual','$harga_reseller','$gamber','1','$created_date',10,'$product_type')") or die(mysqli_error($conn));
    }
    else if($jenisnyaa == 'Premium'){
        $getProduk = mysqli_query($conn,"SELECT * FROM `tb_produk` WHERE jenis = 10 ORDER BY cuid DESC LIMIT 1") or die(mysqli_error());
        $gp = mysqli_num_rows($getProduk);
        if($gp == 0){
            $produkID = 100001;
        }
        else {
            $gpp = mysqli_fetch_array($getProduk);
            $produkID = $gpp['cuid'] + 1;
        }
        $query = mysqli_query($conn,"INSERT INTO `tb_produk` (`cuid`,`slug`, `code`, `title`, `kategori`, `harga_modal`, `harga_jual`, `harga_reseller`, `image`, `currency`, `status`, `created_date`, `jenis`, `product_type`) VALUES ('$produkID', '$slug','$productCode','$productName','$kategori','$harga_modal','$harga_jual','$harga_reseller','$gamber','','1','$created_date',10,'$product_type')") or die(mysqli_error($conn));
    }
    
    header('location:../product_manual/?do=add&notif=1');
    exit();
}
else {
    $product_type = $_POST['product_type'];
    $sql_jeniss = mysqli_query($conn,"SELECT * FROM `tb_jenis` WHERE cuid = '$product_type'") or die(mysqli_error());
    $sjj = mysqli_fetch_array($sql_jeniss);
    $jenisnyaa = $sjj['jenis'];
    if($jenisnyaa == 'Game'){
        $getProduk = mysqli_query($conn,"SELECT * FROM `tb_produk` WHERE jenis = 10 ORDER BY cuid DESC LIMIT 1") or die(mysqli_error());
        $gp = mysqli_num_rows($getProduk);
        if($gp == 0){
            $produkID = 100001;
        }
        else {
            $gpp = mysqli_fetch_array($getProduk);
            $produkID = $gpp['cuid'] + 1;
        }
        $query = mysqli_query($conn,"UPDATE `tb_produk` SET `code` = '$productCode', `title` = '$productName', `harga_modal` = '$harga_modal', `harga_jual` = '$harga_jual', `harga_reseller` = '$harga_reseller' WHERE cuid = '$postID'") or die(mysqli_error());
    }
    else if($jenisnyaa == 'Kartu Hadiah'){
        $getProduk = mysqli_query($conn,"SELECT * FROM `tb_produk` WHERE jenis = 10 ORDER BY cuid DESC LIMIT 1") or die(mysqli_error());
        $gp = mysqli_num_rows($getProduk);
        if($gp == 0){
            $produkID = 100001;
        }
        else {
            $gpp = mysqli_fetch_array($getProduk);
            $produkID = $gpp['cuid'] + 1;
        }
        $query = mysqli_query($conn,"UPDATE `tb_produk` SET `code` = '$productCode', `title` = '$productName', `harga_modal` = '$harga_modal', `harga_jual` = '$harga_jual', `harga_reseller` = '$harga_reseller' WHERE cuid = '$postID'") or die(mysqli_error());
    }
    else if($jenisnyaa == 'Pulsa'){
        $getProduk = mysqli_query($conn,"SELECT * FROM `tb_prepaid` WHERE jenis = 10 ORDER BY cuid DESC LIMIT 1") or die(mysqli_error());
        $gp = mysqli_num_rows($getProduk);
        if($gp == 0){
            $produkID = 100001;
        }
        else {
            $gpp = mysqli_fetch_array($getProduk);
            $produkID = $gpp['cuid'] + 1;
        }
        $query = mysqli_query($conn,"UPDATE `tb_prepaid` SET `code` = '$productCode', `title` = '$productName', `harga_modal` = '$harga_modal', `harga_jual` = '$harga_jual', `harga_reseller` = '$harga_reseller' WHERE cuid = '$postID'") or die(mysqli_error());
    }
    else if($jenisnyaa == 'Emoney'){
        $getProduk = mysqli_query($conn,"SELECT * FROM `tb_prepaid` WHERE jenis = 10 ORDER BY cuid DESC LIMIT 1") or die(mysqli_error());
        $gp = mysqli_num_rows($getProduk);
        if($gp == 0){
            $produkID = 100001;
        }
        else {
            $gpp = mysqli_fetch_array($getProduk);
            $produkID = $gpp['cuid'] + 1;
        }
        $query = mysqli_query($conn,"UPDATE `tb_prepaid` SET `code` = '$productCode', `title` = '$productName', `harga_modal` = '$harga_modal', `harga_jual` = '$harga_jual', `harga_reseller` = '$harga_reseller' WHERE cuid = '$postID'") or die(mysqli_error());
    }
    else if($jenisnyaa == 'Premium'){
        $getProduk = mysqli_query($conn,"SELECT * FROM `tb_produk` WHERE jenis = 10 ORDER BY cuid DESC LIMIT 1") or die(mysqli_error());
        $gp = mysqli_num_rows($getProduk);
        if($gp == 0){
            $produkID = 100001;
        }
        else {
            $gpp = mysqli_fetch_array($getProduk);
            $produkID = $gpp['cuid'] + 1;
        }
        $query = mysqli_query($conn,"UPDATE `tb_produk` SET `code` = '$productCode', `title` = '$productName', `harga_modal` = '$harga_modal', `harga_jual` = '$harga_jual', `harga_reseller` = '$harga_reseller' WHERE cuid = '$postID'") or die(mysqli_error());
    }
    
    header('location:../product_manual/?do=add&catID='.$postID.'&notif=1');
    exit();
}

?>