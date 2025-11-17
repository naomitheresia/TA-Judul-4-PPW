# Sistem Manajemen Kontak

Aplikasi ini merupakan sistem manajemen kontak sederhana menggunakan **PHP Native + TailwindCSS**.

---

## Dibuat oleh:
**Naomi Theresia. S**  
**NPM:** 2315061091  
**Kelas:** PW C

---

## 🔐 Informasi Login

Gunakan akun berikut untuk masuk ke aplikasi:

```
Username : naomi
Password : 123456
```

---

## ✨ Fitur Aplikasi


### 1. 🔑 Login User
Halaman login untuk autentikasi pengguna sebelum mengakses sistem.

<img width="1919" height="988" alt="login" src="https://github.com/user-attachments/assets/0ef4ca01-ac2c-403a-9fe1-57708dd50440" />


---

### 2. ➕ Tambah Kontak
Form untuk menambahkan kontak baru dengan validasi input (nama, email, telepon, kategori, alamat).


<img width="1900" height="961" alt="tambah kontak" src="https://github.com/user-attachments/assets/e6131531-2cd4-46ba-8611-bd87acaa025f" />

---

### 3. ⚠️ Notifikasi Error Tambah Kontak
Sistem menampilkan pesan error jika data tidak valid (email salah, nama kurang dari 3 huruf, dll).

<img width="1893" height="959" alt="error tambah kontak" src="https://github.com/user-attachments/assets/cdef9403-6657-443a-b074-fb24bd78dc65" />

---


### 4. 📋 Daftar Kontak
Menampilkan semua kontak yang tersimpan dengan informasi lengkap (nama, kategori, telepon, email, alamat).

<img width="1919" height="965" alt="dashboard utama" src="https://github.com/user-attachments/assets/92f0fa31-8cb1-499e-aab5-5d865807e066" />


---

### 5. 🔍 Cari Kontak
Fitur pencarian untuk menemukan kontak dengan cepat (belum aktif di versi ini).

<img width="1911" height="967" alt="cari" src="https://github.com/user-attachments/assets/80c4fb30-af13-4fcd-aa5b-10f95aaf4533" />

---

### 6. ✏️ Edit Kontak
Mengubah informasi kontak yang sudah tersimpan.

<img width="1900" height="961" alt="edit kontak" src="https://github.com/user-attachments/assets/03a45a55-e1da-4a24-bdb2-d43dcf2eaa25" />


---

### 7. 🗑️ Hapus Kontak
Menghapus kontak dengan konfirmasi terlebih dahulu.

<img width="1910" height="962" alt="hapus kontak&#39;" src="https://github.com/user-attachments/assets/4754387c-e792-4453-bce7-fb2b2657464b" />


---

## Teknologi yang Digunakan

- **PHP Native** - Backend dan logika aplikasi
- **TailwindCSS** - Styling dan UI design
- **JSON** - Penyimpanan data kontak
- **Session Management** - Autentikasi user

---

## 📁 Struktur File

```
├── add.php              # Halaman tambah kontak
├── config.php           # Konfigurasi dan fungsi helper
├── contacts.json        # Database kontak (JSON)
├── delete.php           # Proses hapus kontak
├── edit.php             # Halaman edit kontak
├── index.php            # Halaman utama (daftar kontak)
├── login.php            # Halaman login
├── logout.php           # Proses logout
└── TampilanWeb/         # Folder screenshot aplikasi
```

---

## Cara Menjalankan

1. **Clone repository:**
   ```bash
   git clone <url-repository>
   ```

2. **Pindahkan ke folder web server:**
   ```bash
   # Untuk XAMPP
   mv sistem-kontak C:/xampp/htdocs/
   
   # Untuk LAMP/WAMP
   mv sistem-kontak /var/www/html/
   ```

3. **Jalankan web server** (Apache + PHP)

4. **Akses aplikasi:**
   ```
   http://localhost/sistem-kontak/login.php
   ```

5. **Login dengan akun:**
   - Username: `naomi`
   - Password: `123456`

---

## 📝 Fitur Validasi

### Form Tambah/Edit Kontak:
- ✅ **Nama**: Minimal 3 karakter
- ✅ **Email**: Format email valid
- ✅ **Telepon**: Hanya angka
- ✅ **Kategori**: Wajib dipilih (Keluarga/Teman/Kerja/Bisnis/Lainnya)
- ✅ **Alamat**: Opsional

---

## 🔒 Keamanan

- ✅ Session management untuk autentikasi
- ✅ `htmlspecialchars()` untuk mencegah XSS
- ✅ Validasi input server-side
- ✅ Redirect otomatis jika belum login

---

 Naomi Theresia. S</p>
</div>
