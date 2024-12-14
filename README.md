# Raebook Backend

Raebook Backend adalah aplikasi backend yang dikembangkan menggunakan [Laravel Sanctum](https://laravel.com/docs/10.x/sanctum) untuk memberikan autentikasi API yang aman dan efisien pada aplikasi mobile.

## Fitur Utama
- **Autentikasi Token** menggunakan Laravel Sanctum.
- **Manajemen Pengguna**: Registrasi, login, dan pembaruan data pengguna.
- **Endpoint API** untuk mendukung aplikasi mobile.
- **Middleware Keamanan** untuk melindungi endpoint API.

## Persyaratan Sistem
- **PHP** versi 8.1 atau lebih baru
- **Composer** versi terbaru
- **MySQL** atau database lain yang kompatibel
- **Laravel** versi 10.x

## Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/reynaldiarya/RaeBook-Backend.git
cd RaeBook-Backend
```

### 2. Instal Dependensi
Jalankan perintah berikut untuk menginstal semua dependensi proyek:
```bash
composer install
```

### 3. Konfigurasi Lingkungan
Salin file `.env.example` menjadi `.env` dan atur konfigurasi yang sesuai:
```bash
cp .env.example .env
```
Edit file `.env` untuk mengatur:
- Database (DB_DATABASE, DB_USERNAME, DB_PASSWORD)
- App Key (`php artisan key:generate` untuk menghasilkan kunci aplikasi)

### 4. Migrasi Database
Jalankan migrasi untuk membuat tabel database:
```bash
php artisan migrate --seed
```

### 5. Jalankan Server Lokal
Gunakan perintah berikut untuk menjalankan server lokal:
```bash
php artisan serve
```
Akses aplikasi di: `http://localhost:8000`

### Auth API
Gunakan token di header `Authorization` untuk mengakses route yang membutuhkan autentikasi:
```
Authorization: Bearer your-access-token
```

## Lisensi
Proyek ini menggunakan lisensi [MIT](LICENSE).
