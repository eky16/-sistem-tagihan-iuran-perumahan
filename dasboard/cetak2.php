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
<h1>Laporan Iuran Perumahan Bumi Indah RT 02</h1>
<h4>Bulan <?php echo $bulan; ?></h4>
<table>
    <thead>
        <tr>
             <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Pemasukkan</th>
                        <th>Pengeluaran</th>
                        <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $totalHarga = 0;
        $no = 1;
        $sql = $koneksi->query("SELECT * FROM laporan_kas where tanggal LIKE '$daritanggal%'");
        while ($data = $sql->fetch_assoc()) {
            $tanggal  = date('M', strtotime($data['tanggal']));
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                            
                            <td><?php echo $data['tanggal']; ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                            <td><?php echo $data['pemasukan']; ?></td>
                            <td><?php echo $data['pengeluaran']; ?></td>
                            <td><?php echo $data['saldo']; ?></td>
            </tr>
        <?php
        $totalHarga += $data['saldo'];
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