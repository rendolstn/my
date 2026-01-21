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
header("Content-Disposition: attachment; filename=Laporan Top Up Saldo Periode ".$periode.".xls");
 
// Tambahkan table
$bulan = array('JANUARI','FEBRUARI','MARET','APRIL','MEI','JUNI','JULI','AGUSTUS','SEPTEMBER','OKTOBER','NOVEMBER','DESEMBER');
$now = date('n')-1;
?>
<h3>LAPORAN TOPUP SALDO PERIODE <?php echo $periode; ?></h3>
<p>&nbsp;</p>
<table class="table table-hover">
  <thead>
    <tr>
        <th class="text-center" style="vertical-align: middle;">No</th>
        <th class="text-center" style="vertical-align: middle;">Date</th>
        <th class="text-center" style="vertical-align: middle;">TrxID</th>
        <th class="text-center" style="vertical-align: middle;">Username</th>
        <th class="text-center" style="vertical-align: middle;">Phone Number</th>
        <th class="text-center" style="vertical-align: middle;">Amount</th>
        <th class="text-center" style="vertical-align: middle;">Note</th>
        <th class="text-center" style="vertical-align: middle;">Status</th>
    </tr>
  </thead>
  <tbody>
  	<?php
        $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_transaksi` WHERE providerID = 0 AND status = 1 ORDER BY date DESC") or die(mysqli_error());
        $no=0;
        while($s1 = mysqli_fetch_array($sql_1)){
            $no++;
            $kd_transaksi = $s1['kd_transaksi'];
            $status = $s1['status'];
            $usersID = $s1['userID'];

    ?>
    <tr>
        <td class="text-center" style="vertical-align: middle;"><?php echo $no; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['date']; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['kd_transaksi']; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s2['user']; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s2['no_hp']; ?></td>
        <td class="text-right" style="vertical-align: middle;"><?php echo number_format($s1['total']); ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['note']; ?></td>
        <td class="text-center" style="vertical-align: middle;">
            <?php
                if($status == 0){
                    echo '
                        MENUNGGU
                    ';
                }
                else if($status == 1){
                    echo '
                        SELESAI
                    ';
                }
                else{
                   echo '
                        GAGAL
                    ';
                }
            ?>
        </td>
    </tr>
    <?php } ?>
  </tbody>
</table>