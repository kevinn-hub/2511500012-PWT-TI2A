
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
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "DELETE FROM tbl_jadwal_kelas where id_jadwal = '$id' ");
        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=jadwal_kelas">';
        }
    }
}
?>
<div class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?page=tambah_jadwal_kelas" class="btn btn-primary btn-sm">
                Tambah Jadwal Kelas</a>
            <table class="table table-striped">
                <tread>
                    <tr>
                        <th>NO</th>
                        <th>ID JADWAL</th>
                        <th>KELAS</th>
                        <th>TAHUN AJARAN</th>
                        <th>SEMESTER</th>
                        <th>AKSI</th>
                    </tr>
                </tread>
                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM tbl_jadwal_kelas");
                while ($result = mysqli_fetch_array($query)) {
                    $no++;
                ?>
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['id_jadwal']; ?></td>
                        <td><?= $result['kelas']; ?></td>
                        <td><?= $result['thn_ajaran']; ?></td>
                        <td><?= $result['semester']; ?></td>

                        <td>
                            <a href="index.php?page=jadwal_kelas&action=hapus&id=<?= $result['id_jadwal'] ?>" title="">
                                <span class="badge badge-danger">Hapus</span>
                            </a>
                            <a href="index.php?page=detail_jadwal&id=<?= $result['id_jadwal'] ?>" title="">
                                <span class="badge badge-warning">Detail</span>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>