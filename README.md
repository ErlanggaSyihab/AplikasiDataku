<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
    </a>
    <a href="https://tailwindcss.com" target="_blank">
        <img src="https://github.com/user-attachments/assets/14234e2d-f5ae-4061-b27b-da955bbfa57c" width="300" alt="Tailwind CSS Logo">
    </a>
</p>

#  Pembangunan Aplikasi Inventaris barang Berbasis Website di Mall Pelayanan Publik Kota Bandung

Proyek ini bertujuan Untuk Membangun sebuah berupa Aplikasi dalam bentuk Website yang bertujuan untuk untuk dapat agar Perusahaan lebih mudah dalam Mengatur dan Mengetahui barang-barang yang ada di perusahaan tersebut. 
Adapun Pendukung dari pembuatan Website ini adalah Backend menggunakan "LARAVEL" Sebagai Akses Untuk Melakukan Integrasi ke dalam database dan Lainnya,Selain itu Untuk FrontEnd Menggunakan "TAILWIND CSS" dan juga "BOOTSTRAPS" agar mempermudah dalam Membuat tampilan Aplikasi

---

## 🛠 Teknologi yang Digunakan

-   *Laravel*: 11.28
-   *Tailwind CSS*: 3
-   *PHP*: 8.3.12
-   *Node.js*: 20.18.0
-   *MySQL*: 8.3.0
-   *BOOTSTRAPS*:

---

## 🔗 Coding Standard & Naming Convention

### Coding Standard

Untuk menjaga konsistensi dan keterbacaan kode, kami menggunakan *PSR-1* dan *PSR-4* sebagai standar utama:

-   *PSR-1*: Merupakan standar dasar kode PHP yang merekomendasikan penggunaan coding style yang umum untuk meningkatkan keterbacaan dan kompatibilitas kode PHP di berbagai proyek. PSR-1 mencakup aturan seperti penggunaan <?php dan standar nama kelas.

    -   [Link Mengenai PSR-1](https://www.php-fig.org/psr/psr-1/)

-   *PSR-4*: Standar ini mendefinisikan aturan autoloading untuk project PHP menggunakan namespaces. Dengan PSR-4, kelas PHP dapat dipetakan ke file sistem berdasarkan namespace-nya, memudahkan pengelolaan file dan struktur folder.
    -   [Link Mengenai PSR-4](https://www.php-fig.org/psr/psr-4/)
    -   [Contoh PSR-4 Autoloader](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md)

### Naming Convention

Untuk menjaga keteraturan dalam penamaan, berikut adalah aturan naming convention yang digunakan di proyek ini:

-   *Controller*: Menggunakan Pascal Case (contoh: UserController, ProductController).
-   *Database*: Menggunakan Snake Case (semua yang berhubungan dengan database, contoh: user_data, product_list).
-   *Variable*: Menggunakan Camel Case (contoh: $userData, $productList).

-   *Model*: Menggunakan Pascal Case (contoh: User, Product).
-   *Properti Model*: Menggunakan Snake Case (karena berhubungan dengan database, contoh: user_name, created_at).
-   *Metode Model*: Menggunakan Camel Case (contoh: getUserData(), saveProduct()).

-   *Blade View*: Menggunakan Kebab Case (contoh: user-profile.blade.php, product-list.blade.php).

Referensi tambahan mengenai convention di Laravel:  
[Link Sumber](https://webdevetc.com/blog/laravel-naming-conventions/)

---

## 📂 Alat & Sumber Daya

Unduh alat yang diperlukan melalui [link Google Drive ini]().

---

## 🚀 Cara Memulai

### 1️⃣ Clone Proyek dari Repository

Untuk memulai, klon proyek dari GitHub dengan perintah berikut:

bash
git clone https://github.com/ProyekPerangkatLunak-B/e-waste-ppl-b.git 'nama-proyek'
cd nama-proyek


### 2️⃣ Instal Dependensi

-   *PHP dependencies* dengan Composer:

bash
composer install


-   *Node packages* dengan npm:

bash
npm install


### 3️⃣ Konfigurasi Environment

Buat file .env:

bash
cp .env.example .env
php artisan key:generate


-   Jalankan Artisan Storage Link *(NEW)*:

bash
php artisan storage:link


-   *Konfigurasi Database*: Sesuaikan detail database di file .env:

bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dataku
DB_USERNAME=root
DB_PASSWORD=


Jalankan migrasi database:

bash
php artisan migrate


### 4️⃣ Menjalankan Aplikasi

-   Jalankan server development Laravel:

bash
php artisan serve


-   Jalankan build frontend development:

bash
npm run dev


---

## 🌳 Strategi Branching

### Penamaan Branch

Buat branch baru sesuai dengan tugas yang dikerjakan menggunakan konvensi berikut contohnya:

-   *Frontend Task*: recycleme-frontend
-   *Backend Task*: recycleme-backend

Contoh:

bash
git checkout -b recycleme-frontend


### Melakukan Commit

Pastikan untuk commit pekerjaan dengan pesan yang jelas dan deskriptif:

bash
git commit -m "Recycleme-frontend: Menambahkan fitur baru"


*Catatan*: Selalu push ke branch masing-masing, **bukan langsung ke dev**.

---

## 🔄 Workflow Kolaborasi

### Tarik Perubahan Terbaru

Sebelum memulai pekerjaan, pastikan untuk menarik (pull) perubahan terbaru dari dev:

bash
git checkout dev
git pull


Sebelum memulai pekerjaan, pastikan untuk mengecek digrup apakah ada update dependencies npm atau composer:

bash
npm install


bash
composer install

### Fitur-Fitur yang terdapat pada Aplikasi diantarannya
- Fitur Registrasi :
- Fitur Login :
- Fitur Mengubah Profile
- Fitur Mengubah Password
- Fitur Menghapus Akun

### Pindah ke Branch Masing - Masing

Setelah melakukan pull pada branch dev, pidahlah kebranch masing - masing sesuai dengan jobdesk:

bash
git checkout nama-branch



Jika tidak bisa menggunakan git pull Coba Gunakan ini:

bash
git pull origin dev



### Push Perubahan ke Branch

Setelah menyelesaikan pekerjaan, push perubahan ke branch masing-masing:

bash
git add .
git commit -m "Pesan commit yang deskriptif sesuuai dengan contoh yang sudah diberikan"
git push origin nama-branch


---

Last Edited 05/08/2024 Adan Ahmad Erlangga
