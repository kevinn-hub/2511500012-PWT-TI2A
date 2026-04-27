<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ganti Password</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST['tambah'])){
    $pw_lama    = $_POST['password_lama'];
    $pw_baru    = $_POST['password_baru'];
    $Username   = $_SESSION['Username'];
    $konfirmasi = $_POST['konfirmasi'];

      if ($pw_baru != $konfirmasi) {
        echo '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan</h5>
        <h4>Password baru dan konfirmasi tidak sama</h4></div>';
        } else {

        $cek = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tbl_users WHERE Username = '$Username'"));

      if($cek){

        $update = mysqli_query($koneksi, "UPDATE tbl_users SET Password = '$pw_baru' WHERE Password = '$pw_lama' AND Username = '$Username'");

            if($update){
                if (mysqli_affected_rows($koneksi) > 0) {
                     echo'<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h5><i class="icon fas fa-check"></i> Sukses</h5>
                          <h4>Password berhasil diubah</h4></div>';
                     echo'<meta http-equiv="refresh" content="1;url=index.php">';
                } else {
                     echo'<div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h5><i class="icon fas fa-ban"></i> Error</h5>
                          <h4>Password lama salah</h4></div>';
                }
            }
        }
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-2">
                <form method="POST" action="">
                    
                    <div class="form-group">
                        <label for="pl">Password Lama</label>
                        <input type="password" name="password_lama" id="password_lama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="pb">Password Baru</label>
                        <input type="password" name="password_baru" id="password_baru" class="form-control" required>
                    </div>

                   <div class="form-group">
                        <label for="konfirmasi">Konfirmasi Password Baru</label>
                        <input type="password" name="konfirmasi" id="konfirmasi" class="form-control" required>
                    </div>

                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" name="tambah" value="Ganti Password">
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
