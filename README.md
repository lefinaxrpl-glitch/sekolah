# 📚 Aplikasi Data Siswa

Aplikasi Data Siswa merupakan aplikasi berbasis web yang dibuat menggunakan **PHP Native dan MySQL** untuk mengelola data siswa secara sederhana dan efisien.

Project ini dibuat sebagai latihan implementasi CRUD (Create, Read, Update, Delete) dalam pembelajaran pemrograman web.

## ✨ Fitur

- 📋 Menampilkan data siswa
- ➕ Menambahkan data siswa
- ✏️ Mengedit data siswa
- 🗑️ Menghapus data siswa
- 🔍 Mencari data siswa
- 📊 Menampilkan jumlah seluruh siswa
- 🎨 Tampilan modern dengan tema Soft Sage & Cream

## 🛠️ Teknologi

- PHP Native
- MySQL
- HTML5
- CSS3
- JavaScript
- XAMPP

## 📁 Struktur Folder

```text
sekolah/
│
├── koneksi.php
├── index.php
├── tampil.php
├── tambah.php
├── edit.php
├── hapus.php
└── README.md
```

## ⚙️ Cara Instalasi

1. Download atau clone repository ini.
2. Pindahkan folder `sekolah` ke dalam direktori `C:\xampp\htdocs`.
3. Jalankan Apache dan MySQL melalui XAMPP.
4. Buka phpMyAdmin melalui `http://localhost/phpmyadmin`.
5. Buat database dengan nama `sekolah`.
6. Jalankan SQL berikut:

```sql
CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nis VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    kelas VARCHAR(20) NOT NULL
);
```

7. Pastikan konfigurasi database pada `koneksi.php` sesuai:

```php
$conn = mysqli_connect("localhost", "root", "", "sekolah");
```

8. Buka aplikasi melalui browser:

```text
http://localhost/sekolah/
```

## 🎨 Tampilan Aplikasi

Aplikasi menggunakan kombinasi warna Soft Sage & Cream dengan desain sederhana, bersih, dan nyaman digunakan.

## 🎯 Tujuan Project

Project ini bertujuan untuk memahami:
- Koneksi PHP dengan database MySQL.
- Operasi CRUD pada database.
- Penggunaan query SQL.
- Penggunaan form HTML.
- Pengolahan data menggunakan PHP.
- Pembuatan tampilan web menggunakan CSS.

## 👩‍💻 Author

**Lefina Restiana Wahyu Saputri**

Project Pembelajaran Pemrograman Web

---

⭐ Terima kasih telah mengunjungi repository ini!