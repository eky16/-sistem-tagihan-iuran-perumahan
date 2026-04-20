<?php
session_start();
include('koneksi.php');
if (isset($_POST['login'])) {

    $password = mysqli_real_escape_string($koneksi, trim($_POST['password']));
    $email = mysqli_real_escape_string($koneksi, trim($_POST['email']));

    // ini query mysql

    $cekUser = $koneksi->query(" select * FROM users WHERE (email = '".$email."')");
    // untuk cek data berdasarkan username apa enggak
    $data     =  $cekUser->num_rows;

    if ($data > 0 ) {
         //jika ada username, baru cek passwordnya
         $row =  $cekUser->fetch_assoc();
       
         if (md5($password) == $row['password']){
              // hash pakai md5
              // sekarang masukkan ke session
              $_SESSION['id'] = $row['id'];
              $_SESSION['tingkatan'] = $row['tingkatan'];
              $_SESSION['status'] = "loggedIn";
              header("location: dasboard/index.php");
         }else{
              
              echo "Password Salah";
         } 
         } else {
              echo "Tidak ada usernya";
         }
    } else {
         echo "Username salah atau belum terdaftar";
    }
?>