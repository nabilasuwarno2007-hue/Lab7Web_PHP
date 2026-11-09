# H. Pertanyaan Evaluasi
1. Apa perbedaan pemrosesan client-side dan server-side?

Client-side adalah pemrosesan yang dilakukan di sisi pengguna melalui browser, sedangkan server-side adalah pemrosesan yang dilakukan di server. Contohnya, HTML dan JavaScript berjalan di browser, sementara PHP diproses oleh server.

2. Mengapa file PHP harus dijalankan melalui web server?

Karena PHP merupakan bahasa pemrograman server-side yang membutuhkan web server untuk memproses kode PHP. Jika dibuka langsung melalui file, kode PHP tidak akan dijalankan sebagaimana mestinya.

3. Apa fungsi tanda $ pada variabel PHP?

Tanda $ digunakan untuk menandai variabel dalam PHP. Setiap variabel PHP harus diawali dengan tanda tersebut, misalnya $nama, $nim, dan $harga.

4. Apa perbedaan metode GET dan POST?

GET mengirimkan data melalui URL sehingga data dapat terlihat pada alamat browser. Sedangkan POST mengirimkan data melalui bagian request body sehingga tidak ditampilkan langsung pada URL. GET biasanya digunakan untuk pencarian, sedangkan POST digunakan untuk mengirim data formulir.

5. Mengapa input pengguna perlu divalidasi di sisi server?

Karena data yang dimasukkan pengguna belum tentu sesuai dengan ketentuan yang ditetapkan. Validasi server-side diperlukan untuk memastikan data benar, lengkap, dan sesuai sebelum diproses lebih lanjut.

6. Apa fungsi htmlspecialchars() ketika menampilkan data dari form?

htmlspecialchars() digunakan untuk mengubah karakter khusus HTML menjadi bentuk yang aman ketika ditampilkan. Tujuannya untuk mengurangi risiko serangan seperti XSS melalui input pengguna.

7. Apa manfaat penggunaan function dalam program PHP?

Function bermanfaat untuk membuat kode lebih terstruktur dan dapat digunakan kembali. Dengan function, kita tidak perlu menulis kode yang sama berulang kali sehingga program lebih mudah dibaca, diperbaiki, dan dikembangkan.

# I. Laporan Praktikum dan Pengumpulan
# 1. Tujuan Praktikum
Praktikum ini bertujuan untuk memahami dasar pemrograman PHP sebagai bahasa pemrograman server-side, mulai dari penggunaan variabel, operator, percabangan, perulangan, array, function, serta pengolahan data menggunakan metode GET dan POST.

# 2. Perangkat yang Digunakan
- Laptop atau komputer
- XAMPP sebagai web server lokal
- Visual Studio Code sebagai editor kode
- Browser Google Chrome
- Bahasa pemrograman PHP

# 3. Cara Menjalankan Program
1. Buka aplikasi XAMPP.
2. Aktifkan Apache.
3. Simpan folder proyek di dalam direktori htdocs.
4. Buka browser.
5. Masukkan alamat http://localhost/Lab7Web_PHP/
6. Untuk membuka mini project, akses http://localhost/Lab7Web_PHP/mini_project.php

# 4. Struktur File
Lab7Web_PHP/
- index.php : Berisi latihan 1 sampai 7 dan eksperimen mandiri.
- mini_project.php : Berisi aplikasi formulir data mahasiswa.
- README.md : Berisi penjelasan proyek praktikum.

# 5. Ringkasan Hasil
Praktikum ini menghasilkan beberapa latihan dasar PHP, yaitu:
- Menampilkan teks dan tanggal menggunakan PHP.
- Menggunakan variabel, operator, dan percabangan.
- Mengolah array menggunakan foreach.
- Membuat function untuk perhitungan.
- Menggunakan form GET dan POST.
- Melakukan validasi dan pengolahan data.
- Membuat aplikasi formulir data mahasiswa.
- Melakukan eksperimen perhitungan rata-rata, pencarian nama, format Rupiah, validasi NIM, dan tombol reset.

# 6. Kesimpulan
Melalui praktikum ini, saya dapat memahami dasar penggunaan PHP untuk mengolah data pada sisi server, membuat formulir, melakukan validasi input, dan menampilkan hasil pengolahan data melalui browser.

# Screenshot latihan 1–7
# Latihan 1: Tampilan tulisan PHP dan tanggal.
![img1](<images/img 1.png>)

# Latihan 2: Hasil perhitungan nilai dan huruf mutu.
![img2](<images/img 2.png>)

# Latihan 3: Hasil tampilan array menggunakan foreach.
![img3](<images/img 3.png>)

# Latihan 4: Hasil function diskon dan luas persegi panjang.
![img4](<images/img 4.png>)

# Latihan 5: Form pencarian GET beserta hasil pencariannya.
![img5](<images/img 5.png>)

# Latihan 6: Form data mahasiswa beserta hasil setelah dikirim.
![img6](<images/img 6.png>)

# Latihan 7: Form barang beserta hasil subtotal perhitungan.
![img7](<images/img 7.png>)


# Screenshot eksperimen mandiri
# Eksperimen 1: Hasil perhitungan nilai rata-rata.
![img8](<images/img 8.png>)

# Eksperimen 2: Hasil pencarian nama.
![img9](<images/img 9.png>)

# Eksperimen 3: Tampilan format Rupiah
![img10](<images/img 10.png>)

# Eksperimen 4: Hasil validasi NIM benar dan salah
![img11](<images/img 11.png>)

# Eksperimen 5: Tampilan tombol Reset dan bukti bahwa tombol bisa mengosongkan input
![img12](<images/img 12.png>)


# Screenshot Mini Project
# Tampilan form mahasiswa sebelum diisi.
![img13](<images/img 13.png>)

# Hasil ketika data valid berhasil dikirim.
![img14](<images/img 14.png>)

# Hasil ketika data tidak valid dan pesan kesalahan muncul.
![img15](<images/img 15.png>)

# A. Kasus Input Valid

Input Valid 1: Mengisi seluruh kolom formulir dengan benar, seperti nama, NIM, program studi, semester 3, dan email dengan format yang benar. Sistem berhasil menerima data dan menampilkan informasi mahasiswa.

Input Valid 2: Mengisi seluruh kolom dengan data lengkap, menggunakan semester 5 dan email yang valid. Sistem berhasil memproses data tanpa menampilkan pesan kesalahan.

# B. Kasus Input Tidak Valid

Input Tidak Valid 1: Mengosongkan kolom nama, NIM, atau program studi. Sistem menampilkan pesan kesalahan karena terdapat data wajib yang belum diisi.

Input Tidak Valid 2: Memasukkan alamat email dengan format yang salah, misalnya nabila@gmail. Sistem menolak data tersebut dan menampilkan pesan bahwa format email tidak valid.