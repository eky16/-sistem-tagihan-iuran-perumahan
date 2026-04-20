<?php
include "../koneksi.php";

$query = $koneksi->query("SELECT * FROM setting WHERE id = 1");
$data = $query->fetch_assoc();

// Cek apakah tombolnya ditekan
if (isset($_POST['simpan'])) {
    $namaRT = htmlspecialchars($_POST['nama_rt'], ENT_QUOTES);
    $namaBendahara = htmlspecialchars($_POST['nama_bendahara'], ENT_QUOTES);
    $namaPerumahan = htmlspecialchars($_POST['nama_perumahan'], ENT_QUOTES);

    $update = $koneksi->query("UPDATE setting SET nama_bendahara = '$namaBendahara', nama_rt = '$namaRT', nama_perumahan = '$namaPerumahan' WHERE id = 1");

    if ($update) {
        echo "Berhasil memperbarui data";
    } else {
        echo "Gagal memperbarui data";
    }
}

?>

<div class="card shadow m-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h4>Nama RT, Admin, Perumahan</h4>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="form-group">
                <label>Nama RT</label>  
                <input class="form-control" type="text" name="nama_rt" value="<?= $data['nama_rt']; ?>">
            </div>  
            <div class="form-group">
                <label>Nama Admin</label>  
                <input class="form-control" type="text" name="nama_bendahara" value="<?= $data['nama_bendahara']; ?>">
            </div> 
             <div class="form-group">
                <label>Nama Perumahan</label>  
                <input class="form-control" type="text" name="nama_perumahan" value="<?= $data['nama_perumahan']; ?>">
            </div>  
            <button type="submit" name="simpan" class="btn btn-primary float-right">Simpan</button>
        </form>
    </div>
</div>

 