<?php 
require 'koneksi/koneksi.php';
require 'header.php';
require 'navbar.php';
require 'sidebar.php'; 
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
              <?php 
              if((isset($tnk) ? $tnk : null) == 'gudang')
              {
                echo "<button class='btn btn-outline-warning disabled text-uppercase'>LOGIN SEBAGAI : $usr [$tnk]</button>";
              }
              elseif((isset($tnk) ? $tnk : null) == 'ppic')
              {
                echo "<button class='btn btn-outline-warning disabled text-uppercase'>LOGIN SEBAGAI : $usr [$tnk]</button>";
              }
              ?>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i class="fas fa-minus"></i></button>
                <button class="btn btn-outline-success disabled" id="clock"><i class="far fa-clock"></i></button>
                <?php
                if((isset($tnk) ? $tnk : null) == 'gudang')
                {
                    echo "<button class='btn btn-warning' type='button' data-toggle='collapse' data-target='#collapseTambahSPK' aria-expanded='false' aria-controls='collapseTambahSPK'><i class='fas fa-plus-circle'></i> Tambah SPK</button>";
                }
                ?>
              </div>
            </div>
            

<?php 

$ambil_kode=$koneksi->query("SELECT MAX(kode_form) as kodmax FROM form_pengajuan");
$tmpl_kode=$ambil_kode->fetch_assoc();
$ambil_kodmax = $tmpl_kode['kodmax'];
$nourut = substr($ambil_kodmax, 1, 4);
$nourut++;
$kode_form = sprintf("%04s", $nourut);

?>


              <div class="card-body">

<div class="collapse border border-info rounded mb-3" id="collapseTambahSPK">
<div class="card-body">
  <form method="post">
                <table class="table table-borderless">
                  <h4 class="text-center font-weight-bold">FORM PENGAMBILAN BARANG GUDANG TINTA</h4>
                  <h4 class="text-center font-weight-bold">PT PRIMA MAKMUR ROTOKEMINDO</h4>
                  <h5 class="text-center text-warning">TR.<?php echo $kode_form ?></h5>
                  <tbody>
                    <tr>
                      <td style="width: 150px"><h5 class="mt-2">No Mesin :</h5></td>
                      <td style="width: 200px">
                        <input type="text" class="form-control form-control-border is-warning" name="no_mesin" placeholder="Masukan No Mesin" required>
                      </td>
                      <td></td>
                      <td style="width: 150px"><h5 class="mt-2">Tanggal Form :</h5></td>
                      <td style="width: 200px">
                        <input type="text" class="form-control form-control-border is-warning" name="tgl_diajukan" value="<?php echo date("Y-m-d h:i:s"); ?>" disabled>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 150px"><h5 class="mt-2">Nama Order :</h5></td>
                      <td style="width: 250px">
                        <input type="text" class="form-control form-control-border is-warning" name="nama_order" placeholder="Masukan Nama Order" required>
                      </td>
                      <td></td>
                      <td style="width: 150px"><h5 class="mt-2">No SPK :</h5></td>
                      <td style="width: 200px">
                        <input type="text" class="form-control form-control-border is-warning" name="no_spk" placeholder="Masukan No SO" required>
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
                          <option value="Retur">Retur</option>
                        </select>
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
                  <div class="pl-4 pr-4">
                    <a class="btn btn-primary btn-block mb-3" onclick="add_row();"><i class="fas fa-plus-circle"></i> Tambahkan Form/Field</a>
                    <textarea class="form-control mb-3" name="catatan" rows="3" placeholder="Catatan"></textarea>
                    <button type="reset" class="btn btn-md btn-danger float-sm-left" ><i class="fa fa-bell"></i> Reset/Ulangi</button>
                    <button class="btn btn-md btn-success float-sm-right" name="simpan_spk">Simpan Form SPK</button>
                  </div>
                  </form>
<?php   
$tgl_ditambahkan=date("Y-m-d h:i:s");
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
 $pengaju="$usr [$tnk]";
 $tgl_diajukan=$_POST['tgl_diajukan'];
 $catatan=$_POST['catatan'];



 for($i=0;$i<count($no_lot);$i++)
 {
  if($no_lot[$i]!="" && $nama_jenis_tinta[$i]!="" && $status[$i]!="" && $kg[$i]!="")
  {
   $koneksi->query("INSERT INTO form_pengajuan
            (no_lot,nama_jenis_tinta,status,kg,no_mesin,nama_order,no_spk,status_pengajuan,pengaju,tgl_diajukan,catatan,kode_form) VALUES ('$no_lot[$i]','$nama_jenis_tinta[$i]','$status[$i]','$kg[$i]','$no_mesin','$nama_order','$no_spk','','$pengaju','$tgl_ditambahkan','$catatan','$kode_form')");

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

                      <form action="index.php" method="get">

                        <div class="input-group" style="width: 250px;">
                          <div class="input-group-prepend">
                            <span class="input-group-text border-success">
                              TR.
                            </span>
                          </div>
                          <input type="number" name="cari" class="form-control float-right border-info" placeholder="Maskan Kode ...">

                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default border-warning">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>

                      </form>

                    </div>
                    <div class="d-inline-block">
                      <a data-sortOrder></a>
                      <a class="btn btn-default border-info" href="javascript:void(0)" data-sortAsc> ▲ </a>
                      <a class="btn btn-outline-danger" href="javascript:void(0)" data-shuffle><i class="fas fa-random"></i></a>
                      <a class="btn btn-default border-warning" href="javascript:void(0)" data-sortDesc> ▼ </a>

                    </div>
                    <div class="d-inline-block" class="mb-0">
                      <form method="get">
                        <div class="input-group mb-3">
                          <!-- /btn-group -->
                          <div class="input-group-prepend">
                          <input type="date" name="per_tanggal" class="form-control border-info">
                          </div>
                          <div class="input-group-append">
                            <input type="submit" class="btn btn-outline-info" value="Per Tgl"></input>
                          </div>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>
<?php 

if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  echo "<div><b>Hasil pencarian : ".$cari." :</b></div><br>";
}elseif(isset($_GET['per_tanggal'])){
  $tgl = $_GET['per_tanggal'];
  echo "<div><b>Data Pada Tanggal : ".$tgl." :</b></div><br>";
}

?>


                  <div class="filter-container p-0 row">
          <?php

            $batas   = 30;
            $hal = @$_GET['hal'];
                if(empty($hal)){
                    $posisi  = 0;
                    $hal = 1;
                }
                else{
                    $posisi  = ($hal-1) * $batas;
                }

            $no = $posisi+1;

            if(isset($_GET['per_tanggal'])){
                $tgl = $_GET['per_tanggal'];
                $amblil_spk=$koneksi->query("SELECT DISTINCT no_spk, tgl_diajukan, kode_form FROM form_pengajuan WHERE tgl_diajukan LIKE '$tgl%' GROUP BY kode_form DESC");
            }elseif(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $amblil_spk=$koneksi->query("SELECT DISTINCT no_spk, tgl_diajukan, kode_form FROM form_pengajuan WHERE kode_form LIKE '%$cari%' GROUP BY kode_form DESC");
            }
            else{
                $amblil_spk=$koneksi->query("SELECT DISTINCT no_spk, tgl_diajukan, kode_form FROM form_pengajuan GROUP BY kode_form DESC LIMIT $posisi, $batas");
            }


            while($waktu = $amblil_spk -> fetch_assoc()){
          ?>
                        <div class="filtr-item col-sm-2" data-category="per_waktu" style="min-width: 290px;">
                          <!-- small card -->
                          <div class="small-box bg-primary">  
                            <div class="inner">
                             <p class="btn btn-outline-warning"><?php echo $waktu['tgl_diajukan']; ?></p> <br>
                             <h6 class="text-success">NO SPK : <b class="text-info"><?php echo $waktu['no_spk']; ?></b></h6>
                             <h6 class="text-danger">KODE : <b class="text-warning">TR.<?php echo $waktu['kode_form']; ?></b></h6>
                            </div>
                            <div class="icon">
                              <i class="fas fa-check-circle"></i>
                            </div>
                            <a href="lihat_perwaktu.php?waktu=<?php echo $waktu['tgl_diajukan']; ?>" class="small-box-footer">
                              Lihat Data Tgl <b class="text-success"><?php echo $waktu['tgl_diajukan']; ?> </b><i class="fas fa-arrow-circle-right"></i>
                            </a>
                          </div>
                        </div>
                    <?php } ?>


                  </div>
                </div>

    <?php

    $ambil = $koneksi->query("SELECT DISTINCT no_spk, tgl_diajukan, kode_form FROM form_pengajuan GROUP BY kode_form DESC");
    $jmldata    = mysqli_num_rows($ambil);
    $jmlhal = ceil($jmldata/$batas);
    $previous = $hal - 1;
    $next = $hal + 1;
    $second_last = $jmlhal - 1;
    $adjacents = "2";
    ?>

    <nav aria-label="Page navigation example">
<div style='padding: 0px 25px 0px;'>
<strong>Hal <?php echo $hal." Dari ".$jmlhal; ?></strong>
</div>
      <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" <?php if($hal > 1){ echo "href='?hal=$previous'"; } ?> tabindex="-1">Previous</a></li>
            <?php
            if ($jmlhal <= 10) {
              for($i=1;$i<=$jmlhal;$i++) {
                if ($i != $hal) {
                    echo "<li class='page-item'><a class='page-link' href='index.php?hal=$i'>$i</a></li>";
                } else {
                    echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                }
              }
            }
            else if ($jmlhal > 10) {
              if($hal <= 4) { 
                for($i=1;$i< 8;$i++) {
                  if ($i != $hal) {
                      echo "<li class='page-item'><a class='page-link' href='index.php?hal=$i'>$i</a></li>";
                  } else {
                      echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                  }
                }
                echo "<li class='page-item'><a class='page-link' href='#'>...</a></li>";
                echo "<li class='page-item'><a class='page-link' href='index.php?hal=$second_last'>$second_last</a></li>";
                echo "<li class='page-item'><a class='page-link' href='index.php?hal=$jmlhal'>$jmlhal</a></li>";
              }
              else if($hal > 4 && $hal < $jmlhal - 4) {
                echo "<li class='page-item'><a class='page-link' href='index.php?hal=1'>1</a></li>";
                echo "<li class='page-item'><a class='page-link' href='index.php?hal=2'>2</a></li>";
                echo "<li class='page-item'><a class='page-link' href='#'>...</a></li>";
                for($i = $hal - $adjacents; $i <= $hal + $adjacents; $i++) {
                  if ($i != $hal) {
                      echo "<li class='page-item'><a class='page-link' href='index.php?hal=$i'>$i</a></li>";
                  } else {
                      echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                  }
                }
                echo "<li class='page-item'><a class='page-link' href='#'>...</a></li>";
                echo "<li class='page-item'><a class='page-link' href='index.php?hal=$second_last'>$second_last</a></li>";
                echo "<li class='page-item'><a class='page-link' href='index.php?hal=$jmlhal'>$jmlhal</a></li>";
              }
              else{
                echo "<li class='page-item'><a class='page-link' href='index.php?hal=1'>1</a></li>";
                echo "<li class='page-item'><a class='page-link' href='index.php?hal=2'>2</a></li>";
                echo "<li class='page-item'><a class='page-link' href='#'>...</a></li>";
                for($i = $hal - 6; $i <= $hal; $i++) {
                  if ($i != $hal) {
                      echo "<li class='page-item'><a class='page-link' href='index.php?hal=$i'>$i</a></li>";
                  } else {
                      echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                  }
                }
              }
            }
            ?>
        <li class="page-item"><a class="page-link" <?php if($hal < $jmlhal) { echo "href='?hal=$next'"; } ?>>Next</a></li>
      </ul>
    </nav>
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