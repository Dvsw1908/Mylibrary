## Mylibrary
---------
Tentang Proyek 
---------
Proyek ini dibuat dengan topik "Website Sistem Manajemen Perpustakaan", Project ini juga dibuat untuk memenuhi salah satu kriteria penilaian UAS mata kuliah Back-End Programming dengan dosen pengampu Bapak Irvan Lewenusa, S.Kom., M.Kom.

Project ini dikerjakan oleh sekelompok mahasiswa dari program studi Teknik Informatika, kelas E di mata kuliah Back-End Programming.

Kelompok 18

- Devin Saputra Wijaya - 535220011 (dvsw1908)
- Paulin Agusisa - 535220048

-------------
Teknologi yang kami gunakan 
- Bahasa Pemrograman: PHP,JS
- Framework: Laravel
- Template Engine: Blade 
- Database: PostgreSQL

## Panduan Menginstallisasi 
------------------------------

1. Unduh dan install PHP dari situs php.net.
2. Download dan install Composer dari getcomposer.org.
3. Untuk mengelola database, unduh dan install PostgreSQL dari postgresql.org.
4. Install Node.js dari nodejs.org untuk pengelolaan paket JavaScript.
5. Gunakan pgadmin.org untuk mengunduh dan menginstal PgAdmin guna memantau dan mengelola database PostgreSQL.
6. Untuk pengembangan dan pengujian website di server lokal, unduh dan install XAMPP dari apachefriends.org.

## Panduan Menjalankan Website
-------------------------------

1. Masuk ke direktori proyek
2. Clone repository GitHub dengan perintah ```git clone https://github.com/kvnidn/backend-uas.git```
3. Instal Composer dengan menjalankan perintah  ```composer install```
4. Optimalkan proyek dengan menjalankan perintah ```php artisan optimize:clear```
5. Untuk menghasilkan APP_KEY di file .env, gunakan perintah ```php artisan key:generate```
6. Buat tabel-tabel di database sesuai skema yang telah ditentukan dengan perintah ```php artisan migrate```
7. Isi data awal ke database untuk menjalankan website dengan perintah ```php artisan db:seed```
8. Jalankan aplikasi pada server lokal dengan perintah ```php artisan serve```
9. Website akan berjalan pada port 8000
