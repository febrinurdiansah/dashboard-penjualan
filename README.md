# Dashboard Penjualan – Laravel

Proyek ini dibuat sebagai bagian dari **Tes Staff IT** untuk CV Rumah mesin.
Aplikasi menampilkan laporan penjualan dengan fitur tabel, grafik, total penjualan, dan filter tanggal.

**Link Aplikasi Yang Telah Di-Hosting:**
[Akses Dashboard Penjualan di sini](https://dashboard-penjualan-production-6c8d.up.railway.app/) 
---

## Tech Stack

- **Laravel 10/11**
- **MySQL**
- **Chart.js**
- **PHP 8.1+**
- **Railway**

---

## Installation (Local)

Ikuti langkah berikut untuk menjalankan aplikasi di lokal:

### 1. Clone Repository
```bash
git clone https://github.com/USERNAME/dashboard-penjualan.git
cd dashboard-penjualan
```
### 2. Install Dependencies
```bash
composer install
```
3. Copy File Environment
```bash
cp .env.example .env
```
4. Generate Key
```bash
php artisan key:generate
```
5. Setup Database

Buat database MySQL baru bernama `dashboard_penjualan` menggunakan klien database Anda (seperti phpMyAdmin atau MySQL Workbench).

Edit konfigurasi pada file .env:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dashboard_penjualan
DB_USERNAME=root
DB_PASSWORD=
```

6. Jalankan Migration & Seeder
```bash
php artisan migrate
php artisan db:seed --class=SalesSeeder
```

7. Jalankan Server
```bash
php artisan serve
```

Aplikasi dapat diakses di:
http://127.0.0.1:8000
