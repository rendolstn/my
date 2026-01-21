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
header("Content-Disposition: attachment; filename=Laporan Penjualan Periode ".$periode.".xls");
 
// Tambahkan table
$bulan = array('JANUARI','FEBRUARI','MARET','APRIL','MEI','JUNI','JULI','AGUSTUS','SEPTEMBER','OKTOBER','NOVEMBER','DESEMBER');
$now = date('n')-1;
?>
<h3>LAPORAN PENJUALAN PERIODE <?php echo $periode; ?></h3>
<p>&nbsp;</p>
<table class="table table-hover">
  <thead>
    <tr>
        <th class="text-center" style="vertical-align: middle;">No</th>
        <th class="text-center" style="vertical-align: middle;">Date</th>
        <th class="text-center" style="vertical-align: middle;">TrxID</th>
        <th class="text-center" style="vertical-align: middle;">Customer</th>
        <th class="text-center" style="vertical-align: middle;">Product</th>
        <th class="text-center" style="vertical-align: middle;">Destination</th>
        <th class="text-center" style="vertical-align: middle;">Nickname / Customer ID</th>
        <th class="text-center" style="vertical-align: middle;">Note</th>
        <th class="text-center" style="vertical-align: middle;">Voucher</th>
        <th class="text-center" style="vertical-align: middle;">Discount</th>
        <th class="text-center" style="vertical-align: middle;">Capital Price</th>
        <th class="text-center" style="vertical-align: middle;">Selling Price</th>
        <th class="text-center" style="vertical-align: middle;">Quantity</th>
        <th class="text-center" style="vertical-align: middle;">Total Payment</th>
        <th class="text-center" style="vertical-align: middle;">Total Profit</th>
        <th class="text-center" style="vertical-align: middle;">Status</th>
    </tr>
  </thead>
  <tbody>
  	<?php
        $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_order` WHERE providerID != 11 AND created_date LIKE '$periode%' ORDER BY created_date DESC") or die(mysqli_error());
        $no=0;
        while($s1 = mysqli_fetch_array($sql_1)){
            $no++;
            $kd_transaksi = $s1['kd_transaksi'];
            $status = $s1['status'];
    ?>
    <tr>
        <td class="text-center" style="vertical-align: middle;"><?php echo $no; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['created_date']; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['kd_transaksi']; ?></td>
        <td class="text-center" style="vertical-align: middle;">
        	<?php echo $s1['full_name']; ?><br>
            <?php echo $s1['no_hp']; ?><br> 
            <?php echo $s1['email']; ?> 
        </td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['kategori']; ?> - <?php echo $s1['title']; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['userID']; ?> - <?php echo $s1['zoneID']; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['nickname']; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['note']; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['voucher']; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['potongan']; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['harga_modal']; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['harga_jual']; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['qty']; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['sub_total']; ?></td>
        <td class="text-center" style="vertical-align: middle;"><?php echo $s1['total_profit']; ?></td>
        <td class="text-center" style="vertical-align: middle;">
        	<?php
                if($status == 0){
                    echo '
                        MENUNGGU
                    ';
                }
                else if($status == 1){
                    echo '
                        DIPROSES
                    ';
                }
                else if($status == 2){
                    echo '
                        SELESAI
                    ';
                }
                else if($status == 3){
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