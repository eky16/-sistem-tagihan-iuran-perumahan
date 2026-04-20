<?php
include "config/koneksi.php";
$id = $_GET['id'];
$sql = $koneksi->query("SELECT * FROM pendataan WHERE id_user = $id");
$dataWarga = $sql->fetch_assoc();

if (isset($_POST['ubah'])) {
    $nama_kepala_keluarga = $_POST['nama_kepala_keluarga'];
    $blok = $_POST['blok'];
    $jalan = $_POST['nama_jalan_perumahan'];
    $handphone = $_POST['handphone'];
    $kendaraan = $_POST['kendaraan'];

    $sql = $koneksi->query("UPDATE pendataan SET nama_kepala_keluarga = '".$nama_kepala_keluarga."',
    blok = '".$blok."', jalan = '".$jalan."', handphone = '".$handphone."', kendaraan = '".$kendaraan."' WHERE id_user = $id");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data berhasil diubah!");
            window.location.href = "?page=data-warga";
        </script>
<?php
    } else {
        echo "Gagal Ubah Data !";
    }
}
?>

<div class="card shadow m-4">
    <div class="card-header py-3 mb-3">
        Ubah Data Warga
    </div>
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="">Nama Kepala Keluarga</label>
                <input type="text"onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)" name="nama_kepala_keluarga" class="form-control" value="<?= $dataWarga['nama_kepala_keluarga'];?>">
            </div>
            <div class="form-group">
                <label for="">Nama Blok</label>
                <input type="text" name="blok" class="form-control" value="<?= $dataWarga['blok'];?>">
            </div>
            <div class="form-group">
                <label for="">Nama Jalan</label>
                <input type="text" name="nama_jalan_perumahan" class="form-control" value="<?= $dataWarga['jalan'];?>">
            </div>
            <div class="form-group">
                <label for="">Nomor Handphone</label>
                <input type="number" name="handphone" class="form-control" value="<?= $dataWarga['handphone'];?>">
            </div>
            <div class="form-group">
                <label for="">Jenis Kendaraan</label>
                <input type="text" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)"name="kendaraan" class="form-control" value="<?= $dataWarga['kendaraan'];?>">
            </div>
        </div>
        <div class="card-footer text-right">
            <button name="ubah" class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
</div>
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