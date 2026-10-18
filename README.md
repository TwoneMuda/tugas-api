## Menyiapkan data demo API

Jalankan migration sekaligus seeder agar tabel dan data contoh siap digunakan:

```bash
php artisan migrate --seed
```

Jika tabel sudah dibuat, jalankan hanya seedernya:

```bash
php artisan db:seed
```

Seeder dapat dijalankan berulang kali tanpa menambahkan data demo yang sama
lebih dari sekali. Akun demo yang tersedia:

| Email | Password |
| --- | --- |
| test@example.com | password123 |
| ayu@example.com | password123 |
| budi@example.com | password123 |

Setelah server Laravel berjalan, data postingan dapat dilihat melalui:
1. `GET /api/home` untuk menampilkan semua postingan yang ada di home
2. Endpoint `POST /api/login` pada API ini saat ini hanya memeriksa email, bukan password.
3. `GET /api/user/(id)` untuk menampilkan data user spesifik menggunakan id
4. `GET /api/users` menampilkan semua data user 
