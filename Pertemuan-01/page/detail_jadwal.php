
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Jadwal Kelas</h1>
                <a href="index.php?page=tambah_detail_jadwal" class="btn btn-primary btn-sm">
                Tambah Detail Jadwal</a>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "DELETE FROM tbl_detail_jadwal where id_detail = '$id' ");
        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=detail_jadwal">';
        }
    }
}
?>
<div class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-body">
    
       <?php
        $id = $_GET['id'] ?? '';
        $query_jadwal = mysqli_query($koneksi,"SELECT * FROM tbl_jadwal_kelas WHERE id_jadwal = '$id'");
        $detail_jadwal = mysqli_fetch_array($query_jadwal);
        ?>

        <table>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td><?= $detail_jadwal['semester'] ?? ''; ?></td>
            </tr>

            <tr>
                <td>Tahun Ajaran</td>
                <td>:</td>
                <td><?= $detail_jadwal['thn_ajaran'] ?? ''; ?></td>
            </tr>

            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?= $detail_jadwal['kelas'] ?? ''; ?></td>
            </tr>
        </table>
        
            <br><strong> DETAIL JADWAL KELAS</strong>
            <table class="table table-striped">
                <tread>
                    <tr>
                        <th>NO</th>
                        <th>Id Detail</th>
                        <th>Id Jadwal</th>
                        <th>Kd Mapel</th>
                        <th>Kd Guru</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </tread>
                <?php
                $no = 0;
                $query = mysqli_query($koneksi, " SELECT * FROM tbl_jadwal_kelas
                          JOIN tbl_detail_jadwal 
                              ON tbl_jadwal_kelas.id_jadwal = tbl_detail_jadwal.id_jadwal
                          JOIN tbl_mapel 
                              ON tbl_mapel.kd_mapel = tbl_detail_jadwal.kd_mapel
                          JOIN tbl_guru 
                              ON tbl_guru.kd_guru = tbl_detail_jadwal.kd_guru
                              
                              ORDER BY tbl_detail_jadwal.id_detail ASC");
                while ($result = mysqli_fetch_array($query)) {
                    $no++
                ?>
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['id_detail']; ?></td>
                        <td><?= $result['id_jadwal']; ?></td>
                        <td><?= $result['kd_mapel']; ?></td>
                        <td><?= $result['kd_guru']; ?></td>
                        <td><?= $result['hari']; ?></td>
                        <td><?= $result['jam_mulai']; ?> s.d <?= $result['jam_selesai']; ?></td>

                        <td>
                            <a href="index.php?page=detail_jadwal&action=hapus&id=<?= $result['id_detail'] ?>" title="">
                                <span class="badge badge-danger">Hapus</span>
                            </a>
                            <a href="index.php?page=edit_detail_jadwal&id=<?= $result['id_detail'] ?>" title="">
                                <span class="badge badge-warning">Edit</span>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>