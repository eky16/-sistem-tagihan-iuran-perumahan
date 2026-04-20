<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include "../koneksi.php";
  //$id = $_GET['id'];
	// membuat variabel untuk menampung data dari form
  $nama_pengirim   = $_POST['nama_pengirim'];
  $bank_pengirim     = $_POST['bank_pengirim'];
  $no_rek_pengirim    = $_POST['no_rek_pengirim'];
  $id_rekening_tujuan    = $_POST['id_rekening_tujuan'];
  $struk_transfer = $_FILES['struk_transfer']['name'];
  $id_bayar    = $_POST['id_bayar'];
 $status = isset($_POST['status']) ? $_POST['status'] : 'menunggu_verifikasi';
 // $simpanKeDatabase = 
//cek dulu jika ada gambar produk jalankan coding ini

 $data = "UPDATE info_bayar SET status = '$status' WHERE id = '$id_bayar'";
                  
                  $result = mysqli_query($koneksi, $data);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Berhasil memperbarui status.');window.location='index.php?page=transaksi';</script>";
                  }
   


if($struk_transfer != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $struk_transfer); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['struk_transfer']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$struk_transfer; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../upload/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO tb_bukti_bayar (id_bayar,nama_pengirim, bank_pengirim, no_rek_pengirim, id_rekening_tujuan, struk_transfer) VALUES ('$id_bayar','$nama_pengirim', '$bank_pengirim', '$no_rek_pengirim', '$id_rekening_tujuan', '$nama_gambar_baru')";
                
                 
                  
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Berhasil memperbarui status.');window.location='index.php?page=transaksi';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='index.php?page=transaksi';</script>";
            }
} else {
   $query = "INSERT INTO tb_bukti_bayar (id_bayar,nama_pengirim, bank_pengirim, no_rek_pengirim, id_rekening_tujuan, struk_transfer) VALUES ('$id_bayar','$nama_pengirim', '$bank_pengirim', '$no_rek_pengirim', '$id_rekening_tujuan', null)";
   

                  $result = mysqli_multi_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Berhasil memperbarui status.');window.location='index.php?page=transaksi';</script>";
                  }
}

