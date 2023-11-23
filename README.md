# Aplikasi Web Sistem Informasi Desa

Aplikasi Web Sistem Informasi Desa adalah platform yang dirancang untuk memfasilitasi manajemen data dan informasi di tingkat desa. Aplikasi ini menyediakan berbagai fitur untuk membantu administrasi dan koordinasi di lingkungan desa.

## Deskripsi

Aplikasi ini dibangun dengan menggunakan teknologi web seperti [PHP, JavaScript, Jquery], dan menggunakan template admin dari AdminLTE. Aplikasi web ini dirancang untuk memberikan solusi yang efisien dalam manajemen informasi desa. Dengan Aplikasi Web Sistem Informasi Desa, pengguna dapat dengan mudah mengelola data penduduk, informasi ekonomi, surat menyurat, dan lain-lain.

## Fitur

1. **Login:**
   - Login pengguna.

2. **Manajemen Data Penduduk:**
   - Pendaftaran penduduk baru.
   - Melihat detail data penduduk.

3. **Manajemen Mutasi Warga:**
   - Pembuatan mutasi masuk dan keluar.
   - Melihat detail mutasi.

4. **Pembuatan Surat:**
   - Membuat macam-macam surat seperti surat kematian, kelahiran, pindahan dll.
   - Mencetak surat dalam bentuk PDF dan dapat di print.

5. **Laporan dan Analisis:**
   - laporan berbasis data jumlah penduduk, kematian, kelahiran, mutasi masuk,      mutasi keluar.
   - laporan nya terdapat dalam bentuk chart atau grafik.

6. **Print dan Unduh ke Excel:**
   - Setiap tabel dari data desa bisa melakukan print dan unduh ke excel.
   - laporan nya terdapat dalam bentuk chart atau grafik.

7. **Ganti Password:**
   - Admin dapat melakukan ganti password.

## Instalasi

Berikut adalah langkah-langkah untuk menginstal aplikasi ini:

1. Masuk kedalam folder xampp/htdocs anda:

2. Lalu, Clone repositori atau unduh sebagai ZIP:

   - **Clone menggunakan Git:**
     ```bash
     git clone https://github.com/alfiannurrizky/simdesa.git
     ```
   - **Unduh sebagai ZIP:**
     [Unduh ZIP](https://github.com/alfiannurrizky/simdesa/archive/refs/heads/main.zip)

3. Lalu,buka database mysql dan buat database dengan nama "simdes":

4. Setelah membuat database simdes nya, lalu buka Command Prompt dan masuk ke dalam root folder github tadi yang berada di xampp/htdocs/simdesa 

    ```bash
    c:\xampp\htdocs\simdesa>

5. Lalu, ketikkan perintah, dan tekan enter. Nanti akan diminta untuk memasukkan password mysql anda, tapi jika anda tidak menggunakan password makan tekan enter saja.
    ```bash
    mysql -u root -p simdes < database/simdes.sql

6. Dan anda telah berhasil membuat tabel tabel yang diperlukan, silahkan cek di database simdes anda dan lihat tabel tabel nya sudah terbuat otomatis.

7. Jika anda ingin mendemokan aplikasi nya silahkan isi kolom username dan password di tabel users, dengan username = admin dan password = 827ccb0eea8a706c4c34a16891f84e7b. Lalu anda coba jalankan aplikasi nya dengan membuka browser dan ketikan di url seperti ini "localhost/simdesa" , nanti akan menampilkan halaman login dan silahkan masukan username = admin dan password = 12345.

8. Dan terakhir jangan lupa untuk menjalankan xampp nya, lalu start apache dan start mysql nya, Good Luck.
