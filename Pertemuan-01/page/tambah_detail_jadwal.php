<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Detail Jadwal</h1>
            </div>
        </div>
    </div>
</div>

<?php
$carikode = mysqli_query($koneksi,"select max(id_detail) from tbl_detail_jadwal") or die(mysqli_error());
$datakode = mysqli_fetch_array($carikode);

 if($datakode){
    $nilaikode = (int)($datakode[0]);
    $kode = (int) $nilaikode;
    $kode = $kode + 1 ;
    $hasilkode = "".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {$hasilkode = ""; }
$_SESSION['KODE'] = $hasilkode;

if(isset($_POST['tambah'])){
    $id_detail = $_POST['id_detail'];
    $id_jadwal = $_POST['id_jadwal'];
    $kd_mapel = $_POST['kd_mapel'];
    $kd_guru = $_POST['kd_guru'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $insert = mysqli_query($koneksi,"INSERT INTO tbl_detail_jadwal values ('$id_detail', '$id_jadwal','$kd_mapel', '$kd_guru', '$hari', '$jam_mulai', '$jam_selesai')");
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=detail_jadwal">';
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
                            <label for="id_detail">Id Detail</label>
                            <input type="text" name="id_detail" value="<?= $hasilkode; ?>" placeholder="id detail" class="form-control" readonly>
                        </div>  
                        
                        <div class="form-group">
                            <label for="id_jadwal">Id Jadwal</label>
                            <select name="id_jadwal" class="form-control" required>
                                <option value="">-- Pilih Jadwal --</option>
                                <?php
                                $jadwal = mysqli_query($koneksi, "SELECT * FROM tbl_jadwal_kelas");
                                while($j = mysqli_fetch_array($jadwal)){
                                ?>
                                    <option value="<?= $j['id_jadwal']; ?>">
                                        <?= $j['id_jadwal']; ?> 
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kode Mapel</label>
                            <select name="kd_mapel" class="form-control" required>
                                <option value="">-- Pilih Kode Mapel --</option>
                                <?php
                                $mapel = mysqli_query($koneksi, "SELECT * FROM tbl_mapel");
                                while($m = mysqli_fetch_array($mapel)){
                                ?>
                                    <option value="<?= $m['kd_mapel']; ?>">
                                        <?= $m['kd_mapel']; ?> 
                                    </option>
                                <?php } ?>
                            </select>
                        </div> 

                        <div class="form-group">
                        <label>Kd Guru</label>
                        <select name="kd_guru" class="form-control" required>
                            <option value="">-- Pilih Kode Guru --</option>
                            <?php
                            $guru = mysqli_query($koneksi, "SELECT * FROM tbl_guru");
                            while($g = mysqli_fetch_array($guru)){
                            ?>
                                <option value="<?= $g['kd_guru']; ?>">
                                    <?= $g['kd_guru']; ?> 
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                        <div class="form-group">
                        <label for="hari">Hari</label>
                            <select class="form-control" name="hari" id="hari" placeholder="tahun ajaran">
                                <option disable selected>-- Pilih Hari --</option>
                                    <option value="senin">senin</option>
                                    <option value="selasa">selasa</option>
                                    <option value="rabu">rabu</option>
                                    <option value="kamis">kamis</option>
                                    <option value="jumat">jumat</option>
                            </select>
                        </div>

                        <div class="form-group">
                        <label>Jam</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="time" name="jam_mulai" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <input type="time" name="jam_selesai" class="form-control" required>
                            </div>
                        </div>
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