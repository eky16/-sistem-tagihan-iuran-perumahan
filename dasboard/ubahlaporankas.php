

<?php
include "config/koneksi.php";
$id = $_GET['id'];
$sql = $koneksi->query("SELECT * FROM laporan_kas WHERE id = $id");
$datawarga = $sql->fetch_assoc();

if (isset($_POST['ubah'])) {
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $pemasukan = $_POST['pemasukan'];
    $pengeluaran = $_POST['pengeluaran'];
    $saldo = $pemasukan-$pengeluaran;
   

    $sql = $koneksi->query("UPDATE laporan_kas SET tanggal = '".$tanggal."',
    keterangan = '".$keterangan."', pemasukan = '".$pemasukan."', pengeluaran = '".$pengeluaran."', saldo = '".$saldo."' WHERE id = $id");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data berhasil diubah!");
            window.location.href = "?page=laporan-kas";
        </script>
<?php
    } else {
        echo "Gagal Ubah Data !";
    }
}
?>

<div class="card shadow m-4">
    <div class="card-header py-3 mb-3">
        Ubah Laporan Iuran
     </div>
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" name="tanggal" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" name="keterangan" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Pemasukan</label>
                <input type="number" name="pemasukan" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Pengeluaran</label>
                <input type="number" name="pengeluaran" class="form-control">
            </div>
           
        </div>
        <div class="card-footer text-right">
            <button name="ubah" class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
</div>