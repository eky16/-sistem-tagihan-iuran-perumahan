<?php
include "../koneksi.php";
if(isset($_POST['hapus'])) {
    $id = $_POST['id'];
   
    $hapusUser = $koneksi->query("DELETE FROM info_iuran WHERE id = '".$id."'");

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
    $jenis_iuran = $_POST['jenis_iuran'];
    $keterangan = $_POST['keterangan'];
    $kendaraan = $_POST['kendaraan'];
    $pembayaran = $_POST['pembayaran'];

    $ubahUser = $koneksi->query("UPDATE info_iuran SET jenis_iuran='$jenis_iuran', keterangan='$keterangan',
    kendaraan='$kendaraan',pembayaran='$pembayaran' WHERE id = '$id' ");

    if ($ubahUser){
        echo 1;
    }else{
        echo 0;
    }
} 

// Ubah form
 
