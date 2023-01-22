<?php 
require 'koneksi/koneksi.php';
require 'header.php';
require 'navbar.php';
require 'sidebar.php'; 

$ambil_spk=$koneksi->query("SELECT * FROM form_pengajuan  WHERE no_spk='$_GET[no_spk]'");
$tampilkan_sesuai_spk=$ambil_spk->fetch_assoc();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
<!--         <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Pengajuan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Form Pengajuan</li>
            </ol>
          </div>
        </div> -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- /.card -->

            <div class="card">
			
			

              <div class="card-header">
                <button class="btn btn-outline-warning disabled">NO SPK : <?php echo $tampilkan_sesuai_spk['no_spk']; ?></button>
                <!-- <input type="checkbox" checked data-toggle="toggle" data-on="OPEN" data-off="CLOSE" data-onstyle="success" data-offstyle="danger"> -->
                <!-- <a href="edit_spk.php?no_spk=<?php echo $tampilkan_sesuai_spk['no_spk']; ?>" class="btn btn-info"><i class="fas fa-edit"></i></a> -->
                <a class="btn btn-warning" href="index_gudang.php?hal=print_spkf" rel="noopener" target="_blank"><i class="fas fa-download"></i> PDF (Progress)</a>
                <a href="print_spk.php?no_spk=<?php echo $tampilkan_sesuai_spk['no_spk']; ?>" target="_blank" class="btn btn-primary hidden-print"><i class="fas fa-print"></i> Print </a>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button class="btn btn-outline-success disabled" id="clock"><i class="far fa-clock"></i></button>
                <?php
                if(isset($_SESSION['tingkatan_gudang']))
                {
                  $hps_psk = $tampilkan_sesuai_spk['no_spk'];
                    echo "<a href='hapus_spk.php?no_spk=$hps_psk' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
                          <a class='btn btn-info'><i class='fas fa-edit'></i>(Progress)</a>
                          <a class='btn btn-success'><i class='fas fa-plus-circle'></i>(Progress)</a>";
                } ?>
                
              </div>
            </div>
              <!-- /.card-header -->

                <table class="table table-borderless">
                  <h4 class="text-center font-weight-bold">FORM PENGAMBILAN BARANG GUDANG TINTA</h4>
                  <h4 class="text-center font-weight-bold">PT PRIMA MAKMUR ROTOKEMINDO</h4>
                  <h5 class="text-center text-danger">TR.<?php echo $tampilkan_sesuai_spk['kode_form']; ?></h5>
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

                <table class="table table-striped text-center" id="tambah_form">
                  <thead>
                    <tr>
                      <th class="text-danger">#</th>
                      <th class="text-success">No SPK</th>
                      <th class="text-primary">No LOT</th>
                      <th class="text-warning">Nama Jenis Tinta</th>
                      <th class="text-info">Status</th>
                      <th class="text-danger">Kg</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $nomor=1; ?>
                    <?php $berat=0; ?>
                    <?php $ambil_spk=$koneksi->query("SELECT * FROM form_pengajuan  WHERE no_spk='$_GET[no_spk]'"); ?>
                    <?php while($tmpl = $ambil_spk -> fetch_assoc()){ ?>
                    <tr>
                      <td><?php echo $nomor; ?></td>
                      <td><?php echo $tmpl['no_spk']; ?></td>
                      <td><?php echo $tmpl['no_lot']; ?></td>
                      <td><?php echo $tmpl['nama_jenis_tinta']; ?></td>
                      <td><?php echo $tmpl['status']; ?></td>
                      <td><?php echo $tmpl['kg']; ?> <b class="text-warning">Kg</b></td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php $berat++; ?>
                    <?php $berat_total[$berat] = $tmpl['kg']; ?>
                  <?php } ?>
                  <tr>
                    <td colspan="5"></td>
                    <td><b class="text-info">Total : </b><?php  echo " ".array_sum($berat_total); ?> <b class="text-success">Kg</b></td>
                  </tr>
                  
                  </tbody>
                </table>
                  <div class="pl-2 pr-2 pb-2 mt-3">
                    <textarea class="form-control" name="catatan" rows="3" placeholder="<?php echo $tampilkan_sesuai_spk['catatan']; ?>" disabled></textarea>
                  </div>

                  

            </div>

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php require 'footer.php'; ?>