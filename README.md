# Aplikasi berbasis web untuk mengelola tagihan dan pembayaran iuran warga perumahan.(Native)

Aplikasi berbasis web untuk mengelola tagihan dan pembayaran iuran warga perumahan secara lebih terstruktur, efisien, dan transparan.

## Deskripsi

Aplikasi ini dikembangkan berdasarkan kebutuhan nyata dari pihak perumahan untuk membantu pengelolaan iuran warga.

Sebelumnya, proses pencatatan masih dilakukan secara manual sehingga kurang efisien dan berisiko terjadi kesalahan.
Melalui aplikasi ini, proses pengelolaan iuran menjadi lebih mudah, terorganisir, dan transparan.

Project ini dibuat secara mandiri mulai dari perancangan hingga implementasi.

## Tujuan

* Meningkatkan efisiensi pengelolaan iuran
* Mengurangi kesalahan pencatatan manual
* Mempermudah monitoring pembayaran
* Menyediakan laporan kas yang rapi

## Pengguna

Aplikasi ini ditujukan untuk:

* **Pengurus perumahan**
  Untuk mengelola data warga, tagihan, dan pembayaran

* **Warga**
  Untuk melihat status pembayaran iuran secara transparan

## Fitur Utama

* Manajemen data warga
* Pembuatan tagihan iuran
* Input dan monitoring pembayaran
* Status pembayaran (lunas / belum)
* Laporan kas
* Riwayat transaksi

## Teknologi yang Digunakan

* PHP (CodeIgniter 3)
* MySQL
* HTML, CSS, JavaScript
* Bootstrap (jika digunakan)



## Cara Install

1. Clone repository

 https://github.com/eky16/-sistem-tagihan-iuran-perumahan.git


2. Pindahkan ke folder `htdocs` (jika menggunakan XAMPP)

3. Import database

* Buka phpMyAdmin
* Buat database baru
* Import file `.sql` 

4. Konfigurasi database

* Buka file:
   config/koneksi.php

* Sesuaikan:

```php
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'nama_database',
```

5. Jalankan project di browser
   http://localhost/nama_project

6. Untuk login `admin` kalian bisa menggunakan username = `superadmin` dan password `pw_admin`
7. Untuk login `karyawan` kalian bisa menggunakan username = `karyawan12` dan password `pw_karyawan12`

## Pengembangan Selanjutnya

* Notifikasi pembayaran
* Export laporan (PDF / Excel)
* Integrasi pembayaran online

## Author

Dikembangkan oleh:
**Eky Riswandiyah**

## Lisensi

Project ini dibuat untuk kebutuhan internal.

### Boleh ga memodifikasi aplikasi ini?
 
Aplikasi ini dapat dimodifikasi dan digunakan sesuai kebutuhan. Namun, diharapkan tetap mencantumkan credit kepada pembuat asli serta tidak menghapus informasi kepemilikan yang ada.

### Kalo di jual boleh ga?

**Dilarang Keras!** Aplikasi ini tidak diperbolehkan untuk diperjualbelikan secara langsung tanpa izin dari pembuat. Namun, aplikasi dapat digunakan sebagai referensi atau dikembangkan lebih lanjut sesuai kebutuhan dengan tetap mencantumkan credit.

### Tentang Saya

Saya adalah seorang IT Developer yang berfokus pada pengembangan aplikasi berbasis web. Memiliki pengalaman dalam membangun sistem internal perusahaan dari nol, termasuk perancangan database, pengembangan fitur, serta optimasi sistem untuk meningkatkan efisiensi operasional.
