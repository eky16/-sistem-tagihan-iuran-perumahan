<?php
include "../koneksi.php";
if(isset($_POST['hapus'])) {
    $id = $_POST['id'];
   
    $hapusUser = $koneksi->query("DELETE FROM laporan_kas WHERE id = '".$id."'");

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
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $pemasukan= $_POST['pemasukan'];
    $pengeluaran = $_POST['pengeluaran'];
    $saldo = $_POST['saldo'];

    $ubahUser = $koneksi->query("UPDATE laporan_kas SET tanggal ='$tanggal', keterangan='$keterangan',
    pemasukan='$pemasukan',pengeluaran='$pengeluaran',saldo='$saldo' WHERE id = '$id' ");

    if ($ubahUser){
        echo 1;
    }else{
        echo 0;
    }
} 

// Ubah form
 
