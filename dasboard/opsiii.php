<?php
include "../koneksi.php";
if(isset($_POST['hapus'])) {
    $id = $_POST['id'];
   
    $hapusUser = $koneksi->query("DELETE FROM info_bayar WHERE id = '".$id."'");

    if($hapusUser){
        
        if ($hapusUser){

            // 1 true
            // 0 false
            echo 1;
        }else{
            echo 0;
        }
        }else {
            echo 0;
    }
}

// edit
if(isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kebersihan = $_POST['kebersihan'];
    $masjid = $_POST['masjid'];
    $tenda = $_POST['tenda'];
    $tambahan = $_POST['tambahan'];
    $status= $_POST['status'];

    $ubahUser = $koneksi->query("UPDATE info_bayar SET nama='$nama', kebersihan='$kebersihan',
    masjid='$masjid',tenda='$tenda', tambahan='$tambahan', status='$status' WHERE id = '$id' ");

    if ($ubahUser){
        echo 1;
    }else{
        echo 0;
    }
} 

// Ubah form
 
