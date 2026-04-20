<?php
include "config/koneksi.php";
if (isset($_POST['tambah'])) {
    $nama_kepala_keluarga = $_POST['nama_kepala_keluarga'];
    $blok = $_POST['nama_blok_jalan'];
    $jalan = $_POST['nama_jalan_perumahan'];
    $handphone = $_POST['handphone'];

    $sql = $koneksi->query("INSERT INTO pendataan (nama_kepala_keluarga, blok, jalan, handphone) VALUES
    ('$nama_kepala_keluarga', '$blok', '$jalan', '$handphone')");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data berhasil disimpan!");
            window.location.href = "?page=data-warga";
        </script>
<?php
    } else {
        echo "Gagal Create Data !";
    }
}
?>

<div class="card shadow m-4">
    <div class="card-header py-3 mb-3">
        Tambah Data Warga
    </div>
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="">Nama Kepala Keluarga</label>
                <input type="text" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)"name="nama_kepala_keluarga" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nama Blok</label>
                <input type="text" name="nama_blok_jalan" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nama Jalan</label>
                <input type="text" name="nama_jalan_perumahan" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nomor Handphone</label>
                <input type="number" name="handphone" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Kendaraan atau usaha</label>
                <input type="text" name="nama_jalan_perumahan" class="form-control">
            </div>
        </div>
        <div class="card-footer text-right">
            <button name="tambah" class="btn btn-primary" type="submit">Simpan</button>
            
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