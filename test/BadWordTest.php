<?php

use afrizalmy\BWI\BadWord;
use PHPUnit\Framework\TestCase;

class BadWordTest extends TestCase
{
    public function testNormalWordsCek()
    {
        $str = 'bad word test by afrizalmy';
        $t = BadWord::cek($str);
        $this->assertEquals(false, $t); 
    }
    public function testNormalWordsMasking()
    {
        $str = 'bad word test by afrizalmy';
        $t = BadWord::masking($str);
        $this->assertEquals($str, $t); 
    }
    public function testlWordsCek()
    {
        $str = 'dasar, kamu bajingan ya!';
        $t = BadWord::cek($str);
        $this->assertEquals(true, $t); 
    }
    public function testWordsMasking()
    {
        $str = 'dasar, kamu bajingan ya!';
        $t = BadWord::masking($str);
        $this->assertEquals('dasar, kamu b*j*ng*n ya!', $t); 
    }
    public function testWordsMaskingCustom()
    {
        $str = 'dasar, kamu bajingan ya!';
        $t = BadWord::masking($str,'#');
        $this->assertEquals('dasar, kamu b#j#ng#n ya!', $t); 
    }

    public function testWordsMaskingCustomWithDuplicateVokalChar()
    {
        $str = 'dasar, baaaaajiiiingaannn';
        $t = BadWord::masking($str);
        $this->assertEquals('dasar, b*****j****ng**nnn', $t); 
    }

    public function testWordsMaskingWithCustomRules()
    {
        $str = 'Yekkk masih belajar pehape wkwk';
        $t = BadWord::masking($str, "*", [
            'pehape'
        ]);
        $this->assertEquals('Yekkk masih belajar p*h*p* wkwk', $t); 
    }
}
