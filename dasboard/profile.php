<?php

$id = $_SESSION['id'];
$sql = $koneksi->query("SELECT * FROM tb_user INNER JOIN tb_orang_tua ON tb_orang_tua.id_user = tb_user.id WHERE tb_user.id = $id ");
$tampil = $sql->fetch_assoc();

$admin = $koneksi->query("SELECT * FROM tb_user WHERE id = $id")->fetch_array();

if ($tingkatan == 'admin' || $tingkatan == 'bendahara') {
?>
    <div class="card card-outline-danger">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <h4 class="card-title">Profil</h4>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Pratinjau Foto</label>
                            <img src="http://localhost/pembayaran-paud-melati/upload/profile/<?= $admin['foto']; ?>" class="rounded img-responsive" width="250" height="250" id="img-preview">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <label class="float-right">
                                <a href="#" data-toggle="tooltip" title="Klik untuk menghapus foto yang sudah dipilih" style="display:none" id="img-reset">
                                    <code class="text-right">Hapus Foto</code>
                                </a>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-file-image"></i>
                                    </div>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" id="img-file">
                                    <label class="custom-file-label" id="img-name">Pilih Foto</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg">
                        <div class="form-group">
                            <label class="text-info">Nama Pengguna</label>
                            <div class="col-sm-10">
                                <input type="text" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)" name="name" class="form-control" value="<?php echo $admin['name']; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-primary">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" value="<?php echo $admin['email']; ?>" />
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <div class="buttons">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#gantiPassword"> Ganti Password </button>
                    <button type="submit" name="simpan_admin" class="btn btn-primary"> Simpan </button>
                </div>
            </div>
        </form>
    </div>


    <div class="modal fade" id="gantiPassword" tabindex="-1" role="dialog" aria-labelledby="gantiPasswordLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gantiPasswordLabel">Ganti Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Password Lama</label>
                            <input type="password" name="password_lama" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="">Password Baru</label>
                            <input type="password" name="password_baru" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="ganti_password">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php

    if (isset($_POST['ganti_password'])) {
        $passwordLama = $_POST['password_lama'];
        $passwordBaru = $_POST['password_baru'];

        $passfix        = md5($passwordBaru);

        if (md5($passwordLama) == $admin['password']) {
            $koneksi->query("UPDATE tb_user SET password='$passfix' WHERE id='$id'");
            echo "<script type='text/javascript'>alert('Berhasil ganti password!'); window.location.href='index.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Password lama ga cocok!');</script>";
        }
    }

    if (isset($_POST['simpan_admin'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Untuk foto
        $foto     = $_FILES['foto']['name'];
        $file     = $_FILES['foto']['tmp_name'];
        $size     = $_FILES['foto']['size'];
        $tipe     = $_FILES['foto']['type'];
        $folder   = "upload/profil/";
        $saring   = array('gif', 'png', 'jpg');
        $ext      = pathinfo($foto, PATHINFO_EXTENSION);

        if (strlen($foto)) {
            // Cek format foto.
            $ext = pathinfo($foto, PATHINFO_EXTENSION);
            if (in_array($ext, $saring)) {
                // Cek ukurannya.
                // 5242880 = 5MB.
                if ($size < 5242880) {
                    // Jika Mencoba upload & jika berhasil di upload
                    if (move_uploaded_file($file, $folder . $img)) {
                        // UPDATE tb_pengguna sesuai ID nya.
                        $koneksi->query("UPDATE tb_user SET name='$nama', 
                        email='$email', foto='$foto' WHERE id='$id'");
    ?>
                        <script type="text/javascript">
                            alert("Data berhasil disimpan!");
                        </script>
                    <?php
                    } else {
                        // Jika gagal di upload.
                    ?>
                        <script type="text/javascript">
                            alert("Error!");
                        </script>
                    <?php
                    }
                } else {
                    // Jika gambar melebihi ukuran yang ditentukan.
                    ?>
                    <script type="text/javascript">
                        alert("Ukuran gambar terlalu besar! (Max : 5MB)");
                    </script>
                <?php
                }
            } else {
                // Jika format gambar tidak sesuai dengan $saring
                ?>
                <script type="text/javascript">
                    alert("Format gambar tidak dizinkan!");
                </script>
            <?php
            }
        } else {
            // Jika tidak upload foto, diganti dengan tanpa_foto.jpg
            $koneksi->query("UPDATE tb_user SET name='$name', 
            email='$email' WHERE id='$id'");
            ?>
            <script type="text/javascript">
                alert("Data berhasil disimpan!");
                window.location.href = "index.php";
            </script>
    <?php
        }
    }

    ?>


<?php } else { ?>
    <div class="card card-outline-danger">
        <div class="card-body">
            <h4 class="card-title">Profil</h4>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="text-info col-sm-2 control-label">Nama Pengguna</label>
                    <div class="col-sm-10">
                        <input type="text" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)" name="name" class="form-control" value="<?php echo $tampil['name']; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="text-primary col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" value="<?php echo $tampil['email']; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="text-success col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" class="form-control" value="<?php echo $tampil['address']; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="text-success col-sm-2 control-label">Kode Pos</label>
                    <div class="col-sm-10">
                        <input type="number" name="post_code" class="form-control" value="<?php echo $tampil['post_code']; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="text-success col-sm-2 control-label">Pekerjaan</label>
                    <div class="col-sm-10"