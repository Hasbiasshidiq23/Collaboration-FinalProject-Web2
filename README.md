# Final Proyek Web Programming 2
<ul>
  <li>Mata Kuliah: Web Programming 2</li>
  <li>Dosen Pengampu: <a href="https://github.com/Muhammad-Ikhwan-Fathulloh">Muhammad Ikhwan Fathulloh</a></li>
</ul>

## Kelompok
<ul>
  <li>Kelompok: 4</li>
  <li>Proyek: Sistem Manajemen Gudang</li>
  <li>Anggota:</li>
  <ul>
    <li>Ketua: <a href="">Hasbi As-Shidiq</a></li>
    <li>Anggota 1: <a href="">Hasbi As-Shidiq</a></li>
    <li>Anggota 2: <a href="">Hilmansyah</a></li>
  </ul>
</ul>

## Judul Proyek
<p>Sistem Manajemen Gudang</p>

## Penjelasan Proyek
<li>Sistem Manajemen Gudang <br>Spesifikasi:</li>

# Fitur Aplikasi

## Login
**Deskripsi:**  
Fitur ini menyediakan fungsi autentikasi pengguna. Pengguna dapat masuk ke dalam sistem dengan memasukkan username dan password yang valid.

**File Terkait:**  
- `login.blade.php`
- `AuthController.php`
- `User.php` (model)

## Register
**Deskripsi:**  
Fitur ini memungkinkan pengguna baru untuk mendaftarkan akun mereka dengan mengisi informasi yang diperlukan.

**File Terkait:**  
- `register.blade.php`
- `AuthController.php`
- `User.php` (model)

## Data Barang
**Deskripsi:**  
Fitur ini memungkinkan pengguna untuk menambahkan barang baru dan melihat daftar barang yang telah ditambahkan.

**File Terkait:**  
- `dataBarang.blade.php`
- `BarangController.php`
- `Barang.php` (model)

## Departemen
**Deskripsi:**  
Fitur ini memungkinkan pengguna untuk menambahkan dan mengelola informasi departemen dalam sistem.

**File Terkait:**

**View:**  
- `dataDepartemen.blade.php`
  - Menyediakan antarmuka untuk menampilkan dan menambahkan departemen.
  - Contoh fungsi: Formulir untuk menambahkan departemen baru, tabel untuk melihat daftar departemen yang ada.

**Controller:**  
- `DepartemenController.php`
  - Mengatur logika bisnis untuk menambahkan, mengedit, menghapus, dan menampilkan departemen.
  - Contoh fungsi: `store()` untuk menyimpan departemen baru, `index()` untuk menampilkan daftar departemen, `update()` untuk memperbarui data departemen, dan `destroy()` untuk menghapus departemen.

**Model:**  
- `Departemen.php`
  - Mewakili tabel departemen dalam basis data.
  - Contoh fungsi: Mendefinisikan atribut departemen, relasi dengan model lain jika ada, dan query terkait departemen.

## Supplier
**Deskripsi:**  
Fitur ini memungkinkan pengguna untuk menambahkan dan mengelola informasi supplier dalam sistem.

**File Terkait:**

**View:**  
- `dataSupplier.blade.php`
  - Menyediakan antarmuka untuk menampilkan dan menambahkan supplier.
  - Contoh fungsi: Formulir untuk menambahkan supplier baru, tabel untuk melihat daftar supplier yang ada.

**Controller:**  
- `SupplierController.php`
  - Mengatur logika bisnis untuk menambahkan, mengedit, menghapus, dan menampilkan supplier.
  - Contoh fungsi: `store()` untuk menyimpan supplier baru, `index()` untuk menampilkan daftar supplier, `update()` untuk memperbarui data supplier, dan `destroy()` untuk menghapus supplier.

**Model:**  
- `Supplier.php`
  - Mewakili tabel supplier dalam basis data.
  - Contoh fungsi: Mendefinisikan atribut supplier, relasi dengan model lain jika ada, dan query terkait supplier.

## Riwayat Transaksi
**Deskripsi:**  
Fitur ini memungkinkan pengguna untuk melihat dan mengelola riwayat transaksi penjualan dan pembelian barang.

**File Terkait:**

**View:**  
- `riwayatTransaksi.blade.php`
  - Menyediakan antarmuka untuk menampilkan riwayat transaksi.
  - Contoh fungsi: Tabel untuk melihat daftar transaksi yang sudah terjadi, filter untuk mencari transaksi berdasarkan tanggal atau kriteria lain.

**Controller:**  
- `RiwayatTransaksiController.php`
  - Mengatur logika bisnis untuk menampilkan riwayat transaksi.
  - Contoh fungsi: `index()` untuk menampilkan daftar transaksi, `show()` untuk menampilkan detail transaksi tertentu.

**Model:**  
- `RiwayatTransaksi.php`
  - Mewakili tabel riwayat transaksi dalam basis data.
  - Contoh fungsi: Mendefinisikan atribut transaksi, relasi dengan model lain seperti Barang dan User, dan query terkait riwayat transaksi.

# Komponen Proyek

Menggunakan Framework Laravel. Jika ingin menerapkan Rest API, gunakan Vue JS/React JS.

# Pembagian Tim

- **Hasbi As Shidiq:** Login, Register, Barang Masuk Keluar, Pengurutan Barang, Riwayat Transaksi, Profile, dan Logout.
- **Hilmansyah:** Pembelian, Penjualan, dan Riwayat Barang.

# Demo Proyek

- Github: [Github](#)
- Youtube: https://youtube.com/playlist?list=PLkeLQMFV23gC9kxclLsN7Aak77-nflJd5&si=9P0l39YQQ4-RlPQK
```
