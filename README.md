# PokéCare > Oddish Training Simulation
ini adalah simulasi web sederhana dengan tema PokéCare. Aplikasi menggambarkan bagaimana trainer mengenali karakteristik
Pokémon Oddish, melakukan latihan, dan memantau riwayat latihan menggunakan konsep OOP di PHP native.

## Data Diri
- Nama  : Ardina Jihan Mariska
- NIM   : H1H024018
- Shift Awal: C
- Shift Akhir: A

## Fitur 
1. Halaman Beranda (`index.php`)
   - Menampilkan informasi dasar Pokémon: nama, tipe, level, HP, jurus spesial, habitat.
   - Tombol navigasi ke halaman Latihan dan Riwayat Latihan.

2. Halaman Latihan (`latihan.php`)
   - Form untuk memilih jenis latihan: Attack, Defense, Speed, dan latihan khusus Spesial Moonlight Bloom.
   - Input intensitas latihan (1–100).
   - Setelah submit:
     - Level dan HP Oddish bertambah sesuai jenis latihan dan intensitas.
     - Deskripsi efek latihan ditampilkan.
     - Method OOP yang dipanggil: `train()` dan `specialMove()`.
   - Status Pokémon terbaru ditampilkan di sisi kanan.

3. Halaman Riwayat Latihan (`riwayat.php`)
   - Menampilkan tabel riwayat seluruh sesi latihan pada sesi aplikasi saat ini:
     - Jenis latihan, intensitas, level sebelum/sesudah, HP sebelum/sesudah, waktu, dan catatan.
   - Data disimpan menggunakan `$_SESSION` (tanpa database).

## Konsep OOP yang Digunakan (4 Pilar)
1. Encapsulation
   - Properti Pokémon (`$name`, `$type`, `$level`, `$hp`, `$specialMoveName`) bersifat `protected`/`private`.
   - Akses data melalui method getter & operation seperti `increaseLevel()` dan `increaseHp()`.

2. Inheritance
   - `Pokemon` (abstract class) diturunkan menjadi `GrassPokemon`, lalu menjadi `Oddish`.
   - `Oddish` mewarisi semua perilaku dasar Pokémon dan menambahkan info `habitat`.

3. Polymorphism
   - Method abstrak `calculateTrainingEffect()` di `Pokemon` diimplementasikan spesifik untuk tipe Grass di `GrassPokemon`.
   - Tiap jenis latihan (Attack/Defense/Speed/Spesial Moonlight Bloom) memberi efek level/HP yang berbeda.

4. Abstraction
   - Class `Pokemon` mendefinisikan kontrak abstrak:
     - `calculateTrainingEffect(TrainingSession $session): array`
     - `specialMove(): string`
   - Class turunan wajib mengimplementasikan detailnya.

## Cara Menjalankan
1. PHP harus sudah aktif (Apache berjalan)
2. Akses melalui browser:
   - `http://localhost/PokeCare_Oddish/index.php`
4. Lakukan beberapa sesi latihan lalu cek halaman riwayat Latihan