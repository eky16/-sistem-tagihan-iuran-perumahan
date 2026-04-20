<?php
$id = $_GET['id'];

$sql = $koneksi->query("SELECT users.username, users.email, users.tingkat, users.alamat,
                    users.post_code, users.handphone, users.id FROM pendataan INNER JOIN users ON pendataan.id_user = users.id
                    WHERE tb_orang_tua.id = $id");
$dataOrtu = $sql->fetch_assoc();
$id = $dataOrtu['id'];

$sqlAnak  = $koneksi->query("SELECT * FROM pendataan WHERE id = $id");
?>

<h5> Data Diri </h5>
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <th width="30%"><strong>Nama Kepala Keluarga</strong></th>
                <td><?php echo $dataOrtu['nama_kepala_keluarga']; ?></td>
            </tr>
            <tr>
                <th width="30%"><strong>Nama Blok</strong></th>
                <td><?php echo $dataOrtu['blok']; ?></td>
            </tr>
            <tr>
                <th width="30%"><strong>Nama Jalan</strong></th>
                <td><?php echo $dataOrtu['jalan']; ?></td>
            </tr>
        </table>
    </div>
</div>

<h5 class="pt-3">Data Warga</h5>
<div class="pb-4">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
        Tambah Data
    </button>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                No
            </th>
            <th>
                Nama Kepala Keluarga
            </th>
            <th>Nama Blok</th>
            <th>Nama Jalan</th>
            <th>Handphone</th>
            <th>Kendaraan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($anak = $sqlAnak->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $no++; ?>
                <td><?php echo $anak['nama_kepala_keluarga']; ?>
                <td><?php echo $anak['blok']; ?>
                <td><?php echo $anak['jalan']; ?>
                <td><?php echo $anak['handpone']; ?>
                <td><?php echo $anak['Kendaraan']; ?>
                <td>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ubahModal-<?php echo $anak['id']; ?>">
                        <i class="fas fa-edit"></i> Ubah
                    </button>
                    <button type="button" class="btn btn-danger" id="hapus" data-nama="<?php echo $anak['name']; ?>" data-id="<?php echo $anak['id']; ?>" onclick="hapusUser(this.getAttribute('data-nama'), this.getAttribute('data-id'))">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </td>
            </tr>
        <?php
        }
        ?>
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
                    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                    <input type="hidden" name="tambah" value="true">
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Blok</label>
                        <input type="text" name="blok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Jalan</label>
                        <input type="text" name="jalan" class="form-control">
                    </div>
                   
                    <div class="form-group">
                        <label>Handphone</label>
                        <input type="number" name="handphone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kendaraan</label>
                        <input type="text" name="kendaraan" class="form-control">
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
$sql2 = $koneksi->query("SELECT * FROM pendataan WHERE id_warga = $id_warga");
while ($data = $sql2->fetch_assoc()) {
?>
    <div class="modal" tabindex="-1" role="dialog" id="ubahModal-<?php echo $data['id']; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="ubahForm-<?php echo $data['id']; ?>" method="POST" class="ubahForm">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <input type="hidden" name="ubah" value="true">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="number" name="nis" class="form-control" value="<?php echo $data['nis']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <!-- ternary -->
                                <option value="L" <?php echo $data['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>L</option>
                                <option value="P" <?php echo $data['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>P</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $data['tempat_lahir']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $data['tgl_lahir']; ?>">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>

<script>
    $('#tambahForm').submit(function(e) {
        e.preventDefault();
        let form = $(this)
        // baru ajaxnya
        $.ajax({
            type: "POST",
            url: "page/Management/Siswa/aksisiswa.php",
            data: form.serialize(),
            success(hasil) {
                location.reload();
                alert(hasil);
            }
        })
    });


    $('form[id^="ubahForm"]').each(function() {
        $(this).submit(function(e) {
            e.preventDefault();
            let form = $(this)

            $.ajax({
                type: "POST",
                url: "page/Management/Siswa/aksisiswa.php",
                data: form.serialize(),
                success(hasil) {
                    location.reload();
                    alert(hasil);
                }
            })
        });
    });

    async function hapusUser(nama, id) {
        let hapus = confirm(`Hapus ${nama}?`);
        if (hapus) {
            // Bikin query buat hapus 
            await $.ajax({
                type: "POST",
                url: "page/Management/Siswa/aksisiswa.php",
                data: {
                    hapus: true,
                    id: id
                },
                success(hasil) {
                    alert(hasil);
                    location.reload();
                }
            })
        }
    }
</script>