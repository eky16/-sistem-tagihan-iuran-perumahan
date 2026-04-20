<?php
include "config/koneksi.php";
if (isset($_POST['tambah'])) {
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $pemasukan = $_POST['pemasukan'];
    $pengeluaran = $_POST['pengeluaran'];
    $saldo = $pemasukan-$pengeluaran;
   

    $sql = $koneksi->query("INSERT INTO laporan_kas (tanggal, keterangan, pemasukan, pengeluaran, saldo) VALUES
    ('$tanggal', '$keterangan', '$pemasukan', '$pengeluaran', '$saldo')");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data berhasil disimpan!");
            window.location.href = "?page=laporan-kas";
        </script>
<?php
    } else {
        echo "Gagal Create Data !";
    }
}
?>

<div class="card shadow m-4">
    <div class="card-header py-3 mb-3">
        Tambah Laporan Iuran
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
            <button name="tambah" class="btn btn-primary" type="submit">Simpan</button>
            
        </div>
    </form>
</div>