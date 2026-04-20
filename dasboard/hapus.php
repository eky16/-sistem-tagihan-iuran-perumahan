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
