<div class="card shadow m-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h4>INFO IURAN</h4>
            </div>
            <?php if ($tingkatan == 'admin' || $tingkatan == 'bendahara') { ?>
            <div class="col-lg text-right">
                <a href="index.php?page=info-iuran&aksi=tambah" class="btn btn-primary">
                  
                    Tambah Info Iuran
                
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
                        <th>Jenis Iuran</th>
                        <th>Keterangan</th>
                        <th>Jenis Kendaraan</th>
                        <th>Pembayaran</th>
                       
                        <?php if ($tingkatan == 'admin'  || $tingkatan == 'bendahara') { ?>
                            <th>Opsi</th>
                        <?php } ?>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $ambilUser = $koneksi->query("SELECT * FROM info_iuran");
                    while ($data = $ambilUser->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['jenis_iuran']; ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                            <td><?php echo $data['kendaraan']; ?></td>
                            <td><?php echo $data['pembayaran']; ?></td>
                            <?php if ($tingkatan == 'admin' || $tingkatan == 'bendahara'){ ?>
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
                            <?php } ?>
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