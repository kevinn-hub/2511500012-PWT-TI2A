<?php
if (isset($_GET['hapus'])) {
  $kd_jadwal = $_GET['hapus'];

  // Hapus detail jadwal dulu
  mysqli_query($koneksi, "DELETE FROM tbl_detail_jadwal WHERE kd_jadwal = '$kd_jadwal'");

  // Lalu hapus jadwal
  $hapus = mysqli_query($koneksi, "DELETE FROM tbl_jadwal_kelas WHERE kd_jadwal = '$kd_jadwal'");

  if ($hapus) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Berhasil!</strong> Data jadwal telah dihapus.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>";
  } else {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Gagal!</strong> Tidak dapat menghapus data.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>";
  }
}
?>

<div class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Data Jadwal</h1>
    </div>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <?php if($_SESSION['Role']=="admin"){ ?>
        <a href="index.php?page=tambah_jadwal_kelas" class="btn btn-primary btn-sm">
            Tambah Jadwal</a>
            <?php } ?>
        <a href="index.php?page=cetak_jadwal" class="btn btn-primary btn-sm">
            Cetak Jadwal</a>
          <table class="table table-bordered table-hover">
            <thead>
                <th>No</th>
                <th>Kode Jadwal</th>
                <?php if($_SESSION['Role']=="admin" || $_SESSION['Role']=="guru"){ ?>
                <th>Guru</th>
                <?php } ?>
                <?php if($_SESSION['Role']=="siswa"){ ?>
                <th>Kelas</th>
                <?php } ?>
                <th>Semester</th>
                <th>Tahun Ajaran</th>
                <th>Detail Jadwal</th>
                <?php if($_SESSION['Role']=="admin"){ ?>
                <th>Aksi</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
            <?php
  $no = 1;

  if($_SESSION['Role']=="admin"){

  $query = mysqli_query($koneksi,"SELECT *
  FROM tbl_jadwal_kelas
  JOIN tbl_guru
  ON tbl_jadwal_kelas.kd_guru = tbl_guru.kd_guru
  ");

  }

  elseif($_SESSION['Role']=="guru"){

  $query = mysqli_query($koneksi,"SELECT DISTINCT *
  FROM tbl_jadwal_kelas
  JOIN tbl_guru
  ON tbl_jadwal_kelas.kd_guru = tbl_guru.kd_guru
  ");

  } else {
  $query = mysqli_query($koneksi,"SELECT *
  FROM tbl_jadwal_kelas
  JOIN tbl_guru
  ON tbl_jadwal_kelas.kd_guru = tbl_guru.kd_guru
  ");
  }

  while ($row = mysqli_fetch_assoc($query)) {

  echo "<tr>";
  echo "<td>$no</td>";
  echo "<td>{$row['kd_jadwal']}</td>";

  if($_SESSION['Role']=="siswa"){

  $kelasData = mysqli_query($koneksi,"SELECT DISTINCT kelas
  FROM tbl_detail_jadwal
  WHERE kd_jadwal='{$row['kd_jadwal']}'
  ");
    
  $kelas = mysqli_fetch_assoc($kelasData);

  echo "<td>".$kelas['kelas']."</td>";

  }else{

  echo "<td>{$row['nm_guru']}</td>";

  }

  echo "<td>{$row['semester']}</td>";

  echo "<td>{$row['thn_ajaran']}</td>";

  echo "<td><ul>";

  $det = mysqli_query($koneksi,"SELECT 
  tbl_detail_jadwal.*,
  tbl_mapel.nm_mapel,
  tbl_guru.nm_guru

  FROM tbl_detail_jadwal

  JOIN tbl_mapel
  ON tbl_detail_jadwal.kd_mapel = tbl_mapel.kd_mapel

  JOIN tbl_jadwal_kelas
  ON tbl_detail_jadwal.kd_jadwal = tbl_jadwal_kelas.kd_jadwal

  JOIN tbl_guru
  ON tbl_jadwal_kelas.kd_guru = tbl_guru.kd_guru

  WHERE tbl_detail_jadwal.kd_jadwal='{$row['kd_jadwal']}'
  ");

  while($d = mysqli_fetch_assoc($det)){

  if($_SESSION['Role']=="guru" || $_SESSION['Role']=="admin"){
  echo "<li>".$d['nm_mapel']." - ".$d['hari']." - ".$d['jam']." - ".$d['kelas']."</li>";
  }

  if($_SESSION['Role']=="siswa"){
  echo "<li>".$d['nm_mapel']." - ".$d['hari']." - ".$d['jam']." - ".$d['nm_guru']."</li>";
  }

  }

echo "</ul></td>";

if($_SESSION['Role']=="admin"){

echo "<td>";
echo "<a href='index.php?page=jadwal_kelas&hapus={$row['kd_jadwal']}'
onclick=\"return confirm('Yakin ingin menghapus data ini?')\"
class='btn btn-danger btn-sm'>
Hapus
</a>";
echo "</td>";

}
  echo "</tr>";
  $no++;

  }
  ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>