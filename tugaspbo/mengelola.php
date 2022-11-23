<?php
include 'server.php';
$id = '';
$nim = '';
$namamhs = '';
$jeniskelamin = '';
$alamat = '';
$kota = '';
$email = '';
$prodi = '';

if (isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $query = "SELECT * FROM mahasiswa WHERE id = '$id';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nim = $result['nim'];
    $namamhs = $result['namamhs'];
    $jeniskelamin = $result['jk'];
    $alamat = $result['alamat'];
    $kota = $result['kota'];
    $email = $result['email'];
    $prodi = $result['prodi'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>DATA MAHASISWA JURUSAN TEKNIK INFORMATIKA</title>
    <!--Style-->
    <style>
      .container {
        background-color: #a9d39e;
        margin: 40px auto;
        padding: 50px;
        border: 4px solid #f5f3f2;
        border-radius: 20px;
        box-sizing: border-box;
        position: relative;
      }
    </style>
</head>
<body>
      <div class="container">
        <h2 class="text-center">FORMULIR</h2>
        <br>
        <form method="POST" action="proses.php" class="font-weight-bold">
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            
            <!--Form NIM-->
            <div class="mb-3 row">
                <label for="Nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" name="nim" class="form-control" id="Nim" placeholder="Contoh: 21051214046" required value="<?php echo $nim; ?>">
                </div>
            </div>

            <!--Form Nama Mahasiswa-->
            <div class="mb-3 row">
                <label for="Namamhs" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" name="namamhs" class="form-control" id="Namamhs" placeholder="Contoh: Siftiyan Abdullah Z.I" required value="<?php echo $namamhs; ?>">
                </div>
            </div>

            <!--Form Jenis Kelamin-->
            <div class="mb-3 row">
                <label for="Jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline font-weight-normal">
                        <input class="form-check-input" type="radio" name="jk" id="laki-laki" required value="L" <?php if($jeniskelamin=="L") {
                            echo "checked=\"checked\" ";} ?>>
                        <label class="form-check-label" for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline font-weight-normal">
                        <input class="form-check-input" type="radio" name="jk" id="perempuan" required value="P" <?php if($jeniskelamin=="P") {
                            echo "checked=\"checked\" ";} ?>>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div>

            <!--Form Alamat-->
            <div class="mb-3 row">
                <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text"  name="alamat" class="form-control" id="Alamat" placeholder="Contoh: Jl. Borobudur No.166" required value="<?php echo $alamat; ?>">
                </div>
            </div>

            <!--Form Kota-->
            <div class="mb-3 row">
                <label for="Kota" class="col-sm-2 col-form-label">Kota</label>
                <div class="col-sm-10">
                    <input type="text" name="kota" class="form-control" id="Kota" placeholder="Contoh: Los Angles" required value="<?php echo $kota; ?>">
                </div>
            </div>

            <!--Form Email-->
            <div class="mb-3 row">
                <label for="Email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" id="Email" placeholder="Contoh: arxajizidan118@gmail.com" required value="<?php echo $email; ?>">
                </div>
            </div>

            <!--Form Prodi-->
            <div class="mb-3 row">
                <label for="Prodi" class="col-sm-2 col-form-label">Prodi</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline font-weight-normal">
                        <input class="form-check-input" type="radio" name="prodi" id="PendidikanTeknologiInformasi" required value=" S1 Pend. Teknik Informatika " <?php if($prodi==" S1 PTI ") {
                            echo "checked=\"checked\" ";} ?>>
                        <label class="form-check-label" for="PendidikanTeknologiInformasi">Pendidikan Teknologi Informasi</label>
                    </div>
                    <div class="form-check form-check-inline font-weight-normal">
                        <input class="form-check-input" type="radio" name="prodi" id="TeknikInformatika" required value=" S1 Teknik Informatika " <?php if($jeniskelamin==" S1 TI ") {
                            echo "checked=\"checked\" ";} ?>>
                        <label class="form-check-label" for="TeknikInformatika">Teknik Informatika</label>
                    </div>
                    <div class="form-check form-check-inline font-weight-normal">
                        <input class="form-check-input" type="radio" name="prodi" id="SistemInformasi" required value=" S1 Sistem Informasi " <?php if($jeniskelamin==" S1 SI ") {
                            echo "checked=\"checked\" ";} ?>>
                        <label class="form-check-label" for="SistemInformasi">Sistem Informasi</label>
                    </div>
                </div>
            </div>

            <!--Form Foto Mahasiswa-->
            <div class="mb-3 row">
                <label for="Foto" class="col-sm-2 col-form-label">Unggah Foto</label>
                <div class="col-sm-10">
                  <input type="file" name="foto" class="form-label" id="Foto" required value="<?php echo $foto; ?>">
                </div>
            </div>

            <!--Tombol Button-->
            <div class ="col text-right" style="float: right;">
                <?php
                if (isset($_GET['edit']))
                {
                    ?>
                    <button type="submit" name="submit" value="edit" class="btn btn-success btn-sm">Simpan</button>
                    <?php
                }
                else
                {
                    ?>
                    <button type="submit" name="submit" value="add" class="btn btn-success btn-sm">Tambah</button>  
                    <?php
                }
                ?>
                <a href="index.php" type="button" class="btn btn-danger btn-sm">Batal</a>
            </div>
        </form>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>