# 🦎 Sistem Pakar untuk Mendiagnosis Penyakit Reptil Iguana dengan Metode Forward Chaining

Sistem ini merupakan **aplikasi web berbasis sistem pakar** yang digunakan untuk mendiagnosa penyakit pada iguana.  
Aplikasi ini bertujuan memberikan informasi kepada pecinta iguana mengenai penyakit yang dapat menyerang iguana, serta langkah penanganan dan solusi terbaik agar kesehatan iguana tetap terjaga dengan baik.

---

## ✨ Fitur Utama
- Diagnosa penyakit pada iguana berbasis sistem pakar
- Informasi lengkap mengenai jenis penyakit iguana
- Rekomendasi langkah penanganan dan solusi terbaik
- Tampilan antarmuka web yang sederhana dan mudah digunakan
- Database terintegrasi untuk menyimpan data penyakit, gejala, dan hasil diagnosa

---

## 🛠️ Teknologi yang Digunakan
- **PHP** (Backend)
- **MySQL / phpMyAdmin** (Database)
- **HTML, CSS, JavaScript** (Frontend)
- **XAMPP / LAMPP** (Web Server)

---

## 🚀 Cara Instalasi & Menjalankan Aplikasi

1. **Clone / Copy Project ke htdocs**
   ```bash
   cd /opt/lampp/htdocs/
   git clone https://github.com/youliant/sistem-pakar-iguana.git
2.Import Database
  a.Masuk ke phpMyAdmin melalui browser:
    http://localhost/phpmyadmin
  b.Buat database baru (iguana_fcdb sesuai yang ada di folder database).
  c.Import file database dari folder:
    /htdocs/pakariguana/database ada disini import dan masukan/iguana_fcdb.sql
3.Konfigurasi Koneksi Database
  a.Buka file konfigurasi koneksi.php
  b.Sesuaikan dengan pengaturan MySQL kamu:
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "iguana_fcdb"; ==> ganti disini sesuai dengan database yang sudah dibikin
4.Jalankan Apache & MySQL
  sudo /opt/lampp/lampp start ==> ini saya pakai linux kalau windows tinggal buka aplikasi xampp dan klik apache sama mysql
5.Akses Aplikasi
  a.Buka browser dan ketik:
    http://localhost/pakariguana/




