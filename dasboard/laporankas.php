 <div class="card shadow m-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h4>LAPORAN IURAN
                </h4>
            </div>
 <?php if ($tingkatan == 'admin' || $tingkatan == 'bendahara') { ?>
            <div class="col-lg text-right">
                <a href="index.php?page=laporan-kas&aksi=tambah" class="btn btn-primary">
                    Tambah Laporan Iuran
                    
                </a> 
            </div> 
              <?php } ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped" widht="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Pemasukkan</th>
                        <th>Pengeluaran</th>
                        <th>Saldo</th>
                        <?php if ($tingkatan == 'admin' || $tingkatan == 'bendahara') { ?>
                            <th>Opsi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $ambilUser = $koneksi->query("SELECT * FROM laporan_kas");
                    while ($data = $ambilUser->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['tanggal']; ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                            <td><?php echo $data['pemasukan']; ?></td>
                            <td><?php echo $data['pengeluaran']; ?></td>
                            <td><?php echo $data['saldo']; ?></td>
                            <?php if ($tingkatan == 'admin' || $tingkatan == 'bendahara') { ?>
                                <td class="text-right">
                                    <div class="btn-group" role="group">
                                        <a href="index.php?page=laporan-kas&aksi=ubah&id=<?php echo $data['id'] ?>" class="btn btn-success"> <i class="fas fa-edit"></i> Ubah
                                        </a>
                                        </button>

                                        <button type="button" class="btn btn-danger" id="hapus" data-nama="<?php echo $data['tanggal']; ?>" data-id="<?php echo $data['id']; ?>" onclick="hapusUser(this.getAttribute('data-nama'), this.getAttribute('data-id'))">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </div>
                                </td>
                            <?php } ?>
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
              <form method="POST" action="cetak2.php">
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


<script>
    // Ubah form

    $('form[id^="ubahUser"]').each(function() {
        $(this).submit(function(e) {
            e.prevenDefault();
            let form = $(this)
            // baru ajaxnya
            $.ajax({
                type: "POST",
                url: "opsii.php",
                data: form.serialize(),
                success(hasil) {
                    if (hasil == 1) {
                        alert('Berhasil mengubah pengguna!');
                        location.reload();
                    } else {
                        alert('Gagal mengubah pengguna!');
                    }
                }
            })
        });
    });

    async function hapusUser(tanggal, id) {
        let hapus = confirm(`Hapus ${tanggal}?`);
        if (hapus) {
            // Bikin query
            await $.ajax({
                type: "POST",
                url: "opsii.php",
                data: {
                    hapus: true,
                    id: id
                },
                success(hasil) {
                    if (hasil == 1) {
                        alert(`${tanggal} berhasil dihapus!`);
                        location.reload();
                    } else {
                        alert(`${tanggal} gagal dihapus!`);
                    }
                }
            })


        }
    }
</script>