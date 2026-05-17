<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Jadwal Kelas</h1>
            </div>
        </div>
    </div>
</div>

<?php
$carikode = mysqli_query($koneksi,"select max(id_jadwal) from tbl_jadwal_kelas") or die(mysqli_error());
$datakode = mysqli_fetch_array($carikode);

 if($datakode){
    $nilaikode = (int)($datakode[0]);
    $kode = (int) $nilaikode;
    $kode = $kode + 1 ;
    $hasilkode = "".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {$hasilkode = ""; }
$_SESSION['KODE'] = $hasilkode;

if(isset($_POST['tambah'])){
    $id_jadwal = $_POST['id_jadwal'];
    $kelas = $_POST['kelas'];
    $thn_ajaran = $_POST['thn_ajaran'];
    $semester = $_POST['semester'];
    $insert = mysqli_query($koneksi,"INSERT INTO tbl_jadwal_kelas values ('$id_jadwal','$kelas', '$thn_ajaran', '$semester')");
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=jadwal_kelas">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Gagal Disimpan'.mysqli_error($koneksi).'</h4></div>';
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
                            <label for="id_jadwal">Id Jadwal</label>
                            <input type="text" name="id_jadwal" value="<?= $hasilkode; ?>" placeholder="Id jadwal" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                                <select class="form-control" name="kelas" id="kelas" placeholder="kelas">
                                    <option disable selected>-- Pilih Tahun Ajaran --</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="VI">VI</option>
                                    <option value="VII">VII</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="thn_ajaran">Tahun ajaran</label>
                                <select class="form-control" name="thn_ajaran" id="thn_ajaran" placeholder="tahun ajaran">
                                    <option disable selected>-- Pilih Tahun Ajaran --</option>
                                    <option value="2021/2022">2021/2022</option>
                                    <option value="2023/2024">2023/2024</option>
                                    <option value="2025/2026">2025/2026</option>
                                    <option value="2027/2028">2027/2028</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="jenkel">Semester</label>
                                <select class="form-control" name="semester" id="semester" placeholder="semester">
                                    <option disable selected>-- Pilih semester --</option>
                                    <option value="ganjil">Ganjil</option>
                                    <option value="genap">Genap</option>
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