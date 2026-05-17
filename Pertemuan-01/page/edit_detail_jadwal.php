
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Detail Jadwal</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID_Detail tidak ditemukan!");
}
$edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_detail_jadwal WHERE id_detail='$id'"));

if(isset($_POST['tambah'])){
    $id_detail = $_POST['id_detail'];
    $id_jadwal = $_POST['id_jadwal'];
    $kd_mapel = $_POST['kd_mapel'];
    $kd_guru = $_POST['kd_guru'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];

    $insert = mysqli_query($koneksi,"UPDATE tbl_detail_jadwal SET id_jadwal='$id_jadwal', kd_mapel='$kd_mapel', kd_guru='$kd_guru', hari='$hari', jam_mulai='$jam_mulai', jam_selesai='$jam_selesai' WHERE id_detail='$id_detail' ");
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
                            <label for="id_detail">Id Detail</label>
                            <input type="text" name="id_detail" value="<?= $edit['id_detail']; ?>" placeholder="id detail" class="form-control" readonly>
                        </div>  
                        
                        <div class="form-group">
                            <label for="id_jadwal">Id Jadwal</label>
                            <select name="id_jadwal" class="form-control" required>
                                <option value="">-- Pilih Id Jadwal --</option>
                                <?php
                                $jadwal = mysqli_query($koneksi, "SELECT * FROM tbl_jadwal_kelas");
                                while($j = mysqli_fetch_array($jadwal)){
                                ?>
                                    <option value="<?= $j['id_jadwal']; ?>"
                                <?= ($j['id_jadwal'] == $edit['id_jadwal']) ? 'selected' : '' ?>>
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
                                    <option value="<?= $m['kd_mapel']; ?>"
                                    <?= ($m['kd_mapel'] == $edit['kd_mapel']) ? 'selected' : '' ?>>
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
                                <option value="<?= $g['kd_guru']; ?>"
                                <?= ($g['kd_guru'] == $edit['kd_guru']) ? 'selected' : '' ?>>
                                    <?= $g['kd_guru']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                        <div class="form-group">
                            <label>Hari</label>
                            <select class="form-control" name="hari">

                                <option value="senin"  <?= ($edit['hari'] == 'senin') ? 'selected' : '' ?>>senin</option>
                                <option value="selasa" <?= ($edit['hari'] == 'selasa') ? 'selected' : '' ?>>selasa</option>
                                <option value="rabu"   <?= ($edit['hari'] == 'rabu') ? 'selected' : '' ?>>rabu</option>
                                <option value="kamis"  <?= ($edit['hari'] == 'kamis') ? 'selected' : '' ?>>kamis</option>
                                <option value="jumat"  <?= ($edit['hari'] == 'jumat') ? 'selected' : '' ?>>jumat</option>

                            </select>
                        </div>

                        <div class="form-group">
                        <label>Jam</label>
                        <div class="row">

                            <div class="col-md-6">
                                <input type="time"
                                    name="jam_mulai"
                                    class="form-control"
                                    value="<?= $edit['jam_mulai']; ?>"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <input type="time"
                                    name="jam_selesai"
                                    class="form-control"
                                    value="<?= $edit['jam_selesai']; ?>"
                                    required>
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