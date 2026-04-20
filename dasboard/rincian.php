<h5>Rincian</h5>
<div class="card mt-3 mb-3">
    <div class="card-body">
        <table class="table table-striped">

            <?php
            $id = $_GET['id'];

            $sql = $koneksi->query("SELECT * FROM info_bayar where info_bayar.id=$id");
            $datawarga= $sql->fetch_assoc();
            ?>

            <tr>

                <th width="30%"><strong>Nama</strong></th>
                <td><?php echo $datawarga['nama']; ?></td>
            </tr>
            <tr>
               <th width="30%"><strong>Tanggal</strong></th>
               <td><?php echo $datawarga['tanggal']; ?></td>
            </tr>
            <tr>
                <th width="30%"><strong>Iuran Kebersihan</strong></th>
                <td><?php echo $datawarga['kebersihan']; ?></td>
            </tr>
            <tr>
                <th width="30%"><strong>Iuran Masjid</strong></th>
                <td><?php echo $datawarga['masjid']; ?></td>
            </tr>
            <tr>
                <th width="30%"><strong>Kas</strong></th>
                <td><?php echo $datawarga['tenda']; ?></td>
            </tr>
            <tr>
                <th width="30%"><strong>Iuran Keamanan</strong></th>
                <td><?php echo $datawarga['tambahan']; ?></td>
            </tr>
            <tr>
                <th width="30%"><strong>Total</strong></th>
                <td><?php echo $datawarga['total']; ?></td>
            </tr>
        </table>
    </div>
</div>

<?php


$sql2 = $koneksi->query("SELECT * FROM tb_bukti_bayar WHERE id_bayar = $id");
$pembayaran = $sql2->fetch_assoc();

?>

<h5>Pembayaran Iuran</h5>
<div class="card mt-3">
    <div class="card-body">
        <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg">
                    <div class="form-group">
                        <label>Nama Pengirim</label>
                        <input type="text" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)"name="nama_pengirim" class="form-control" value="<?= $pembayaran['nama_pengirim']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Bank</label>
                        <select name="bank_pengirim" id="" class="form-control" >
                            <option value="BRI"     <?= $pembayaran['bank_pengirim'] == 'BRI'     ? 'selected' : '' ?>>BRI    </option>
                            <option value="MANDIRI" <?= $pembayaran['bank_pengirim'] == 'MANDIRI' ? 'selected' : '' ?>>MANDIRI</option>
                            <option value="BCA"     <?= $pembayaran['bank_pengirim'] == 'BCA'     ? 'selected' : '' ?>>BCA    </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nomor Rekening</label>
                        <input type="number" name="no_rek_pengirim" class="form-control" value="<?= $pembayaran['no_rek_pengirim']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Rekening Tujuan</label>
                        <select name="id_rekening_tujuan" class="form-control">
                    <?php
                    $sqlbank = $koneksi->query("SELECT * FROM tb_bank");
                    while ($bank = $sqlbank->fetch_assoc()) { ?>
                        <option value="<?= $bank['id'] ?>" <?= $pembayaran['id_rekening_tujuan'] == $bank['id'] ? 'selected' : '' ?>><?= $bank['nama_bank'] ?> a/n <?= $bank['nama_pemilik_rek'] ?> - <?= $bank['no_rek'] ?></option>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-lg">
                <div class="form-group">
                    <label for="">Upload struck</label>
                    <input type="file" name="struk_transfer" id="" class="form-control-file">
                </div>
              <img src="../upload/<?php echo $pembayaran['struk_transfer']; ?>" style="width: 200px;">
<?php if ($_SESSION['tingkatan'] == 'admin'){ ?>
                <div class="form-group pt-2">
                    <label>Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="belom_bayar" <?= $datawarga['status'] == 'belom_bayar' ? 'selected' : ''  ?>>Belum Bayar</option>
                        <option value="menunggu_verifikasi" <?= $datawarga['status'] == 'menunggu_verifikasi' ? 'selected' : ''  ?>>Menunggu Verifikasi</option>
                        <option value="sudah_bayar" <?= $datawarga['status'] == 'sudah_bayar' ? 'selected' : ''  ?>>Sudah Bayar</option>
                    </select>
                </div>
        <?php } ?>

                  <input type="text" hidden name="id_bayar" class="form-control" value="<?php echo $id; ?>">
            </div>
    </div>
    <div class="text-right">
        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
    </div>
    </form>
</div>
</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#struk").change(function() {
        readURL(this);
    });
</script>

<script>
    function preventNumberInput(e) {
      var keyCode = (e.keyCode ? e.keyCode : e.which);
      if (keyCode > 47 && keyCode < 58 || keyCode > 95 && keyCode < 107) {
        e.preventDefault();
      }
    }

    $(document).ready(function() {
      $('#text_field').keypress(function(e) {
        preventNumberInput(e);
      });
    })
  </script>