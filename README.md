# Simetak - Sistem Manajemen Kontak

Simetak adalah aplikasi Sistem Manajemen Kontak yang dibuat menggunakan PHP dan **Bootstrap.  
Pengguna dapat menambahkan, melihat, mengedit, dan menghapus kontak. Sistem ini juga dilengkapi dengan validasi form dan session management untuk keamanan.

## Fitur Utama
### 1. Form Tambah Kontak dengan Validasi
- Pengguna dapat menambahkan kontak baru.
- Form dilengkapi validasi untuk:
  - Nama hanya boleh huruf dan spasi
  - Email harus valid
  - Telepon hanya boleh angka atau simbol "+"
  - Upload foto opsional (format JPG, JPEG, PNG)

**Contoh tampilan form:**
![Form Tambah Kontak](https://github.com/user-attachments/assets/c355356f-193b-457e-a48a-d0ef38ef8b26)

**Validasi yang diterapkan:**
![Validasi Form](https://github.com/user-attachments/assets/2be5c986-e721-4962-8c12-51c6579e80ad)

**Hasil tampilan jika ada error:**
![Hasil Tampilan](https://github.com/user-attachments/assets/1172cf16-34f4-46fb-b777-53d496758886)

### 2. Tampilan Daftar Kontak
- Menampilkan seluruh kontak yang tersimpan.
- Menyertakan foto jika diupload.
- Tersedia opsi **Edit** dan **Hapus**.  

![Daftar Kontak](https://github.com/user-attachments/assets/4c6b72fa-f2a0-4e0e-b58d-5ff13a0fadb9)

### 3. Fitur Edit dan Hapus
#### 3.1 Edit Kontak
- Klik tombol **Edit** untuk membuka halaman edit kontak.
- Bisa mengubah nama, telepon, email, dan foto.  

![Edit Kontak](https://github.com/user-attachments/assets/80f3039e-3353-4d50-9d77-c61b5b58e570)

#### 3.2 Hapus Kontak
- Klik tombol **Hapus** untuk menghapus kontak.
- Sistem menampilkan konfirmasi sebelum data dihapus.  

![Hapus Kontak](https://github.com/user-attachments/assets/85fc6743-4967-496a-ba12-a2a512677916)

### 4. Session Management
- Sistem menggunakan **session** untuk:
  - Mengelola login pengguna.
  - Menyimpan kontak sementara (tanpa database).
  - Menyimpan error atau notifikasi setelah menambah/edit kontak.
- Session juga digunakan untuk menampilkan pesan sukses/error pada form.

### 5. Login dan Logout
- Sistem dilengkapi halaman login untuk keamanan.
- Logout dapat dilakukan untuk mengakhiri session pengguna.  

![Login dan Logout](https://github.com/user-attachments/assets/1986c602-cf2b-4382-a7ce-5949f3925e59)

Login : 
Username : admin 
Password : 123456


