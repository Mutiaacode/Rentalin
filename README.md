
# 🚗 Rentalin - Aplikasi Rental Mobil Berbasis Web

Rentalin adalah sistem peminjaman mobil berbasis web yang dibangun dengan Laravel. Aplikasi ini memungkinkan pengguna untuk menyewa mobil dan admin untuk mengelola data mobil, penyewaan, serta memverifikasi status sewa. Sistem juga dilengkapi fitur upload dokumen penting seperti KTP dan SIM.

---

## 🧰 Fitur Utama

### 👤 Pengguna (User)
- Lihat daftar mobil yang tersedia di **halaman Home**.
- Formulir penyewaan mobil.
- Upload **KTP** dan **SIM** saat menyewa.
- Melihat status pesanan.
- Jika mobil **sudah disewa orang lain dan disetujui admin**, maka tombol sewa **dikunci** dan muncul info "Mobil sudah disewa".

### 🛠️ Admin
- Login ke dashboard admin.
- CRUD Mobil: Tambah, edit, hapus data mobil.
- Kelola penyewaan:
  - Melihat daftar semua penyewaan.
  - Mengubah status penyewaan:
    - `Menunggu Konfirmasi`
    - `Diterima`
    - `Ditolak`
  - Jika disetujui (`Diterima`), user akan mendapat **notifikasi** untuk datang ke tempat dan memeriksa unit mobil.
- File upload user (KTP & SIM) bisa dilihat dari admin panel.

---

## 🏗️ Struktur Folder Utama

```
rentalin/
├── app/
├── public/
│   ├── storage/ (akses file KTP & SIM)
├── resources/
│   ├── views/
│       ├── home.blade.php
│       ├── sewa_form.blade.php
│       └── admin/
│           ├── mobil/index.blade.php
│           └── sewa/index.blade.php
├── routes/
│   └── web.php
├── storage/
│   └── app/public/uploads/
```

---

## 🖼️ Halaman Utama

Home menampilkan daftar mobil dan statusnya. Jika mobil:
- **Tersedia** → Tombol *Sewa* aktif.
- **Sudah disewa dan disetujui admin** → Tombol *Sewa* dinonaktifkan dan muncul info: "Sudah Disewa".

---

## 📂 Instalasi

1. Clone repo:
   ```bash
   git clone https://github.com/Mutiaacode/Rentalin.git
   ```

2. Masuk ke folder project:
   ```bash
   cd Rentalin
   ```

3. Install dependensi:
   ```bash
   composer install
   ```

4. Copy file env dan generate key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Konfigurasi database di `.env`, lalu migrasi:
   ```bash
   php artisan migrate
   ```

6. Link storage (untuk akses gambar):
   ```bash
   php artisan storage:link
   ```

7. Jalankan server:
   ```bash
   php artisan serve
   ```

---

## 📸 Upload Berkas

Saat menyewa mobil, user wajib mengupload:

* **KTP (JPEG/PNG/PDF)**
* **SIM (JPEG/PNG/PDF)**

File akan disimpan di `/storage/app/public/uploads`.

---

## 📬 Notifikasi Sewa Diterima

Jika admin mengubah status sewa menjadi `Diterima`, maka:

* User akan melihat notifikasi pada dashboard user: **"Sewa diterima, silakan datang ke tempat untuk cek unit mobil."**
* Mobil otomatis akan dikunci dari penyewaan oleh user lain.

---

## 👩‍💻 Dibuat oleh

Mutia Pegi Intanswari - Programmer Backend  
Valentino Ivan Raditya - Programmer Frontend  
Muhammad Rasya Rifqi - Designer  
Keanu Fatih Kautsar - Support  
Dimas Fandi Bilal Akbar - Support  

SMK RPL | Web Developer Laravel  
📧 Email: [mutiacode@gmail.com](mailto:mutiacode@gmail.com)
