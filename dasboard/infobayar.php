<div class="card shadow m-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h4>INFO Bayar</h4>
            </div>
            <div class="col-lg text-right">
                <a href="index.php?page=info-iuran&aksi=tambah" class="btn btn-primary">
                    Tambah Info Bayar
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped" widht="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Iuran Kebersihan</th>
                        <th>Iuran Masjid</th>
                        <th>Kas</th>
                        <th>Iuran Keamanan</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $ambilUser = $koneksi->query("SELECT * FROM info_bayar");
                    while ($data = $ambilUser->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['tanggal']; ?></td>
                            <td><?php echo $data['kebersihan']; ?></td>
                            <td><?php echo $data['masjid']; ?></td>
                            <td><?php echo $data['tenda']; ?></td>
                            <td><?php echo $data['tambahan']; ?></td>
                            <td><?php echo $data['total']; ?></td>
                            <td class="text-right">
                                <div class="btn-group" role="group">
                                            <a href="index.php?page=info-iuran&aksi=ubah&id=<?php echo $data['id'] ?>" class="btn btn-success"> <i class="fas fa-edit"></i> Ubah
                                            </a>
                                    </button>

                                    <button type="button" class="btn btn-danger" id="hapus" data-nama="<?php echo $data['jenis_iuran']; ?>" data-id="<?php echo $data['id']; ?>" onclick="hapusUser(this.getAttribute('data-nama'), this.getAttribute('data-id'))">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
                url: "opsi.php",
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

    async function hapusUser(jenis_iuran, id) {
        let hapus = confirm(`Hapus ${jenis_iuran}?`);
        if (hapus) {
            // Bikin query
            await $.ajax({
                type: "POST",
                url: "opsi.php",
                data: {
                    hapus: true,
                    id: id
                },
                success(hasil) {
                    if (hasil == 1) {
                        alert(`${jenis_iuran} berhasil dihapus!`);
                        location.reload();
                    } else {
                        alert(`${jenis_iuran} gagal dihapus!`);
                    }
                }
            })


        }
    }
</script>