<?php 
require 'koneksi/koneksi.php';
require 'header.php';
require 'navbar.php';
require 'sidebar.php'; 

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Berdasarkan SPK</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Berdasarkan SPK</li>
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
              <button class="btn btn-outline-success disabled" id="clock"><i class="far fa-clock"></i></button>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i class="fas fa-minus"></i></button>
                <?php
                if(isset($_SESSION['tingkatan_gudang']))
                {
                    echo "<button class='btn btn-warning' type='button' data-toggle='collapse' data-target='#collapseTambahSPK' aria-expanded='false' aria-controls='collapseTambahSPK'><i class='fas fa-plus-circle'></i> Tambah SPK</button>";
                } ?>
              </div>
            </div>
            



              <div class="card-body">

<div class="collapse border border-info rounded mb-3" id="collapseTambahSPK">
<div class="card-body">
  <form method="post">
                <table class="table table-borderless">
                  <h4 class="text-center font-weight-bold">FORM PENGAMBILAN BARANG GUDANG TINTA</h4>
                  <h4 class="text-center font-weight-bold">PT.DLL</h4>
                  <tbody>
                    <tr>
                      <td style="width: 150px"><h5 class="mt-2">No Mesin :</h5></td>
                      <td style="width: 200px">
                        <input type="text" class="form-control form-control-border is-warning" name="no_mesin" placeholder="Masukan No Mesin">
                      </td>
                      <td></td>
                      <td style="width: 150px"><h5 class="mt-2">Tanggal Form :</h5></td>
                      <td style="width: 200px">
                        <input type="text" class="form-control form-control-border is-warning" name="tgl_diajukan" value="<?php echo date("Y-m-d"); ?>">
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 150px"><h5 class="mt-2">Nama Order :</h5></td>
                      <td style="width: 250px">
                        <input type="text" class="form-control form-control-border is-warning" name="nama_order" placeholder="Masukan Nama Order">
                      </td>
                      <td></td>
                      <td style="width: 150px"><h5 class="mt-2">No SPK :</h5></td>
                      <td style="width: 200px">
                        <input type="text" class="form-control form-control-border is-warning" name="no_spk" placeholder="Masukan No SO">
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
                        <select class="form-control is-invalid" name="status[]" required>
                          <option value="">Status</option>
                          <option value="Baru">Baru</option>
                          <option value="Bekas">Bekas</option>
                        </select>
                        <div class="valid-feedback">Status</div>
                      </td>
                      <td>
                        <input type="number" class="form-control is-invalid" placeholder="Kg" name="kg[]" required>
                        <div class="valid-feedback">Kg</div>
                      </td>
                      <td>
                        <a class="btn btn-warning btn-sm disabled" href="#"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                </table>
                  <div class="pl-4 pr-4">
                    <a class="btn btn-primary btn-block mb-3" onclick="add_row();"><i class="fas fa-plus-circle"></i> Tambahkan Form/Field</a>
                    <textarea class="form-control mb-3" name="catatan" rows="3" placeholder="Catatan"></textarea>
                    <button type="reset" class="btn btn-md btn-danger float-sm-left" ><i class="fa fa-bell"></i> Reset/Ulangi</button>
                    <button class="btn btn-md btn-success float-sm-right" name="simpan_spk">Simpan Form SPK</button>
                  </div>
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

$ambil_kode=$koneksi->query("SELECT MAX(kode_form) as kodmax FROM form_pengajuan");
$tmpl_kode=$ambil_kode->fetch_assoc();
$ambil_kodmax = $tmpl_kode['kodmax'];
$nourut = substr($ambil_kodmax, 1, 4);
$nourut++;
$kode_form = sprintf("%04s", $nourut);

 for($i=0;$i<count($no_lot);$i++)
 {
  if($no_lot[$i]!="" && $nama_jenis_tinta[$i]!="" && $status[$i]!="" && $kg[$i]!="")
  {
   $koneksi->query("INSERT INTO form_pengajuan
            (no_lot,nama_jenis_tinta,status,kg,no_mesin,nama_order,no_spk,status_pengajuan,pengaju,tgl_diajukan,catatan,kode_form) VALUES ('$no_lot[$i]','$nama_jenis_tinta[$i]','$status[$i]','$kg[$i]','$no_mesin','$nama_order','$no_spk','','','$tgl_diajukan','$catatan','$kode_form')");

        echo "<script>alert('Ditambahkan');</script>";
        echo "<script>location='index.php';</script>";
  }
 }
}
?>

</div>
</div>


                <div>
                  <div class="mb-2 d-flex justify-content-between">
                    <div class="d-inline-block">
                    <a class="btn btn-outline-danger" href="javascript:void(0)" data-shuffle><i class="fas fa-random"></i> Acak NO SPK </a>
                    </div>
                    <div class="d-inline-block" class="mb-0">
            <form method="get">
                      <div class="input-group mb-3">
                        <!-- /btn-group -->
                        <div class="input-group-prepend">
                        <input type="date" name="per_tanggal" class="form-control border-info">
                        </div>
                        <div class="input-group-append">
                          <input type="submit" class="btn btn-outline-info" value="Tampilkan Per Tanggal"></input>
                        </div>
                      </div>
            </form>
            </div>
                    <div class="d-inline-block">
                      <select class="custom-select border-success" style="width: auto;" data-sortOrder>
                        <option value="index"> Sort by Date </option>
                        <option value="sortData"> Sort </option>
                      </select>
                      <div class="btn-group">
                        <a class="btn btn-default border-info" href="javascript:void(0)" data-sortAsc> ▲ </a>
                        <a class="btn btn-default border-warning" href="javascript:void(0)" data-sortDesc> ▼ </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="filter-container p-0 row">
          <?php

            if(isset($_GET['per_tanggal'])){
                $tgl = $_GET['per_tanggal'];
                $amblil_spk=$koneksi->query("SELECT DISTINCT no_spk, tgl_diajukan, kode_form FROM form_pengajuan where tgl_diajukan LIKE '$tgl%' GROUP BY no_spk DESC");
            }else{

                $amblil_spk=$koneksi->query("SELECT DISTINCT no_spk, tgl_diajukan, kode_form FROM form_pengajuan GROUP BY no_spk DESC");
            }
            
            while($spk = $amblil_spk -> fetch_assoc()){
          ?>
                        <div class="filtr-item col-sm-2" data-category="per_spk">
                          <!-- small card -->
                          <div class="small-box bg-primary">
                            <div class="inner">
                              <h5>NO SPK :</h5>
                              <p class="btn btn-outline-warning"><?php echo $spk['no_spk']; ?></p> <br>
                              <h5 class="text-warning"><?php echo $spk['tgl_diajukan']; ?></h5>
                              <h6 class="text-danger">KODE : <b class="text-info">TR.<?php echo $spk['kode_form']; ?></b></h6>
                            </div>
                            <div class="icon">
                              <i class="fas fa-check-circle"></i>
                            </div>
                            <a href="lihat_spk.php?no_spk=<?php echo $spk['no_spk']; ?>" class="small-box-footer">
                              Lihat Form SPK <b class="text-success"><?php echo $spk['no_spk']; ?> </b><i class="fas fa-arrow-circle-right"></i>
                            </a>
                          </div>
                        </div>
                    <?php } ?>


                  </div>
                </div>

              </div>
              <!-- /.card-body -->
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
