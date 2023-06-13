<?php 
require 'koneksi/koneksi.php';
require 'header.php';
require 'navbar.php';
require 'sidebar.php'; 

$ambil_spk=$koneksi->query("SELECT * FROM form_pengajuan WHERE tgl_diajukan='$_GET[waktu]'");
$tampilkan_sesuai_waktu=$ambil_spk->fetch_assoc();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- /.card -->

            <div class="card">
			
			

              <div class="card-header">
                <button class="btn btn-outline-warning disabled">Dibuat Tgl : <?php echo $tampilkan_sesuai_waktu['tgl_diajukan']; ?></button>
                <button class="btn btn-outline-success text-uppercase disabled">Oleh : <?php echo $tampilkan_sesuai_waktu['pengaju']; ?></button>
                <a href="print_perwaktu.php?waktu=<?php echo $tampilkan_sesuai_waktu['tgl_diajukan']; ?>" target="_blank" class="btn btn-primary hidden-print"><i class="fas fa-print"></i> Print </a>
                

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i class="fas fa-minus"></i></button>
                <button class="btn btn-outline-success disabled" id="clock"><i class="far fa-clock"></i></button>
                <?php
                if((isset($tnk) ? $tnk : null) == 'gudang')
                {
                  $cb = $tampilkan_sesuai_waktu['tgl_diajukan'];
                    echo "<a href='hapus_perwaktu.php?waktu=$cb' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
                          <a class='btn btn-info'><i class='fas fa-edit'></i>(Progress)</a>
                          <a class='btn btn-success'><i class='fas fa-plus-circle'></i>(Progress)</a>";
                } ?>


              </div>
            </div>
              <!-- /.card-header -->

                <table class="table table-borderless table-sm">
                  <tbody class="h5">
                    <tr>
                      <td colspan="3"></td>
                      <td class="text-center font-weight-bold h4">FORM PENGAMBILAN BARANG GUDANG TINTA</td>
                      <td colspan="3"></td>
                    </tr>
                    <tr>
                      <td colspan="3"></td>
                      <td class="text-center font-weight-bold h4">PT.DLL</td>
                      <td colspan="3"></td>
                    </tr>
                    <tr>
                      <td colspan="3"></td>
                      <td class="text-center text-danger h5">TR.<?php echo $tampilkan_sesuai_waktu['kode_form']; ?></td>
                      <td colspan="3"></td>
                    </tr>
                    <tr>
                      <td style="width: 150px">No Mesin</td>
                      <td style="width: 10px">:</td>
                      <td style="width: 180px"><?php echo $tampilkan_sesuai_waktu['no_mesin']; ?></td>
                      <td></td>
                      <td style="width: 150px">Tanggal Form Dibuat</td>
                      <td style="width: 10px">:</td>
                      <td style="width: 180px"><?php echo $tampilkan_sesuai_waktu['tgl_diajukan']; ?></td>
                    </tr>
                    <tr>
                      <td style="width: 150px">Nama Order</td>
                      <td style="width: 10px">:</td>
                      <td style="width: 180px"><?php echo $tampilkan_sesuai_waktu['nama_order']; ?></td>
                      <td></td>
                      <td style="width: 150px">No SO</td>
                      <td style="width: 10px">:</td>
                      <td style="width: 180px"><?php echo $tampilkan_sesuai_waktu['no_spk']; ?></td>
                    </tr>

                  </tbody>
                </table>

                <table class="table table-hover table-striped text-center" id="tambah_form">
                  <thead>
                    <tr>
                      <th class="text-danger">#</th>
                      <th class="text-primary">No LOT</th>
                      <th class="text-warning">Nama Jenis Tinta</th>
                      <th class="text-info">Status</th>
                      <th class="text-danger">Kg</th>
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
                      <td><?php echo $tmpl['kg']; ?> <b class="text-warning">Kg</b></td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php $berat++; ?>
                    <?php $berat_total[$berat] = $tmpl['kg']; ?>
                  <?php } ?>
                  <tr>
                    <td colspan="4"></td>
                    <td><b class="text-info">Total : </b><?php  echo " ".array_sum($berat_total); ?> <b class="text-success">Kg</b></td>
                  </tr>
                  
                  </tbody>
                </table>
                  <div class="pl-2 pr-2 pb-2 mt-3">
                    <textarea class="form-control" name="catatan" rows="3" placeholder="<?php echo $tampilkan_sesuai_waktu['catatan']; ?>" disabled></textarea>
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
