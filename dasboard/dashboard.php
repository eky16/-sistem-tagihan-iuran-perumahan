<?php

function rupiah($angka){
    $hasil_rupiah = number_format($angka,2,',','.');
    return "Rp " . $hasil_rupiah;
}

$tanggalHariIni = date('Y-m');

$dataWarga  = $koneksi->query("SELECT * FROM pendataan");
$infoBayar  = $koneksi->query("SELECT SUM(total) AS total FROM info_bayar");
$laporanKas = $koneksi->query("SELECT SUM(saldo) AS saldo FROM laporan_kas");
$setting    = $koneksi->query("SELECT * FROM setting");
$infoBayar2 = $koneksi->query("SELECT SUM(total) AS total FROM info_bayar WHERE tanggal LIKE '$tanggalHariIni%' AND status = 'sudah_bayar'");

$totalWarga = mysqli_num_rows($dataWarga);
$pemasukkan = $infoBayar->fetch_assoc();
$saldoAkhir = $laporanKas->fetch_assoc();
$info       = $setting->fetch_assoc();

$pemasukkanPerBulan = $infoBayar2->fetch_assoc();

?>
 <?php if ($tingkatan == 'admin') { ?>
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Selamat Datang</h1>
        </div>
        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
           

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Warga RT.02</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800"><?= $totalWarga ?></div>
                            </div>
                            <div class="col-auto">
                                <i class=" fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Seluruh Pemasukkan</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800"><?= rupiah($pemasukkan['total']); ?></div>
                            </div> 
                            <div class="col-auto">
                                <i class=" fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pemasukkan Bulan ini</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800"><?= rupiah($pemasukkanPerBulan['total']); ?></div>
                            </div> 
                            <div class="col-auto">
                                <i class=" fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
 <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Saldo Akhir</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800"><?= rupiah($saldoAkhir['saldo']); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class=" fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 <?php } ?>

<div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    NAMA ADMIN</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800"><?= $info['nama_bendahara']; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class=" fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    NAMA RT 02/ RW 06</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800"><?= $info['nama_rt']; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class=" fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

         <!--   <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">

                                     NAMA PERUMAHAN</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800"><?= $info['nama_perumahan']; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class=" fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
