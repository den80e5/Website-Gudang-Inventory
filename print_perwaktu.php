<?php 
require 'koneksi/koneksi.php';

$ambil_spk=$koneksi->query("SELECT * FROM form_pengajuan WHERE tgl_diajukan='$_GET[waktu]'");
$tampilkan_sesuai_spk=$ambil_spk->fetch_assoc();
date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Invoice Print PerWaktu</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->


              <div class="card-body">
                <small class="float-right position-absolute" style="top: 10px;
    right: 10px;">Form dibuat oleh : <?php echo $tampilkan_sesuai_spk['pengaju']; ?></small>
                <table class="table table-borderless table-sm mb-3">
                  <h5 class="text-center font-weight-bold">FORM PENGAMBILAN BARANG GUDANG TINTA</h5>
                  <h5 class="text-center font-weight-bold">PT.DLL</h5>
                  <h6 class="text-center">TR.<?php echo $tampilkan_sesuai_spk['kode_form']; ?></h6>
                  <tbody class="h5">
                    <tr>
                      <td style="width: 150px">No Mesin</td>
                      <td style="width: 10px">:</td>
                      <td style="width: 180px"><?php echo $tampilkan_sesuai_spk['no_mesin']; ?></td>
                      <td></td>
                      <td style="width: 150px">Tanggal Form Dibuat</td>
                      <td style="width: 10px">:</td>
                      <td style="width: 180px"><?php echo $tampilkan_sesuai_spk['tgl_diajukan']; ?></td>
                    </tr>
                    <tr>
                      <td style="width: 150px">Nama Order</td>
                      <td style="width: 10px">:</td>
                      <td style="width: 180px"><?php echo $tampilkan_sesuai_spk['nama_order']; ?></td>
                      <td></td>
                      <td style="width: 150px">No SO</td>
                      <td style="width: 10px">:</td>
                      <td style="width: 180px"><?php echo $tampilkan_sesuai_spk['no_spk']; ?></td>
                    </tr>

                  </tbody>
                </table>

                <table class="table table-striped text-center h5 mb-3 table-sm" id="tambah_form">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>No LOT</th>
                      <th>Nama Jenis Tinta</th>
                      <th>Status</th>
                      <th>Kg</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $nomor=1; ?>
                    <?php $berat=0; ?>
                    <?php $ambil_spk=$koneksi->query("SELECT * FROM form_pengajuan WHERE tgl_diajukan='$_GET[waktu]'"); ?>
                    <?php while($tmpl = $ambil_spk -> fetch_assoc()){ ?>
                    <tr>
                      <td class="text-info"><?php echo $nomor; ?></td>
                      <td><?php echo $tmpl['no_lot']; ?></td>
                      <td><?php echo $tmpl['nama_jenis_tinta']; ?></td>
                      <td><?php echo $tmpl['status']; ?></td>
                      <td><?php echo $tmpl['kg']; ?></td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php $berat++; ?>
                    <?php $berat_total[$berat] = $tmpl['kg']; ?>
                  <?php } ?>
                  <tr>
                    <td colspan="4"></td>
                    <td><b>Total : </b><?php  echo " ".array_sum($berat_total); ?> <b>Kg</b></td>
                  </tr>
                  
                  </tbody>
                </table>

                <table class="table table-borderless text-center">
                  <thead>
                    <tr>
                      <th>Diterima Oleh,</th>
                      <th>Diserahkan Oleh,</th>
                      <th>Diketahui Oleh,</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>(........................)</th>
                      <th>(........................)</th>
                      <th>(........................)</th>
                    </tr>
                  </tfoot>
                </table>

                  
              </div>

  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
