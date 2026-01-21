<?php
require_once('session.php');

$author = $u['full_name'];
$data = array('?php','select * from','join','inner join','left join','where = ','where=','disctint','<script>','</script>');
$created_date = date('Y-m-d');
$productCode = $_POST['productCode'];
$productName = $_POST['title'];
$productCat = $_POST['kategori'];
$sql_3 = mysqli_query($conn,"SELECT * FROM `tb_kategori` WHERE cuid = '$productCat'") or die(mysqli_error());
$s3 = mysqli_fetch_array($sql_3);
$kategori = $s3['kategori'];
$slug = strtolower(str_replace(' ','',$kategori));
$gamber = $s3['image'];                  
$harga_modal = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['harga_modal']);
$harga_jual = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['harga_jual']);
$harga_reseller = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['harga_reseller']);
$postID = $_POST['postID'];

if($postID == ''){
    $getProduk = mysqli_query($conn,"SELECT * FROM `tb_produk` WHERE jenis = 11 ORDER BY cuid DESC LIMIT 1") or die(mysqli_error());
    $gp = mysqli_num_rows($getProduk);
    if($gp == 0){
        $produkID = 110001;
    }
    else {
        $gpp = mysqli_fetch_array($getProduk);
        $produkID = $gpp['cuid'] + 1;
    }
    $query = mysqli_query($conn,"INSERT INTO `tb_produk` (`cuid`,`slug`, `code`, `title`, `kategori`, `harga_modal`, `harga_jual`, `harga_reseller`, `image`, `currency`, `status`, `created_date`, `jenis`, `product_type`) VALUES ('$produkID', '$slug','$productCode','$productName','$kategori','$harga_modal','$harga_jual','$harga_reseller','$gamber','','1','$created_date',11,1)") or die(mysqli_error($conn));
    header('location:../product_joki/?do=add&notif=1');
    exit();
}
else {
    $query = mysqli_query($conn,"UPDATE `tb_produk` SET `code` = '$productCode', `title` = '$productName', `harga_modal` = '$harga_modal', `harga_jual` = '$harga_jual', `harga_reseller` = '$harga_reseller' WHERE cuid = '$postID'") or die(mysqli_error());
    
    header('location:../product_joki/?do=add&catID='.$postID.'&notif=1');
    exit();
}

?>