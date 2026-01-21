<?php
ob_start();
session_start();
include('../config/koneksi.php');

error_reporting(0);
$sql_0 = mysqli_query($conn,"SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
$s0 = mysqli_fetch_array($sql_0);
$urlweb = $s0['urlweb'].'/backoffice';
$urlwebs = $s0['urlweb'];

if($_GET['id']){
	$parent = $_GET['id'];
    $sql_3 = mysqli_query($conn,"SELECT * FROM `tb_kategori` WHERE parent = '$parent' AND status = 1 ORDER BY kategori ASC") or die(mysqli_error());
    $no=0;
    while($s3 = mysqli_fetch_array($sql_3)){
        $no++;
?>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="kategori[]" value="<?php echo $s3['kategori']; ?>" id="defaultCheck<?php echo $no; ?>">
      <label class="form-check-label" for="defaultCheck<?php echo $no; ?>">
        <?php echo $s3['kategori']; ?>
      </label>
    </div>
<?php 
	}
}
?>