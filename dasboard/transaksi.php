<div class="card shadow mb-4">
    <div class="card-header">
        Verifikasi Pembayaran Iuran Hi <?php echo $data['username']; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Iuran Kebersihan</th>
                        <th>Iuran Masjid</th>
                        <th>Iuran Kas</th>
                        <th>Iuran Keamanan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                     
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $ambilTransaksi = $koneksi->query("SELECT info_bayar.id, pendataan.id_user  ,pendataan.nama_kepala_keluarga, pendataan.blok,  pendataan.jalan,  pendataan.handphone, pendataan.kendaraan, info_bayar.nama, info_bayar.tanggal, info_bayar.kebersihan, info_bayar.masjid, info_bayar.tenda, info_bayar.tambahan, info_bayar.total, info_bayar.status FROM info_bayar INNER JOIN pendataan ON info_bayar.id_warga = pendataan.id_user  WHERE info_bayar.status = 'belom_bayar' OR info_bayar.status = 'menunggu_verifikasi'");

                    while ($data = $ambilTransaksi->fetch_assoc()) {
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
                           <td><span class="badge badge-<?php if ($data['status'] == 'belom_bayar') echo 'danger' ?><?php if ($data['status'] == 'menunggu_verifikasi') echo 'warning' ?><?php if ($data['status'] == 'sudah_bayar') echo 'success' ?>"><?= $data['status'] ?></span></td>
                            <td class="text-right">
                                <div class="btn-group" role="group">
                                    <a href="index.php?page=transaksi&aksi=rincian&id=<?= $data['id']; ?>" class="btn btn-success">
                                        <i class="fas fa-eyes"></i> Rincian
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header">
        Pembayaran Selesai
    </div>
    


<title>Laporan Pembayaran Iuran Bumi Indah RT.02 Bulan <?php echo $bulan; ?></title>
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
<h1>Laporan Pembayaran Iuran RT.02</h1>

    <div class="card-body">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Kebersihan</th>
                        <th>Masjid</th>
                        <th>Kas</th>
                        <th>Keamanan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                    $no = 1;
                    $ambilTransaksi = $koneksi->query("SELECT info_bayar.id, pendataan.id_user  ,pendataan.nama_kepala_keluarga, pendataan.blok,  pendataan.jalan,  pendataan.handphone, pendataan.kendaraan, info_bayar.nama, info_bayar.tanggal, info_bayar.kebersihan, info_bayar.masjid, info_bayar.tenda, info_bayar.tambahan, info_bayar.total, info_bayar.status FROM info_bayar INNER JOIN pendataan ON info_bayar.id_warga = pendataan.id_user  WHERE info_bayar.status = 'sudah_bayar' ");

                    while ($data = $ambilTransaksi->fetch_assoc()) {
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
                           <td><span class="badge badge-<?php if ($data['status'] == 'belom_bayar') echo 'danger' ?><?php if ($data['status'] == 'menunggu_verifikasi') echo 'warning' ?><?php if ($data['status'] == 'sudah_bayar') echo 'success' ?>"><?= $data['status'] ?></span></td>
                            <td class="text-right">
                                <div class="btn-group" role="group">
                                    <a href="index.php?page=transaksi&aksi=rincian&id=<?= $data['id']; ?>&id_warga=<?= $data['id_user']; ?>" class="btn btn-success">
                                        <i class="fas fa-eyes"></i> Rincian
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
           <a class="nav-link" href="#" data-toggle="modal" aria-expanded="false" data-target="#laporan">Cetak</a>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="laporan">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Laporan</h5>
            </div>
            <div class="modal-body">
              <p>Lihat laporan berdasarkan Bulan.</p>
              <form method="POST" action="cetak.php">
                <div class="form-group">
                  <label>Bulan</label>
                  <input class="form-control" type="month" name="daritanggal">
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Lihat</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </form>
          </div>
        </div>
      </div>
