<p align="right">
بِسْــــــــــــــمِ اللَّهِ الرَّحْمَنِ الرَّحِيم 
</p>

# Bad Word Indonesia
Package PHP sederhana untuk filter dan masking (sensor) kata kasar atau jorok.

## Installation
```bash
composer require afrizalmy/bad-word-indonesia
```
_*pastikan sudah menginstall composer di device kalian._

## How to use
```php
// import terlebih dahulu
use afrizalmy\BWI\BadWord;

echo BadWord::cek('dasar, bajingan kamu ya!');
// true

echo BadWord::masking('dasar, bangsat kamu ya!');
// dasar, b*ngs*t kamu ya!

echo BadWord::masking('dasar, keparat kamu ya!', '#');
// dasar, k#p#r#t kamu ya!

echo BadWord::masking('dasar, baaaaajiiiingaannn');
// dasar, b*j*ng*n

/**
 * Custom word rules
 * **/
echo BadWord::masking($str, "*", ['pehape','php']);
// Yek masih belajar p*h*p* wkwk
```

## Run Test
```bash
vendor\bin\phpunit test\BadWordTest.php
```
Hasil
```
PHPUnit 9.5.0 by Sebastian Bergmann and contributors.

.......                                                             7 / 7 (100%)

Time: 00:00.019, Memory: 4.00 MB

OK (7 tests, 7 assertions)
```

## Support Me
Dukung aku [https://saweria.co/afrizalmy](https://saweria.co/afrizalmy)

### Kontribusi
Silahkan ke halaman issue page untuk penjelasan lebih lanjutnya.
Saya menerima dengan baik kontribusi kamu untuk package ini.