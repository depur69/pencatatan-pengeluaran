# Sistem Pencatatan Pengeluaran

## Deskripsi Singkat
Sistem Pencatatan Pengeluaran adalah aplikasi berbasis web yang digunakan untuk mencatat dan mengelola data pengeluaran pengguna. Aplikasi ini dikembangkan sebagai proyek tugas mata kuliah **Back-End Web Development** dengan menerapkan konsep autentikasi pengguna, pengelolaan data berbasis database, serta operasi CRUD (Create, Read, Update, Delete).

---

## Daftar Anggota
| Nama | NIM | Username GitHub | Peran |
|------|-----|----------------|-------|
|I Made Narendra Putra | 240030213 | narendrap54 | Front-End Developer, Dokumentasi & Testing: Tampilan UI, dan validasi sederhana, Dokumentasi README.md dan pengujian sistem |
|Dewa Made Raditya Purnama Jaya | 240030237 | depur69 | Back-End Developer: Struktur folder, koneksi database, fitur Create & Read |
|Made Pramartha Devantara | 240030251 | Pramartha90 | Database Designer dan Logic: Desain database, query SQL, fitur Update & Delete |




---

## Lingkungan Pengembangan
Aplikasi ini dikembangkan menggunakan:
- Bahasa Pemrograman: PHP Native
- Database: MySQL
- Web Server: Apache (XAMPP)
- Frontend: HTML dan CSS
- Version Control: Git dan GitHub
- Code Editor: Visual Studio Code

---

## Hasil Pengembangan
Berikut merupakan implementasi modul dan fitur utama yang telah dikembangkan:

### 1. Autentikasi Pengguna
- Login pengguna
- Registrasi pengguna
- Logout dan pengelolaan sesi

### 2. Manajemen Kategori
- Menambahkan kategori pengeluaran
- Mengubah data kategori
- Menghapus kategori
- Menampilkan daftar kategori

### 3. Manajemen Pengeluaran
- Menambahkan data pengeluaran
- Mengubah data pengeluaran
- Menghapus data pengeluaran
- Menampilkan daftar pengeluaran

### 4. Dashboard
- Menampilkan total pengeluaran
- Menampilkan pengeluaran bulan berjalan
- Menampilkan jumlah transaksi

---

## Struktur Folder
Susunan file dan folder dalam proyek adalah sebagai berikut:

```text
pencatatan-pengeluaran/
├── assets/
│   └── css/
│      └── style.css
│   └── js/
│       └── chart.js
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
## Cara Instalasi dan Menjalankan Aplikasi
--- 
1. Clone repository proyek ini ke dalam folder `htdocs`.
2. Jalankan Apache dan MySQL melalui XAMPP.
3. Buat database MySQL sesuai dengan konfigurasi aplikasi.
4. Import struktur tabel ke dalam database.
5. Sesuaikan konfigurasi database pada file `config/database.php`.
6. Buka Command Prompt (CMD), lalu jalankan server PHP dengan perintah: `php -S localhost:8000`
8. Akses aplikasi melalui browser dengan alamat: `http://localhost:8000`



## Penutup
---
Sistem Pencatatan Pengeluaran ini dibuat untuk memenuhi tugas perkuliahan dan dapat dikembangkan lebih lanjut sesuai kebutuhan.
