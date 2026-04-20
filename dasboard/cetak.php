<?php
include('../config/koneksi.php');
$daritanggal   = $_POST['daritanggal'];
$bulan  = date('F', strtotime($daritanggal));

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
?>
<title>Laporan Iuran Bumi Indah RT.02 bulan <?php echo $bulan; ?></title>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    h1,
    h4 {
        text-align: center;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    @media print {
        #ngeprint {
            display: none;
        }
    }
</style>
<h1>Laporan Iuran Bumi Indah RT.02</h1>
<h4>Bulan <?php echo $bulan; ?></h4>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama </th>
            <th>Kebersihan</th>
            <th>Masjid</th>
            <th>Kas</th>
            <th>Tambahan</th>
            <th>Total </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $totalHarga = 0;
        $no = 1;
        $sql = $koneksi->query("SELECT info_bayar.id,info_bayar.id_warga, pendataan.nama_kepala_keluarga, pendataan.blok, pendataan.jalan, pendataan.handphone, pendataan.kendaraan,  info_bayar.nama, info_bayar.tanggal, info_bayar.kebersihan, info_bayar.masjid, info_bayar.tenda, info_bayar.tambahan, info_bayar.total, info_bayar.status FROM info_bayar INNER JOIN pendataan ON info_bayar.id_warga = pendataan.id_user  WHERE info_bayar.status = 'sudah_bayar'and info_bayar.tanggal LIKE '$daritanggal%'");
        while ($data = $sql->fetch_assoc()) {
            $tanggal  = date('M', strtotime($data['tanggal']));
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                            <td><?php echo $data['nama'] ?></td>
                            <td><?php echo $data['tanggal'] ?></td>
                            <td>Rp. <?php echo $data['kebersihan'] ?></td>
                            <td>Rp. <?php echo $data['masjid']; ?></td>
                            <td>Rp. <?php echo $data['tenda']; ?></td>
                            <td>Rp. <?php echo $data['tambahan']; ?></td>
                            <td>Rp. <?php echo $data['total']; ?></td>
            </tr>
        <?php
        $totalHarga += $data['total'];
        }
        ?>
    </tbody>
    <tr>
        <th colspan="5">TOTAL</th>
        <td style="font-weight:bold"><?php echo rupiah($totalHarga); ?></td>
    </tr>
</table>
<br />
<input type="button" value="Cetak" onclick="window.print();" id="ngeprint" />