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
// dasar, b*****j****ng**nnn

/**
 * Custom word rules
 * **/
echo BadWord::masking('Yekkk masih belajar pehape wkwk', "*", ['pehape','php']);
// Yekkk masih belajar p*h*p* wkwk
```

## Run Test
```bash
vendor\bin\phpunit test\BadWordTest.php
```


## Support Me
Dukung aku [https://saweria.co/afrizalmy](https://saweria.co/afrizalmy)

### Kontribusi
Silahkan ke halaman issue page untuk penjelasan lebih lanjutnya.
Saya menerima dengan baik kontribusi kamu untuk package ini.
