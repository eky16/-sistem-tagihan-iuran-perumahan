<?php
$id = $_GET['id'];

$sql = $koneksi->query("SELECT * FROM pendataan WHERE id_user = $id");
$datawarga = $sql->fetch_assoc();
?>

<h5>Data Warga </h5>
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <th width="30%"><strong>Nama</strong></th>
                <td><?php echo $datawarga['nama_kepala_keluarga']; ?></td>
            </tr>
            <tr>
                <th width="30%"><strong>blok</strong></th>
                <td><?php echo $datawarga['blok']; ?></td>
            </tr>
            <tr>
                <th width="30%"><strong>Jalan</strong></th>
                <td><?php echo $datawarga['jalan']; ?></td>
            </tr>
            <tr>
                <th width="30%"><strong>handphone</strong></th>
                <td><?php echo $datawarga['handphone']; ?></td>
            </tr>
            <tr>
                <th width="30%"><strong>kendaraan</strong></th>
                <td><?php echo $datawarga['kendaraan']; ?></td>
            </tr>
        </table>
    </div>
</div>

<h5 class="pt-3">Iuran</h5>
<div class="pt-3 pb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
        Tambah Data
    </button>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>kebersihan</th>
            <th>masjid</th>
            <th>kas</th>
            <th>keamanan</th>
            <th>total</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $queryPembayaran = $koneksi->query("SELECT info_bayar.id, pendataan.id_user  ,pendataan.nama_kepala_keluarga, pendataan.blok,  pendataan.jalan,  pendataan.handphone, pendataan.kendaraan, info_bayar.nama, info_bayar.tanggal, info_bayar.kebersihan, info_bayar.masjid, info_bayar.tenda, info_bayar.tambahan, info_bayar.total, info_bayar.status FROM info_bayar INNER JOIN pendataan ON info_bayar.id_warga = pendataan.id_user WHERE pendataan.id_user = $id");
        while ($data = $queryPembayaran->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama'] ?></td>
                <td><?php echo $data['tanggal'] ?></td>
                <td>Rp. <?php echo $data['kebersihan'] ?></td>
                <td>Rp. <?php echo $data['masjid']; ?></td>
                <td>Rp. <?php echo $data['tenda']; ?></td>
                <td>Rp. <?php echo $data['tambahan']; ?></td>
                <td>Rp. <?php echo $data['total']; ?></td>
                <td><span class="badge badge-<?php if ($data['status'] == 'belom_bayar') echo 'danger' ?><?php if ($data['status'] == 'menunggu_verifikasi') echo 'warning' ?><?php if ($data['status'] == 'sudah_bayar') echo 'success' ?>"><?= $data['status'] ?></span></td>
                <td><a href="index.php?page=data-warga&aksi=rincian&id=<?= $data['id']; ?>" class="btn btn-success">Rincian</a></td>
            </tr>
        <?php
        } ?>
    </tbody>
</table>

<div class="modal" tabindex="-1" role="dialog" id="tambahModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="tambahForm" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_warga" value="<?= $id ?>">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" value="<?php echo $datawarga['nama_kepala_keluarga']; ?>"   class="form-control">
                    </div>
                    <div class="form-group">
                        <label>tanggal</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>kebersihan</label>
                        <input type="number" name="kebersihan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>masjid</label>
                        <input type="number" name="masjid" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>kas</label>
                        <input type="number" name="tenda" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>keamanan</label>
                        <input type="number" name="tambahan" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
if (isset($_POST['tambah'])) {

    $id_warga = $_POST['id_warga'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $kebersihan = $_POST['kebersihan'];
    $masjid = $_POST['masjid'];
    $tenda = $_POST['tenda'];
    $tambahan = $_POST['tambahan'];
    $status = 'belom_bayar';

    $total = $kebersihan + $masjid + $tenda + $tambahan;

    $sql = $koneksi->query("INSERT INTO info_bayar (id_warga, nama, tanggal, kebersihan, masjid, tenda, tambahan, status, total) VALUES('$id_warga','$nama', '$tanggal', '$kebersihan', '$masjid', '$tenda', '$tambahan', '$status', '$total')");

        if ($sql) {
?>
        <script type="text/javascript">
            alert("Data berhasil diubah!");
            window.location.href = "index.php?page=data-warga&aksi=iuran&id=<?= $id ?>";
        </script>
<?php
    } else {
        echo "Gagal Ubah Data !";
    }
}
?>