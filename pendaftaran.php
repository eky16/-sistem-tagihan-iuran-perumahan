<?php
include('koneksi.php');
if (isset($_POST['daftar'])) {
    $password = md5(mysqli_real_escape_string($koneksi, trim($_POST['password'])));
    $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $email = mysqli_real_escape_string($koneksi, trim($_POST['email']));
    $handphone = mysqli_real_escape_string($koneksi, trim($_POST['handphone']));
    $alamat = mysqli_real_escape_string($koneksi, trim($_POST['alamat']));
    $nama_kepala_keluarga = mysqli_real_escape_string($koneksi, trim($_POST['nama_kepala_keluarga']));
    $blok = mysqli_real_escape_string($koneksi, trim($_POST['blok']));
    $jalan = mysqli_real_escape_string($koneksi, trim($_POST['jalan']));
    $kendaraan = mysqli_real_escape_string($koneksi, trim($_POST['kendaraan']));
    $tingkatan = "pengguna";
    $id = $koneksi->insert_id;
    $insertData = $koneksi->query("INSERT INTO users (id_user,username, password, tingkatan, email, alamat, handphone) VALUES ($id,'$username', '$password', '$tingkatan', '$email','$alamat','$handphone')");

    if ($insertData) {
        $id = $koneksi->insert_id;

        $insertToPendataan = $koneksi->query("INSERT INTO pendataan (id_user, nama_kepala_keluarga, blok, jalan, handphone, kendaraan) VALUES ($id, '$nama_kepala_keluarga', '$blok', '$jalan', '$handphone', '$kendaraan')");

        if ($insertToPendataan) {
            echo "Pendaftaran Berhasil!";
            header("location: index.php");
        }
        }else {
        echo "Pendaftaran gagal";
    }
}
?>

<!DOCTYPE html>
 <html>
  <head>
    <title> Pendaftaran</title>
    <link rel="stylesheet" type="text/css" href="pendaftaran.css">
 </head>

 <body>
    <div class="pendaftaran-box">

        <h1>CREATE ACCOUNT</ha>
            <form method="POST">
            <br><input type="text" name="username" placeholder="Username"></br>
                <input type="email" name="email" placeholder="Alamat Email">
                <input type="number" name="handphone" placeholder="Handpone Number">
                <input type="text" name="alamat" placeholder="Address">
                <input type="text" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)"name="nama_kepala_keluarga" placeholder="Nama">
                <input type="text" name="blok" placeholder="blok">
                <input type="text" name="jalan" placeholder="jalan">
                <input type="text"onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)"name="kendaraan" placeholder="kendaraan">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="daftar" value="Register">
                <!-- <input type="text" name="Nama Lengkap" placeholder="nama lengkap">
                <input type="email" name="Alamat Email" placeholder="alamat email">
                <input type="number" name="handphone" placeholder="nomor handphone">
                <input type="text" name="Address" placeholder="alamat lengkap">
                <input type="number" name="post_code" placeholder="kode pos">
                <input type="password" name="password" placeholder="masukkan password">
                <input type="checkbox" name="" id="persyaratan">
                <label for="persyaratan">saya menyatakan bahwa data yang saya isi sudah benar</label>
                <input type="submit" name="daftar" value="Register"> -->
            </form>
    </div>
 </body>
<script>
    function preventNumberInput(e) {
      var keyCode = (e.keyCode ? e.keyCode : e.which);
      if (keyCode > 47 && keyCode < 58 || keyCode > 95 && keyCode < 107) {
        e.preventDefault();
      }
    }

    $(document).ready(function() {
      $('#text_field').keypress(function(e) {
        preventNumberInput(e);
      });
    })
  </script>
</html>