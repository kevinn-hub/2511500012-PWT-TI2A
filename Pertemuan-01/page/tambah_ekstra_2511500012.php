
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Ekstrakulikuler</h1>
            </div>
        </div>
    </div>
</div>

<?php
$carikode = mysqli_query($koneksi,"select max(id_ekstra_012) from tbl_ekstra_2511500012") or die(mysqli_error($koneksi));
$datakode = mysqli_fetch_array($carikode);

if($datakode){
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "E-".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {$hasilkode = "E-"; }
$_SESSION['KODE'] = $hasilkode;

if(isset($_POST['tambah'])){
  $id_ekstra_012      = $_POST['id_ekstra_012'];
  $nama_ekstra_012    = $_POST['nama_ekstra_012'];
  $ket_012            = $_POST['ket_012'];
  $semester_012       = $_POST['semester_012'];
  $thn_ajaran_012     = $_POST['thn_ajaran_012'];

  $insert = mysqli_query($koneksi,"INSERT INTO tbl_ekstra_2511500012 values ('$id_ekstra_012', '$nama_ekstra_012','$ket_012','$semester_012','$thn_ajaran_012')");
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra_2511500012">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Gagal Disimpan</h4></div>';
    }
}
?>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2">
                    <form method="POST" action="">

                    <div class="form-group">
                        <label for="id_ekstra_012">ID_EKSTRA_012</label>
                        <input type="text" name="id_ekstra_012" value="<?= $hasilkode; ?>" placeholder="ID_EKSTRA_012" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama_ekstra_012">NAMA_EKSTRA_012</label> 
                        <input type="text" name="nama_ekstra_012" id="nama_ekstra_012" placeholder="NAMA_EKSTRA_012" class="form-control">
                    </div>

                     <div class="form-group">
                        <label for="ket_012">KET_012</label>
                        <input type="text" name="ket_012" id="ket_012" placeholder="KET_012" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="semester_012">SEMESTER_012</label>
                        <select class ="form-control" type="int" class="form-control" name="semester_012" id="semester_012" placeholder="SEMESTER_012">
                        <option disable selected>-- Pilih jenis semester --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="thn_ajaran_012">thn_ajaran_012</label>
                        <select class ="form-control" type="int" class="form-control" name="thn_ajaran_012" id="thn_ajaran_012" placeholder="SEMESTER_012">
                        <option disable selected>-- Pilih tahun ajaran --</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        </select>
                    </div>
                    
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>