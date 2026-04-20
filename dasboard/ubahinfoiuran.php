<?php
include "config/koneksi.php";
$id = $_GET['id'];
$sql = $koneksi->query("SELECT * FROM info_iuran WHERE id = $id");
$dataWarga = $sql->fetch_assoc();

if (isset($_POST['ubah'])) {
    $jenis_iuran = $_POST['jenis_iuran'];
    $keterangan = $_POST['keterangan'];
    $kendaraan = $_POST['kendaraan'];
    $pembayaran = $_POST['pembayaran'];

    $sql = $koneksi->query("UPDATE info_iuran SET jenis_iuran = '".$jenis_iuran."',
    keterangan = '".$keterangan."', kendaraan = '".$kendaraan."', pembayaran = '".$pembayaran."' WHERE id = $id");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data berhasil diubah!");
            window.location.href = "?page=info-iuran";
        </script>
<?php
    } else {
        echo "Gagal Ubah Data !";
    }
}
?>

<div class="card shadow m-4">
    <div class="card-header py-3 mb-3">
        Ubah Info Iuran
    </div>
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="">Jenis Iuran</label>
                <input type="text" name="jenis_iuran" class="form-control" value="<?= $dataWarga['jenis_iuran'];?>">
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="<?= $dataWarga['keterangan'];?>">
            </div>
            <div class="form-group">
                <label for="">Jenis Kendaraan atau jenis usaha</label>
                <input type="text" name="kendaraan" class="form-control" value="<?= $dataWarga['kendaraan'];?>">
            </div>
            <div class="form-group">
                <label for="">Pembayaran</label>
                <input type="number" name="pembayaran" class="form-control" value="<?= $dataWarga['pembayaran'];?>">
            </div>
            <div class="form-group">
                <label for="">Jenis Kendaraan</label>
                <input type="text" name="kendaraan" class="form-control" value="<?= $dataWarga['kendaraan'];?>">
            </div>
        </div>
        <div class="card-footer text-right">
            <button name="ubah" class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
</div>