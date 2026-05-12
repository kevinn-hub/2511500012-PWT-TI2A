
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
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "DELETE FROM tbl_Ekstra_2511500012 where id_ekstra_012 = '$id' ");
        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra_2511500012">';
        }
    }
}
?>
<div class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?page=tambah_ekstra_2511500012" class="btn btn-primary btn-sm">
                Tambah Ekstrakulikuler</a>
            <table class="table table-striped">
                <tread>
                    <tr>
                        <th>NO</th>
                        <th>ID_EKSTRA_012</th>
                        <th>NAMA_EKSTRA_012	</th>
                        <th>KET_012</th>
                        <th>SEMESTER_012</th>
                        <th>THN_AJARAN_012</th>
                        <th>Aksi</th>
                    </tr>
                </tread>
                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM tbl_Ekstra_2511500012");
                while ($result = mysqli_fetch_array($query)) {
                    $no++
                ?>
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['id_ekstra_012']; ?></td>
                        <td><?= $result['nama_ekstra_012']; ?></td>
                        <td><?= $result['ket_012']; ?></td>
                        <td><?= $result['semester_012']; ?></td>
                        <td><?= $result['thn_ajaran_012']; ?></td>
                        <td>
                            <a href="index.php?page=ekstra_2511500012&action=hapus&id=<?= $result['id_ekstra_012'] ?>" title="">
                                <span class="badge badge-danger">Hapus</span>
                            </a>
                            <a href="index.php?page=edit_ekstra_2511500012&id=<?= $result['id_ekstra_012'] ?>" title="">
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