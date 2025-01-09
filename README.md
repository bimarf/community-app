<h2>Media Discuss</h2>

Media Discuss adalah aplikasi untuk berdiskusi seputar problem yang sering dialami programmer. Aplikasi ini saya buat karena tema yang diberikan oleh pihak Pilarmedia Indonesia adalah Community Application.

<h3>Features</h3>

1. Membuat Diskusi yang dapat dilihat publik tanpa perlu login
2. Memberikan jawaban atau response terhadap pertanyaan atau diskusi yang dibuat oleh user lain
3. Memberikan feedback yaitu Like 👍 untuk diskusi atau jawaban yang menarik
4. Dapat melihat diskusi atau jawaban dari user lain dengan mengunjungi profil mereka
5. User juga dapat melihat diskusi atau jawaban yang telah disubmit pada profil mereka
6. User dapat melakukan Edit terhadap profil mereka

<h3>Installation</h3>

1. Clone repository. 
2. Jalankan "composer install" dan "php artisan key:generate"
3. Buat file .env dan copy dari .env.example
4. Buat database pada mysql dengan nama media_discuss atau apapun asalkan sama dengan DB_DATABASE
5. Lalu buka terminal dan jalankan "php artisan migrate --seed"
6. Setelah selesai aplikasi dapat dijalankan dengan "php artisan serve"

<h3>API Documentation</h3>

Untuk Dokumentasi API dapat diakses pada link berikut:
https://documenter.getpostman.com/view/7142608/2sAYQUquK5#e1703d09-d4e2-41e9-afac-f4cdd1bc6085

<h3>Admin Panel</h3>

Admin Panel dapat diakses dengan mengakses url berikut:
http://localhost:8000/admin

<h4>Login Admin</h4>
Email: admin@mediadiscuss.com
Password: password


Sekian dan Terimakasih !
