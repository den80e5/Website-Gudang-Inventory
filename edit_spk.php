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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit SPK : <?php echo $tampilkan_sesuai_spk['no_spk']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Edit SPK</li>
            </ol>
          </div>
        </div>
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

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i class="fas fa-minus"></i></button>
                  <button class="btn btn-outline-success disabled" id="clock"><i class="far fa-clock"></i></button>
                  <button class="btn btn-outline-info" name="simpan_spk">SIMPAN <i class="fas fa-save"></i></i></button>
                </div>
            </div>
              <!-- /.card-header -->

<div class="card-body">
  <form method="post">
                <table class="table table-borderless">
                  <h4 class="text-center font-weight-bold">FORM PENGAMBILAN BARANG GUDANG TINTA</h4>
                  <h4 class="text-center font-weight-bold">PT.DLL</h4>
                  <tbody>
                    <tr>
                      <td style="width: 150px"><h5 class="mt-2">No Mesin :</h5></td>
                      <td style="width: 200px">
                        <input type="text" class="form-control form-control-border is-warning" name="no_mesin" value="<?php echo $tampilkan_sesuai_spk['no_mesin']; ?>">
                      </td>
                      <td></td>
                      <td style="width: 150px"><h5 class="mt-2">Tanggal Form :</h5></td>
                      <td style="width: 200px">
                        <input type="text" class="form-control form-control-border is-warning" name="tgl_diajukan" value="<?php echo $tampilkan_sesuai_spk['tgl_diajukan']; ?>">
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 150px"><h5 class="mt-2">Nama Order :</h5></td>
                      <td style="width: 250px">
                        <input type="text" class="form-control form-control-border is-warning" name="nama_order" value="<?php echo $tampilkan_sesuai_spk['nama_order']; ?>">
                      </td>
                      <td></td>
                      <td style="width: 150px"><h5 class="mt-2">No SPK :</h5></td>
                      <td style="width: 200px">
                        <input type="text" class="form-control form-control-border is-warning" name="no_spk" value="<?php echo $tampilkan_sesuai_spk['no_spk']; ?>">
                      </td>
                    </tr>

                  </tbody>
                </table>

                <table class="table table-borderless text-center was-validated" id="tambah_form">
                    <tr id="row1">
                      <td>1.</td>
                      <td>
                        <input type="text" class="form-control is-invalid" placeholder="No LOT" name="no_lot[]" required>
                        <div class="valid-feedback">No LOT</div>
                      </td>
                      <td>
                        <input type="text" class="form-control is-invalid" placeholder="Nama Jenis Tinta" name="nama_jenis_tinta[]" required>
                        <div class="valid-feedback">Nama Jenis Tinta</div>
                      </td>
                      <td>
                        <input type="text" class="form-control is-invalid" placeholder="Status" name="status[]" required>
                        <div class="valid-feedback">Status</div>
                      </td>
                      <td>
                        <input type="text" class="form-control is-invalid" placeholder="Kg" name="kg[]" required>
                        <div class="valid-feedback">Kg</div>
                      </td>
                      <td>
                        <a class="btn btn-warning btn-sm disabled" href="#"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                </table>

                    <a class="btn btn-primary btn-block mb-3" onclick="add_row();"><i class="fas fa-plus-circle"></i> Tambahkan Form/Field</a>
                    <textarea class="form-control mb-3" name="catatan" rows="3" placeholder="Catatan"></textarea>

                  </form>
<?php
if(isset($_POST['simpan_spk']))
{
 $no_lot=$_POST['no_lot'];
 $nama_jenis_tinta=$_POST['nama_jenis_tinta'];
 $status=$_POST['status'];
 $kg=$_POST['kg'];
 $no_mesin=$_POST['no_mesin'];
 $nama_order=$_POST['nama_order'];
 $no_spk=$_POST['no_spk'];
 $status_pengajuan=$_POST['status_pengajuan'];
 $pengaju=$_POST['pengaju'];
 $tgl_diajukan=$_POST['tgl_diajukan'];
 $catatan=$_POST['catatan'];
 for($i=0;$i<count($no_lot);$i++)
 {
  if($no_lot[$i]!="" && $nama_jenis_tinta[$i]!="" && $status[$i]!="" && $kg[$i]!="")
  {
   $koneksi->query("INSERT INTO form_pengajuan
            (no_lot,nama_jenis_tinta,status,kg,no_mesin,nama_order,no_spk,status_pengajuan,pengaju,tgl_diajukan,catatan) VALUES ('$no_lot[$i]','$nama_jenis_tinta[$i]','$status[$i]','$kg[$i]','$no_mesin','$nama_order','$no_spk','','','$tgl_diajukan','$catatan')");

        echo "<script>alert('Ditambahkan');</script>";
        echo "<script>location='index.php';</script>";
  }
 }
}
?>

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
