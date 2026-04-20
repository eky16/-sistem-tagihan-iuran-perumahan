<div class="card shadow m-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h4>Data Warga</h4>
            </div>
            <div class="col-lg text-right">
                <a href="index.php?page=data-warga&aksi=tambah" class="btn btn-primary">
                    Tambah data
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped" widht="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama </th>
                        <th>Blok Perumahan</th>
                        <th>Nama Jalan Perumahan</th>
                        <th>Nomer Handphone</th>
                        <th>Kendaraan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $ambilUser = $koneksi->query("SELECT * FROM pendataan");
                    while ($data = $ambilUser->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['nama_kepala_keluarga']; ?></td>
                            <td><?php echo $data['blok']; ?></td>
                            <td><?php echo $data['jalan']; ?></td>
                            <td><?php echo $data['handphone']; ?></td>
                            <td><?php echo $data['kendaraan']; ?></td>
                            <td class="text-right">
                                <div class="btn-group" role="group">
                                    <a href="index.php?page=data-warga&aksi=iuran&id=<?php echo $data['id_user'] ?>" class="btn btn-primary"> <i class="fas fa-edit"></i> Iuran
                                    </a>
                                    <a href="index.php?page=data-warga&aksi=ubah&id=<?php echo $data['id_user'] ?>" class="btn btn-success"> <i class="fas fa-edit"></i> Ubah
                                    </a>

                                    <button type="button" class="btn btn-danger" id="hapus" data-nama="<?php echo $data['nama_kepala_keluarga']; ?>" data-id="<?php echo $data['id_user']; ?>" onclick="hapusUser(this.getAttribute('data-nama'), this.getAttribute('data-id'))">
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
                url: "aksi.php",
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

    async function hapusUser(nama_kepala_keluarga, id) {
        let hapus = confirm(`Hapus ${nama_kepala_keluarga}?`);
        if (hapus) {
            // Bikin query
            await $.ajax({
                type: "POST",
                url: "aksi.php",
                data: {
                    hapus: true,
                    id: id
                },
                success(hasil) {
                    if (hasil == 1) {
                        alert(`${nama_kepala_keluarga} berhasil dihapus!`);
                        location.reload();
                    } else {
                        alert(`${nama_kepala_keluarga} gagal dihapus!`);
                    }
                }
            })
        }
    }
</script>