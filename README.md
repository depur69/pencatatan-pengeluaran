# Sistem Pencatatan Pengeluaran

## 📌 Deskripsi Proyek

**Sistem Pencatatan Pengeluaran** adalah aplikasi berbasis web yang
digunakan untuk mencatat, mengelola, dan memantau data pengeluaran
pengguna secara terstruktur. Aplikasi ini dikembangkan sebagai proyek
tugas mata kuliah **Back-End Web Development** dengan tujuan menerapkan
konsep dasar pengembangan aplikasi web, khususnya pada sisi back-end.

Fokus utama pengembangan meliputi:

-   Autentikasi dan manajemen pengguna
-   Pengelolaan data berbasis database
-   Implementasi operasi CRUD (Create, Read, Update, Delete)
-   Pemisahan struktur folder agar kode lebih terorganisir

------------------------------------------------------------------------

## 👥 Daftar Anggota Kelompok

  ---------------------------------------------------------------------------------------
  Nama           NIM         GitHub        Peran
  -------------- ----------- ------------- ----------------------------------------------
  I Made         240030213   narendrap54   Front-End Developer, Dokumentasi & Testing
  Narendra Putra                           (UI, validasi sederhana, README.md, pengujian
                                           sistem)

  Dewa Made      240030237   depur69       Back-End Developer (struktur folder, koneksi
  Raditya                                  database, fitur Create & Read)
  Purnama Jaya                             

  Made Pramartha 240030251   Pramartha90   Database Designer & Logic (desain database,
  Devantara                                query SQL, fitur Update & Delete)
  ---------------------------------------------------------------------------------------

------------------------------------------------------------------------

## ⚙️ Lingkungan Pengembangan

Aplikasi ini dikembangkan dengan teknologi berikut:

-   **Bahasa Pemrograman**: PHP Native
-   **Database**: MySQL
-   **Web Server**: Apache (XAMPP)
-   **Frontend**: HTML, CSS
-   **Version Control**: Git & GitHub
-   **Code Editor**: Visual Studio Code

------------------------------------------------------------------------

## ✨ Fitur Utama

### 1. Autentikasi Pengguna

-   Registrasi pengguna baru
-   Login pengguna
-   Logout dan manajemen sesi

### 2. Manajemen Kategori

-   Menambahkan kategori pengeluaran
-   Mengubah data kategori
-   Menghapus kategori
-   Menampilkan daftar kategori

### 3. Manajemen Pengeluaran

-   Menambahkan data pengeluaran
-   Mengubah data pengeluaran
-   Menghapus data pengeluaran
-   Menampilkan daftar pengeluaran

### 4. Dashboard

-   Menampilkan total pengeluaran
-   Menampilkan pengeluaran pada bulan berjalan
-   Menampilkan jumlah transaksi

------------------------------------------------------------------------

## 📂 Struktur Folder

``` text
pencatatan-pengeluaran/
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── chart.js
│
├── auth/
│   ├── login.php
│   ├── register.php
│   └── logout.php
│
├── category/
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
├── expense/
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
├── config/
│   └── database.php
│
├── dashboard.php
├── index.php
└── README.md
```

------------------------------------------------------------------------

## 🛠️ Cara Instalasi dan Menjalankan Aplikasi

### Prasyarat

Pastikan perangkat telah terpasang: - PHP - MySQL Server - Visual Studio
Code

### Langkah Instalasi

1.  Clone repository ini ke dalam folder `htdocs` pada XAMPP.

2.  Jalankan **Apache** dan **MySQL** melalui XAMPP Control Panel.

3.  Buat database MySQL sesuai kebutuhan aplikasi.

4.  Import struktur tabel database (file `.sql` jika tersedia).

5.  Sesuaikan konfigurasi database pada file `config/database.php`.

6.  Buka folder proyek menggunakan **Visual Studio Code**.

7.  Jalankan server PHP:

    ``` bash
    php -S localhost:8000
    ```

8.  Akses aplikasi melalui browser:

        http://localhost:8000

------------------------------------------------------------------------

## 🧪 Pengujian

Pengujian dilakukan secara manual dengan memastikan: \* Login dan
registrasi berjalan baik \* CRUD kategori & pengeluaran berfungsi \*
Data sesuai database \* Navigasi halaman normal

------------------------------------------------------------------------

## 📝 Penutup

Sistem Pencatatan Pengeluaran ini dibuat sebagai media pembelajaran
dalam memahami konsep dasar **Back-End Web Development**. Diharapkan
aplikasi ini dapat menjadi fondasi untuk pengembangan sistem yang lebih
kompleks di masa depan.
