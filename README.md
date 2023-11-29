# Web Api Untuk Test Di PT. AVERIN TEKNOLOGI INFORMATIKA

Aplikasi ini dibuat sederhana menggunakan Bahasa Pemrograman PHP dan framework LARAVEL versi 10. Dimana aplikasi ini akan melakukan CRUD api data student dengan contoh response yang akan di includekan pada email yang nantinya akan saya kirim ke pihak PT. AVERIN TEKNOLOGI SISTEM

# Instalasi Web Api

### Recomended Spec

-   Terinstall Node JS https://nodejs.org/en/download
-   Terinstall GIT untuk menjalankan Command git https://git-scm.com/download/win
-   Composer versi up to 2.4 https://getcomposer.org/Composer-Setup.exe
-   PHP minimum versi 8.1
-   Anda bisa menggunakan tools dibawah ini: (Pilih salah satu)

*   XAMPP: https://www.apachefriends.org/download.html
*   LARAGON: https://laragon.org/download/index.html
*   WampServer: https://sourceforge.net/projects/wampserver/

### Instalasi

-   Clone projek ini dengan perintah berikut

```
git clone https://github.com/hariaja/test-averin-apps.git
```

-   Buka terminal projek setelah meng-clone, kemudian jalankan perintah dibawah ini

```
composer install
```

```
cp .env.example .env
```

```
php artisan key:generate
```

-   Konfigurasi database (MySQL, PosgreSQL dll)
-   Hubungkan database (yang sudah dibuat) dengan projek
-   Kemudian jalankan perintah dibawah ini

```
php artisan migrate
```

-   Jalankan serve dengan:

```
php artisan serve
```
