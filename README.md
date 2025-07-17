## Daftar Isi

1.  [Persyaratan Sistem](https://www.google.com/search?q=%23persyaratan-sistem)
2.  [Instalasi](https://www.google.com/search?q=%23instalasi)
    -   [Kloning Repositori](https://www.google.com/search?q=%23kloning-repositori)
    -   [Instalasi Dependencies](https://www.google.com/search?q=%23instalasi-dependencies)
    -   [Konfigurasi Environment](https://www.google.com/search?q=%23konfigurasi-environment)
    -   [Menyiapkan Penyimpanan Data](https://www.google.com/search?q=%23menyiapkan-penyimpanan-data)
    -   [Menjalankan Server Lokal](https://www.google.com/search?q=%23menjalankan-server-lokal)
3.  [Penggunaan](https://www.google.com/search?q=%23penggunaan)
4.  [Struktur Proyek](https://www.google.com/search?q=%23struktur-proyek)

---

## 1\. Persyaratan Sistem

Pastikan sistem Anda telah menginstal beberapa hal berikut sebelum memulai:

-   **PHP:** Versi 8.1 atau lebih tinggi
-   **Composer:** [Manajer dependensi PHP](https://getcomposer.org/)
-   **Node.js & NPM:** Untuk mengelola dependensi JavaScript
-   **Git:** Untuk mengkloning repositori

## 2\. Instalasi

Ikuti langkah-langkah di bawah ini untuk menyiapkan proyek di lingkungan lokal Anda.

### Kloning Repositori

Buka terminal Anda dan jalankan perintah berikut untuk mengkloning proyek:

```bash
git clone https://github.com/nama-pengguna/nama-proyek.git
cd nama-proyek
```

### Instalasi Dependencies

Instal semua dependensi PHP dan JavaScript yang diperlukan:

```bash
composer install
npm install
```

### Konfigurasi Environment

Salin file `.env.example` dan ubah namanya menjadi `.env`.

```bash
cp .env.example .env
```

Kemudian, generate _application key_ untuk mengamankan sesi pengguna dan data terenkripsi:

```bash
php artisan key:generate
```

### Menyiapkan Penyimpanan Data

Proyek ini tidak menggunakan database relasional. Semua data disimpan dalam file CSV.

-   File-file CSV akan berada di direktori `storage/app/data/`.
-   Pastikan direktori tersebut ada dan memiliki izin tulis yang benar. Anda bisa membuatnya secara manual jika belum ada:

<!-- end list -->

```bash
mkdir -p storage/app/data
```

Jika proyek Anda memiliki data awal, pastikan file CSV tersebut sudah ada di direktori yang benar sebelum menjalankan aplikasi.

### Menjalankan Server Lokal

Jalankan perintah berikut untuk memulai server pengembangan Laravel:

```bash
php artisan serve
```

Server akan berjalan di `http://127.0.0.1:8000`.

Untuk mengkompilasi file CSS dengan Tailwind CSS dan mengaktifkan _live-reloading_ saat Anda melakukan perubahan pada _view_, buka terminal lain dan jalankan:

```bash
npm run dev
```

Jika Anda ingin mengkompilasi _asset_ untuk produksi, gunakan:

```bash
npm run build
```

## 3\. Penggunaan

Setelah server berjalan, Anda dapat mengakses aplikasi melalui URL yang diberikan.

-   Akses halaman beranda di: `http://127.0.0.1:8000`

Jelaskan cara penggunaan aplikasi secara lebih detail di sini, misalnya:

-   Cara menambah, mengubah, atau menghapus data (sesuai dengan implementasi CSV).
-   Fitur-fitur utama yang tersedia.

## 4\. Struktur Proyek

Berikut adalah struktur direktori utama dari proyek ini:

-   `app/`: Berisi semua _logic_ inti aplikasi Anda.
-   `config/`: Berisi semua file konfigurasi.
-   `public/`: Direktori yang dapat diakses publik, berisi file _asset_ terkompilasi.
-   `resources/`: Berisi file _view_ (`.blade.php`) dan _asset_ mentah.
-   `routes/`: Semua definisi rute aplikasi Anda.
-   `storage/`: Berisi file _cache_, sesi, dan direktori data (`storage/app/data/`) yang menyimpan file-file CSV.
