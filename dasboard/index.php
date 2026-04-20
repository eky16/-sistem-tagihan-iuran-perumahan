<?php
session_start();
include('../koneksi.php'); // Karna dipanggil di sini
if (!isset($_SESSION['id'])) {
  return header("location: login.php");
}
$data = $koneksi->query("SELECT * FROM users WHERE id = '" . $_SESSION['id'] . "'")->fetch_assoc();
$tingkatan = $data['tingkatan'];

$judul = "Test";
$page = isset($_GET['page']) ? $_GET['page'] : "";
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";
if ($page) {
  if ($tingkatan == 'admin') {
    switch ($page) {
      case 'dashboard':
        $judul = "DASHBOARD";
        break;
      case 'data-warga':
        if ($aksi == 'tambah') {
          $judul = "Tambah Data Warga";
        } else if ($aksi == 'ubah') {
          $judul = "Ubah Data Warga";
        } else if ($aksi == 'iuran') {
          $judul = "Iuran Data Warga";
        } else if ($aksi == 'rincian'){
          $judul = "Rincian Data Warga";
        } else {
          $judul = "Data Warga";
        }
        break;
      case 'info-iuran':
        if ($aksi == 'tambah') {
          $judul = "Info Iuran";
        } else if ($aksi == 'ubah') {
         $judul = "Ubah Info Iuran";
        } else {
         $judul = "Info Iuran";
        }
        break;
      case 'laporan-kas':
        if ($aksi == 'tambah') {
          $judul = "Tambah laporan kas";
        } else if ($aksi == 'ubah') {
         $judul = "Ubah laporas kas";
        } else {
         $judul = "Laporan kas";
        }
        break;
        case 'transaksi':
          if ($aksi == 'rincian') {
         $judul = "Rincian transaksi";
        } else {
         $judul = "Transaksi";
        }
        break;
        case 'setting':
          $judul = 'Setting';
         
        break;
      default;
        $judul = "DASHBOARD";
        break;
    }
  } else if ($tingkatan == 'bendahara') {
    // Halaman untuk bendahara
    switch ($page) {
      case 'dashboard':
        $judul = "Dashboard";
        break;
      case 'data-warga':
        if ($aksi == 'tambah') {
         $judul = "Tambah Data Warga";
        } else if ($aksi == 'ubah') {
          $judul = "Ubah Data Warga";
        } else if ($aksi == 'iuran') {
          $judul = "Iuran Data Warga";
        } else if ($aksi == 'rincian'){
          $judul = "Rincian Data Warga";
        } else {
          $judul = "Data Warga";
        }
        break;
      case 'info-iuran':
        if ($aksi == 'tambah') {
         $judul = "Tambah Info Iuran";
        } else if ($aksi == 'ubah') {
         $judul = "Ubah Info Iuran";
        } else {
          $judul = "Info Iuran";
        }
        break;
      case 'laporan-kas':
        if ($aksi == 'tambah') {
        $judul = "Tambah Laporan Kas";
        } else if ($aksi == 'ubah') {
           $judul = "Ubah Laporan Kas";
        } else {
           $judul = "Laporan Kas";
        }
        break;
        case 'transaksi':
          if ($aksi == 'rincian') {
           $judul = "Rincian Transaksi";
        } else {
          $judul = "Transaksi";
        }

        break;
        case 'laporan_transaksi':
          if ($aksi == 'cetak') {
           $judul = "Cetak Laporan Transaksi";
        } else {
          $judul = "Laporan Transaksi";
        }
        break;
      default;
        $judul = "DASHBOARD";
        break;
    }
     
  } else {
    // Halaman untuk pengguna
    switch ($page) {
      case 'dashboard':
        $judul = "Dashboard";
        break;

      case 'info-iuran';
        if ($aksi == 'tambah') {
           $judul = "Tambah Info Iuran";
        } else if ($aksi == 'ubah') {
          $judul = "Ubah Info Iuran";
        } else {
          $judul = "Info Iuran";
        }
        break;
      case 'laporan-kas':
        if ($aksi == 'tambah') {
           $judul = "Tambah Laporan Kas";
        } else if ($aksi == 'ubah') {
        $judul = "Ubah Laporan Kas";
        } else {
     $judul = "Laporan Kas";
        }
        break;
      case 'transaksi':
        if ($aksi == 'rincian') {
          $judul = "Rincian Transaksi";
        } else {
         $judul = "Transaksi";
        }
        break;
      default:
    }
  }
} else {
  $judul = "DASHBOARD";
}


include('header.php');
?>
<!-- Page Wrapper -->
<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Bumi Indah RT02 <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachmometer-alt"></i>
        <span>DASHBOARD</span></a>
    </li>

    <?php if ($tingkatan == 'admin') { ?>
      <!-- Nav Item - Data Warga -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=data-warga">
          <i class="fas fa-fw fa-tachmometer-alt"></i>
          <span>DATA WARGA</span></a>
      </li>

      <!-- Nav Item - Transaksi warga -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=info-iuran">
          <i class="fas fa-fw fa-tachmometer-alt"></i>
          <span>INFO IURAN</span></a>
      </li>

      <!-- Nav Item - Laporan Kas -->

      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=laporan-kas">
          <i class="fas fa-fw fa-tachmometer-alt"></i>
          <span>LAPORAN IURAN </span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=transaksi">
          <i class="fas fa-fw fa-tachmometer-alt"></i>
          <span>TRANSAKSI </span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=setting">
          <i class="fas fa-fw fa-tachmometer-alt"></i>
          <span>SETTING </span></a>
      </li>
    <?php } ?>

    <?php
    if ($tingkatan == 'pengguna') { ?>

      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=info-iuran">
          <i class="fas fa-fw fa-tachmometer-alt"></i>
          <span>INFO IURAN</span></a>
      </li>

      
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=transaksi">
          <i class="fas fa-fw fa-tachmometer-alt"></i>
          <span>TRANSAKSI </span></a>
      </li>

    <?php } ?>
    <?php
    if ($tingkatan == 'bendahara') { ?>
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=data-warga">
          <i class="fas fa-fw fa-tachmometer-alt"></i>
          <span>DATA WARGA</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=info-iuran">
          <i class="fas fa-fw fa-tachmometer-alt"></i>
          <span>INFO IURAN</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=laporan-kas">
          <i class="fas fa-fw fa-tachmometer-alt"></i>
          <span>LAPORAN IURAN </span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=transaksi">
          <i class="fas fa-fw fa-tachmometer-alt"></i>
          <span>TRANSAKSI </span></a>
      </li>

    <?php } ?>
    <!-- Nav Item - Pages Collapse Menu -->
   


  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>
          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hi <?php echo $data['username']; ?></span>
              <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               <a class="dropdown-item" href="#" data-toggle="modal" data-target="#gantiPassword">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
               Profile
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>

      </nav>
      <!-- End of Topbar -->
      <div class="container">
        <?php
        if ($page) {
          if ($tingkatan == 'admin') {
            switch ($page) {
              case 'dashboard':
                include "dashboard.php";
                break;
              case 'setting':
                include 'setting.php';
                break;
              case 'data-warga':
                if ($aksi == 'tambah') {
                  include "createdatawarga.php";
                } else if ($aksi == 'ubah') {
                  include "ubahdatawarga.php";
                } else if ($aksi == 'iuran') {
                  include "iuranwarga.php";
                } else if ($aksi == 'rincian'){
                  include "rincian.php";
                } else {
                  include "datawarga.php";
                }
                break;
              case 'info-iuran':
                if ($aksi == 'tambah') {
                  include "createinfoiuran.php";
                } else if ($aksi == 'ubah') {
                  include "ubahinfoiuran.php";
                } else {
                  include "infoiuran.php";
                }
                break;
              case 'laporan-kas':
                if ($aksi == 'tambah') {
                  include "createlaporankas.php";
                } else if ($aksi == 'ubah') {
                  include "ubahlaporankas.php";
                } else {
                  include "laporankas.php";
                }
                break;
                case 'transaksi':
                  if ($aksi == 'rincian') {
                  include  "rincian.php";
                } else {
                  include  "transaksi.php";
                }
                  break;
                break;
              default;
                include "dashboard.php";
                break;
            }
          } else if ($tingkatan == 'bendahara') {
            // Halaman untuk bendahara
            switch ($page) {
              case 'dashboard':
                include "dashboard.php";
                break;
              case 'data-warga':
                if ($aksi == 'tambah') {
                  include "createdatawarga.php";
                } else if ($aksi == 'ubah') {
                  include "ubahdatawarga.php";
                } else if ($aksi == 'iuran') {
                  include "iuranwarga.php";
                } else if ($aksi == 'rincian'){
                  include "rincian.php";
                } else {
                  include "datawarga.php";
                }
                break;
              case 'info-iuran':
                if ($aksi == 'tambah') {
                  include "createinfoiuran.php";
                } else if ($aksi == 'ubah') {
                  include "ubahinfoiuran.php";
                } else {
                  include "infoiuran.php";
                }
                break;
              case 'laporan-kas':
                if ($aksi == 'tambah') {
                  include "createlaporankas.php";
                } else if ($aksi == 'ubah') {
                  include "ubahlaporankas.php";
                } else {
                  include "laporankas.php";
                }
                break;
                case 'transaksi':
                  if ($aksi == 'rincian') {
                  include  "rincian.php";
                } else {
                  include  "transaksi.php";
                }

                break;
                case 'laporan_transaksi':
                  if ($aksi == 'cetak') {
                  include  "cetak.php";
                } else {
                  include  "laporan_transaksi.php";
                }
                 
                break;
              default;
                include "dashboard.php";
                break;
            }
             
          } else {
            // Halaman untuk pengguna
            switch ($page) {
              case 'dashboard':
                include "dashboard.php";
                break;

              case 'info-iuran';
                if ($aksi == 'tambah') {
                  include "createinfoiuran.php";
                } else if ($aksi == 'ubah') {
                  include "ubahinfoiuran.php";
                } else {
                  include  "infoiuran.php";
                }
                break;
              case 'laporan-kas':
                if ($aksi == 'tambah') {
                  include "createlaporankas.php";
                } else if ($aksi == 'ubah') {
                  include "ubahlaporankas.php";
                } else {
                  include  "laporankas.php";
                }
                break;
              case 'transaksi':
                if ($aksi == 'rincian') {
                  include "rincian.php";
                } else {
                  include  "transaksi.php";
                }
                break;
              default:
            }
          }
        } else {
          include "dashboard.php";
        }

        ?>
      </div>
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

        $id = $data['id'];

        $passfix        = md5($passwordBaru);

        if (md5($passwordLama) == $data['password']) {
            $koneksi->query("UPDATE users SET password='$passfix' WHERE id='$id'");
            echo "<script type='text/javascript'>alert('Berhasil ganti password!'); window.location.href='index.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Password lama ga cocok!');</script>";
        }
    }

    include('footer.php');
    ?>