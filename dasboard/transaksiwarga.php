
<?php
$id = $_SESSION['id'];
$warga = $koneksi->query("SELECT id FROM pendataan WHERE id_user = $id")->fetch_assoc();
$queryPembayaran = $koneksi->query("SELECT info_bayar.nama,info_bayar.tanggal, info_bayar.kebersihan, info_bayar.tenda, info_bayar.masjid, info_bayar.tambahan, info_bayar.total, info_bayar.id, info_bayar.status FROM info_bayar INNER JOIN pendataan ON info_bayar.id_warga = pendataan.id WHERE pendataan.id = " . $warga['id'] . "");
?>
<h5 class="pt-3">Iuran</h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Iuran Kebersihan</th>
            <th>Iuran Masjid</th>
            <th>Iuran Kas</th>
            <th>Iuran Keamanan</th>
            <th>total</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($data = $queryPembayaran->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['tanggal'] ?></td>
                <td>Rp. <?= $data['kebersihan'] ?></td>
                <td>Rp. <?= $data['masjid']; ?></td>
                <td>Rp. <?= $data['tenda']; ?></td>
                <td>Rp. <?= $data['keamanan']; ?></td>
                <td>Rp. <?= $data['total']; ?></td>
                <td><span class="badge badge-<?php if ($data['status'] == 'belom_bayar') echo 'danger' ?><?php if ($data['status'] == 'menunggu_verifikasi') echo 'warning' ?><?php if ($data['status'] == 'sudah_bayar') echo 'success' ?>"><?= $data['status'] ?></span></td>
                <td><a href="index.php?page=transaksi&aksi=rincian&id=<?= $data['id']; ?>" class="btn btn-success">Rincian</a></td>
            </tr>
        <?php
        } ?>
    </tbody>
</table>

