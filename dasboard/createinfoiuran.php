<?php
include "config/koneksi.php";
if (isset($_POST['tambah'])) {
    $jenis_iuran = $_POST['jenis_iuran'];
    $keterangan = $_POST['keterangan'];
    $kendaraan = $_POST['kendaraan'];
    $pembayaran = $_POST['pembayaran'];
   

    $sql = $koneksi->query("INSERT INTO info_iuran (jenis_iuran, keterangan, kendaraan, pembayaran) VALUES
    ('$jenis_iuran', '$keterangan', '$kendaraan', '$pembayaran')");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data berhasil disimpan!");
            window.location.href = "?page=info-iuran";
        </script>
<?php
    } else {
        echo "Gagal Create Data !";
    }
}
?>

<div class="card shadow m-4">
    <div class="card-header py-3 mb-3">
        Tambah Info Iuran
    </div>
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="">Jenis Iuran</label>
                <input type="text" name="jenis_iuran" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" name="keterangan" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Jenis Kendaraan </label>
                <input type="text" name="kendaraan" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Pembayaran</label>
                <input type="number" name="pembayaran" class="form-control">
            </div>
            
        </div>
        <div class="card-footer text-right">
            <button name="tambah" class="btn btn-primary" type="submit">Simpan</button>
            
        </div>
    </form>
</div>