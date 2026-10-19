## Menyiapkan data demo API

Jalankan migration sekaligus seeder agar tabel dan data contoh siap digunakan:

```bash
php artisan migrate --seed
```

Jika tabel sudah dibuat, jalankan hanya seedernya:

```bash
php artisan db:seed
```

Akun demo yang tersedia:

| Email | Password |
| --- | --- |
| test@example.com | password123 |
| ayu@example.com | password123 |
| budi@example.com | password123 |

Setelah server Laravel berjalan, data dapat dilihat melalui Endpoint API:
1. `GET /api/home` untuk menampilkan semua postingan yang ada di home
2. Endpoint `POST /api/login` pada API ini saat ini hanya memeriksa email, bukan password.
3. `GET /api/user/(id)` untuk menampilkan data user spesifik menggunakan id
4. `GET /api/users` menampilkan semua data user
5. POST	/api/register	Registrasi user
6. POST	/api/login	Login (cek email)
7. GET	/api/home	Semua postingan
8. POST	/api/posts	Buat postingan
9. GET	/api/search?q=kata	Cari postingan
10. POST	/api/dm	Kirim pesan langsung
11. POST	/api/posts/{post_id}/comments	Tambah komentar
12. POST	/api/posts/{post_id}/like	Like postingan
13. POST	/api/settings	Update profil
14. GET	/api/user/{user_id}	Detail user
15. GET	/api/users	Semua user

Nama Anggota:
1. (135) ADHIPRAMANA SAIFULLAH ARIF
2. (123) SYAHRINDRA ALWI ZAKARIA
3. (129) TEUKU RIFQI AR RAFI'
4. (110) RAFIKHAR LUCIANO
5. (138) BELVA DZAKWAN MAULA RAMADHAN
