<?php
include "../koneksi.php";
if(isset($_POST['hapus'])) {
    $id = $_POST['id'];
   
    $hapusUser = $koneksi->query("DELETE FROM pendataan WHERE id = '".$id."'");

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
    $nama_kepala_keluarga = $_POST['nama_kepala_keluarga'];
    $blok = $_POST['blok'];
    $jalan = $_POST['jalan'];
    $handphone = $_POST['handphone'];

    $ubahUser = $koneksi->query("UPDATE pendataan SET nama_kepala_keluarga='$nama_kepala_keluarga', blok='$blok',
    jalan='$jalan',handphone='$handphone' WHERE id = '$id' ");

    if ($ubahUser){
        echo 1;
    }else{
        echo 0;
    }
} 

// Ubah form
 
