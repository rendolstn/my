<?php
include('session.php');
error_reporting(0);
if(isset($_GET['periode'])){
  $periode = $_GET['periode'];
}
else {
  $periode = '';
}
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Laporan Saldo Member.xls");
 
// Tambahkan table
$bulan = array('JANUARI','FEBRUARI','MARET','APRIL','MEI','JUNI','JULI','AGUSTUS','SEPTEMBER','OKTOBER','NOVEMBER','DESEMBER');
$now = date('n')-1;
?>
<h3>LAPORAN SALDO MEMBER</h3>
<p>&nbsp;</p>
<table class="table table-hover">
  <thead>
    <tr>
        <th class="text-center" style="vertical-align: middle;">No</th>
        <th class="text-center" style="vertical-align: middle;">Member</th>
        <th class="text-center" style="vertical-align: middle;">Active</th>
        <th class="text-center" style="vertical-align: middle;">Payout</th>
    </tr>
  </thead>
  <tbody>
  	<?php
        $sql_1 = mysqli_query($conn,"SELECT a.*, b.* FROM tb_balance as a INNER JOIN tb_user as b ON a.userID = b.cuid ORDER BY b.full_name ASC") or die(mysqli_error());
        $no=0;
        while($s1 = mysqli_fetch_array($sql_1)){
            $no++;
            $sql_2 = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE cuid = '$IDuser'") or die(mysqli_error());
            $s2 = mysqli_fetch_array($sql_2);
    ?>
    <tr>
        <td class="text-center" style="vertical-align: middle;"><?php echo $no; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['full_name']; ?> (<?php echo $s1['user']; ?>)</td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['active']; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['payout']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>